<?php

namespace Database\Seeders;

use App\Models\TblUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'username' => 'admin',
                'role' => 'admin',
                'password' => Hash::make('admin')
            ],
            [
                'username' => 'operator',
                'role' => 'operator',
                'password' => Hash::make('operator')
            ]
        ];

        // Melakukan looping data dengan foreach
        foreach ($userData as $user => $val) {
            TblUser::create($val);
        }
    }
}
