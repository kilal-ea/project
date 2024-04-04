<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City; // Correct import statement for the Sector model

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 10 fake cities
        City::factory(10)->create();
    }
}
