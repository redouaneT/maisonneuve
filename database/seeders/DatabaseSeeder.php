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
        \App\Models\Language::create([
            'name' => 'Français',
            'code' => 'fr'
        ]);

        \App\Models\Language::create([
            'name' => 'English',
            'code' => 'en'
        ]);

        \App\Models\Ville::factory(10)->create();
        \App\Models\User::factory(10)->create()->each(function ($user) {
            $etudiant = \App\Models\Etudiant::factory()->make();
            $user->etudiant()->save($etudiant);
        });
        User::create ([
            'username' => 'admin',
            'email' => 'admin@maisonneuve.com',
            'password' => bcrypt('password')
        ]);
        $this->call(RolesSeeder::class);
        $this->call(ArticleSeeder::class);
    }
}
