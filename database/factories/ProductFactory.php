<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(1000),
            'quantity' => random_int(1, 999999),
            'status' => random_int(1, 2000),
            'seller_id' => $this->faker->numberBetween(1,20)
        ];
    }
}
