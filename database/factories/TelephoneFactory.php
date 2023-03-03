<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TelephoneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'telephone' => $this->faker->numberBetween(100000000,999999999), //He puesto 9 digitos para que se parezca mas o menos a un numero de telefono
            'description' => $this->faker->text(100)
        ];
    }
}
