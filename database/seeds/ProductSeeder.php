<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i<5; $i++){
            DB::table('products')->insert([
                "name"=>"CÂY ".$i,
                "category_id"=>1,
                "image"=>"/storage/public/image_1.jpg",
                "price"=>$faker->numberBetween($min = 1000000, $max = 2000000),
                "description"=>$faker->text,
                ]);
        }
        for($i=0; $i<5; $i++){
            DB::table('products')->insert([
                "name"=>"CÂY ".$i,
                "category_id"=>2,
                "image"=>"/storage/public/image_2.jpg",
                "price"=>$faker->numberBetween($min = 1000000, $max = 2000000),
                "description"=>$faker->text,
                ]);
        }
        for($i=0; $i<5; $i++){
            DB::table('products')->insert([
                "name"=>"CÂY ".$i,
                "category_id"=>3,
                "image"=>"/storage/public/image_3.jpg",
                "price"=>$faker->numberBetween($min = 1000000, $max = 2000000),
                "description"=>$faker->text,
                ]);
        }
    }
}
