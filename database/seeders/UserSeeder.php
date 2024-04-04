<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Add this line

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 10 fake users
        User::factory(10)->create();
    }
}
