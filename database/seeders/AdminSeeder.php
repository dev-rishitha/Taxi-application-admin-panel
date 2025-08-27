<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            [
                'username' => 'rishitha_dandu@example.com',
                'password' => Hash::make('password123'),
            ],
            [
                'username' => 'admin2',
                'password' => Hash::make('password123'),
            ],
            [
                'username' => 'admin3',
                'password' => Hash::make('password123'),
            ],
            [
                'username' => 'admin4',
                'password' => Hash::make('password123'),
            ],
            [
                'username' => 'admin5',
                'password' => Hash::make('password123'),
            ],
            [
                'username' => 'admin6',
                'password' => Hash::make('password123'),
            ],
            [
                'username' => 'admin7',
                'password' => Hash::make('password123'),
            ],
            [
                'username' => 'admin8',
                'password' => Hash::make('password123'),
            ],
            [
                'username' => 'admin9',
                'password' => Hash::make('password123'),
            ],
            [
                'username' => 'admin10',
                'password' => Hash::make('password123'),
            ],
        ];

        foreach ($admins as $admin) {
            Admin::create($admin);
        }
    }
}
