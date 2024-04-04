<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category; // Correct import statement for the Sector model

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        // Create 10 fake categories
        Category::factory(10)->create();
    }
}
