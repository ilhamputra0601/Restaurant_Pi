<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Food;
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
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'usertype' => '1',
            'password' => bcrypt('admin1234')
        ]);

        User::factory()->create([
            'name' => 'Ilham ramadhan',
            'email' => 'ilhamputra0601@gmail.com',
            'password' => bcrypt('ilhamputra1234')
        ]);

        User::factory(50)->create();

        Food::factory(20)->create();
    }
}
