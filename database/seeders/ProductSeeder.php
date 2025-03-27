<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            ['name' => 'Laptop', 'price' => 50000, 'description' => 'High-performance laptop'],
            ['name' => 'Smartphone', 'price' => 30000, 'description' => 'Latest smartphone model'],
            ['name' => 'Headphones', 'price' => 5000, 'description' => 'Noise-canceling headphones'],
        ]);
    }
}
