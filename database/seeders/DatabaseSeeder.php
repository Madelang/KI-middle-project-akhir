<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\CustomerFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Customer::factory(20)->create();
        \App\Models\User::factory()->create([
            'name' => 'Elang',
            'email' => 'kece@gmail.com',
            'password' => bcrypt('12345678')
        ]);
    }
}
