<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

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
        User::create ([
            'username' => 'admin',
            'email' => 'admin@maisonneuve.com',
            'password' => bcrypt('password')
        ]);
        $this->call(RolesSeeder::class);
    }
}
