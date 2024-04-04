<?php

namespace Database\Factories;

use App\Models\Truck;
use Illuminate\Database\Eloquent\Factories\Factory;

class TruckFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Truck::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'idS' => function () {
                return \App\Models\User::factory()->create()->id;
            },
            'idcity' => function () {
                return \App\Models\City::factory()->create()->id;
            },
            'idstock' => function () {
                return \App\Models\Stock::factory()->create()->id;
            },
        ];
    }
}
