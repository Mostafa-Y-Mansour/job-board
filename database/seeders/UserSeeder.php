<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'amazing@boss.com',
            'role' => "admin",
            'password' => bcrypt("12345678"),
        ]);
        User::factory()->create([
            'name' => 'Editor Man',
            'email' => 'man@boss.com',
            'role' => "editor",
            'password' => bcrypt("12345678"),
        ]);
        User::factory()->create([
            'name' => 'Editor Woman',
            'email' => 'woman@boss.com',
            'role' => "editor",
            'password' => bcrypt("12345678"),
        ]);
    }
}
