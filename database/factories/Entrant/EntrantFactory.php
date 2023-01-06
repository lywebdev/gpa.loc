<?php

namespace Database\Factories\Entrant;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EntrantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $citizens = [
            'РФ', 'Украина'
        ];
        $user = User::factory()->create();

        return [
            'name' => $this->faker->name(),
            'surname' => $this->faker->word(),
            'patronymic' => $this->faker->word(),
            'birthdate' => $this->faker->date('d.m.Y'),

            'citizenship' => $this->faker->randomElement($citizens),
            'passport_number' => $this->faker->creditCardNumber(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),

            'user_id' => $user->id,
        ];
    }
}
