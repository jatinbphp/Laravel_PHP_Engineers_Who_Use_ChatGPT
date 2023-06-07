<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        
         $faker = Faker::create();
//dd($faker);
        foreach (range(1, 50) as $index)  {
            Product::create([
                'name' => $faker->word,
                'sku' => $faker->unique()->slug,
                'price' => $faker->numberBetween($min = 20, $max = 255),
                'description'=> $faker->paragraph(1)
            ]);
        }
    }
}
