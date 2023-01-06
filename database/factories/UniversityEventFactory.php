<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UniversityEventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->catchPhrase(),
            'description' => $this->faker->realText(250),
            'date' => $this->faker->dateTimeBetween('-1 month', '+1 week'),
        ];
    }
}
