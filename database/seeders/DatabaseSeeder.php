<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\Ville::factory(10)->create();
        \App\Models\User::factory(20)->create()->each(function ($user) {
            $etudiant = \App\Models\Etudiant::factory()->make();
            $user->etudiant()->save($etudiant);
        });
    }
}
