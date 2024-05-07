<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
        ]);
        User::factory()->create([
            'name' => 'Arif Budiman Arrosyid',
            'email' => 'arifbudimanarrosyid@gmail.com',
        ]);

        $this->call(UserSeeder::class);
    }
}
