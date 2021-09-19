<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert
        ([
            'name'      => 'Administrator',
            'username'  => 'admin',
            'password'  => Hash::make('admin'),
        ]);
        User::insert
        ([
            'name'      => 'User',
            'username'  => 'username',
            'password'  => Hash::make('username'),
        ]);
    }
}
