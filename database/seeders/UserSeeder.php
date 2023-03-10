<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\RolledUser;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Tarique Mosharraf',
            'email' => 'tariq.barc@gmail.com',
            'password' => Hash::make('123456'),
        ]);

        RolledUser::create([
            'user_id'=>1,
            'role_name'=>'admin',
            'role_privilleges'=>'all'
        ]);
    }
}
