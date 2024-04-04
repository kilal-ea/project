<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product; // Correct import statement for the Sector model

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 10 fake products
        Product::factory(10)->create();
    }
}
