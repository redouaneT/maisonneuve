<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ville;
use App\Models\User;

class EtudiantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->firstName(),
            'adresse' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'date_de_naissance' => $this->faker->date(),
            'ville_id' => function() {
                return Ville::inRandomOrder()->first()->id;
            },
            'user_id' => function() {
                return User::inRandomOrder()->first()->id;
            }
        ];
    }
}
