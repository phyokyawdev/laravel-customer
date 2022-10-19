<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ZoneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->unique()->city(),
            'name_mm' => $this->faker->unique()->city(),
            'city_id' => \App\Models\City::inRandomOrder()->first()->id,
        ];
    }
}
