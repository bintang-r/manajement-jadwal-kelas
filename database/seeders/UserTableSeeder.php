<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'username'          => 'Milda Admin',
                'email'             => 'milda@gmail.com',
                'email_verified_at' => now(),
                'password'          => Hash::make('milda123'),
                'role'              => 'admin',
            ],
            [
                'username'          => 'Rifat Admin',
                'email'             => 'rifatsauqi@gmail.com',
                'email_verified_at' => now(),
                'password'          => Hash::make('rifat123'),
                'role'              => 'admin',
            ],
            [
                'username'          => 'Nurfadilla Admin',
                'email'             => 'nurfadilla@gmail.com',
                'email_verified_at' => now(),
                'password'          => Hash::make('nurfadilla123'),
                'role'              => 'admin',
            ],
            [
                'username'          => 'Ulil Admin',
                'email'             => 'ulil@gmail.com',
                'email_verified_at' => now(),
                'password'          => Hash::make('ulil123'),
                'role'              => 'admin',
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                $user
            );
        }
    }
}
