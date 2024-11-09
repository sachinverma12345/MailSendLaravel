<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Manish',
            'username' => 'manish',
            'email' => 'manish@gmail.com',
            'password' => '12345678'
        ]);
    }
}
