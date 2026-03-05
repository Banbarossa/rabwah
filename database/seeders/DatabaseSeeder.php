<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'name' => 'admin',
            'email'=>'admin@gmail.com',
            'level' => 'admin',
            'password' => Hash::make('password'),
        ]);
        $this->call(CategorySeeder::class);
        $this->call(TagSeeder::class);
        $this->call(MenuSeeder::class);

        $this->call(ProgramSeeder::class);
        $this->call(PendidikanSeeder::class);
    }
}
