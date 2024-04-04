<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Truck; // Correct import statement for the Sector model

class TruckSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     public function run()
     {
         // Create 10 fake trucks
         Truck::factory(10)->create();
     }
}
