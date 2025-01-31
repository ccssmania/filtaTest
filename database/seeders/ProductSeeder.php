<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        #faker
        for ($i = 0; $i < 100; $i++) {
            \App\Models\Product::factory()->create();
        }
    }
}
