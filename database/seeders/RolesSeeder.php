<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    // Create a new role
    $adminRole = Role::create(['name' => 'admin']);
    Role::create(['name' => 'student']);

    $adminUser = User::where('email', 'admin@maisonneuve.com')->first();
    $adminUser->role()->associate($adminRole);
    $adminUser->save();
    }
}
