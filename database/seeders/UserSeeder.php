<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // Admin create
        $user = User::create([
            'name'     => 'Admin',
            'email'    => 'admin@app.com',
            'image'    => 'profile.png',
            'role'     => User::ADMIN,
            'password' => Hash::make('password'),
        ]);
        $this->command->info($user->name . ' user is created successfully.');

        // Member create
        $user = User::create([
            'name'     => 'Member',
            'email'    => 'member@app.com',
            'image'    => 'profile.png',
            'role'     => User::MEMBER,
            'password' => Hash::make('password'),
        ]);
        $this->command->info($user->name . ' user is created successfully.');
    }
}
