<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sector; // Correct import statement for the Sector model

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 10 fake sectors
        Sector::factory(10)->create();
    }
}
