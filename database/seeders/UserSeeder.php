<?php

namespace Database\Seeders;

use App\Enums\UserStatus;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Helper function to get a random status
        $getRandomStatus = fn() => UserStatus::cases()[array_rand(UserStatus::cases())]->value;

         // Super Admin
        /*  User::factory()->withPersonalTeam()->create([
            'name' => config('auth.SuperAdmin.name'),
            'email' => config('auth.SuperAdmin.email'),
            'password' => bcrypt('Super_@dmin_15!'),
            'status' => $getRandomStatus(),
        ])->assignRole('Super Admin'); */
        
        //Super Admin

        User::factory()->withPersonalTeam()->create([
            'name' => 'Super Admin',
            'email' => 'doomsday@gmail.com',
            'password' => bcrypt('Doomsday123!'),
            'status' => UserStatus::ACTIVE->value,
        ])->assignRole('Super Admin'); 



        // Regular User
        User::factory()->withPersonalTeam()->create([
            'name' => 'Usuario Normal',
            'email' => 'usuario@normal.com',
            'password' => bcrypt('Usuario123!'),
            'status' => UserStatus::ACTIVE->value,
        ])->assignRole('User');

        // Human Resources
        User::factory()->withPersonalTeam()->create([
            'name' => 'Recursos Humanos',
            'email' => 'rrhh@empresa.com',
            'password' => bcrypt('Rrhh123!'),
            'status' => UserStatus::ACTIVE->value,
        ])->assignRole('Human Resources');
    }
}
