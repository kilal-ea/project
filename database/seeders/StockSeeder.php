<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Stock; // Correct import statement for the Sector model

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 10 fake cities
        Stock::factory(10)->create();
    }
}
