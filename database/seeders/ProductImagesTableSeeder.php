<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1; $i < 5; $i++)
            DB::table('product_images')->insert([
                'img' => 'product_' . $i . '.jpg',
                'product_id' => 1,
                //'created_at'=>
                //'updated_at'=>

            ]);

    }
}
