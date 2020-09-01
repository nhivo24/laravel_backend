<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use \Firebase\JWT\JWT;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    function getName(){
        $token  = request()->header('Authorization');
        $key = "example_key";
        $decoded = JWT::decode($token, $key, array('HS256'));
        $userId = $decoded->user_id;
        $user = User::find($userId);
        $responseData = array("data"=>$user->name);
        return response()->json($responseData, 200);
    }
    function checkPass(Request $request){
        $oldpass = $request->oldpass;
        $token  = request()->header('Authorization');
        $key = "example_key";
        $decoded = JWT::decode($token, $key, array('HS256'));
        $userId = $decoded->user_id;
        $user = User::find($userId);
        $responseData = array("data"=>"null");
        if( Hash::check($oldpass,$user->password)){
            return response()->json($responseData, 200);
        }else{
            return response()->json($responseData, 400);
        }
        
    }
    function changePass(Request $request){
        $newpass = $request->newpass;
        $token  = request()->header('Authorization');
        $key = "example_key";
        $decoded = JWT::decode($token, $key, array('HS256'));
        $userId = $decoded->user_id;
        $user = User::find($userId);
        $user->password = Hash::make($newpass);
        $user->save();
        $responseData = array("data"=>"null");
        return response()->json($responseData, 200);  
    }
    function destroy(Request $request){
        $token  = request()->header('Authorization');
        $key = "example_key";
        $decoded = JWT::decode($token, $key, array('HS256'));
        $userId = $decoded->user_id;
        $user = User::find($userId)->delete();
        
        $responseData = array("data"=>"null");
        return response()->json($responseData, 200);  
    }
}
