<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'phone_no' => $this->faker->unique()->phoneNumber(),
            'city_id' => \App\Models\City::inRandomOrder()->first()->id,
            'zone_id' => \App\Models\Zone::inRandomOrder()->first()->id,
            'address' => $this->faker->address()
        ];
    }
}
