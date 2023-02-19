<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Ignacio Chiara',
            'email' => 'ignaciochiara2@gmail.com',
            'password' => bcrypt('Vasousado1.')
        ]);

        User::factory(99)->create();
    }
}
