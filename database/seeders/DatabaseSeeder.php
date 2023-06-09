<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Bank;
use App\Models\Food;
use App\Models\User;
use App\Models\Category;
use App\Models\Reservation;
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


        // User::factory(50)->create();

        // Food::factory(20)->create();

        Reservation::factory()->create([
            'name' => 'Ilham ramadhan',
            'email' => 'ilhamputra0601@gmail.com',
            'email' => '12345678',
            "guest"=> '1',
            "date"=> '30.03.2023',
            "time"=> '00:21',
            "message"=> 'wawddadadw'
        ]);

        // category
        Category::create([
            'name' => 'Not gravy',
            'image'=> 'assets/images/tab-icon-01.png'
         ]);

        Category::create([
            'name' => 'Soup',
            'image'=> 'assets/images/tab-icon-02.png'
         ]);
        Category::create([
            'name' => 'Burned',
            'image'=> 'assets/images/tab-icon-03.png'
         ]);

         //Bank
         Bank::create([
             'name' => 'Bca',
             'number'=> '8692176030',
          ]);
         Bank::create([
             'name' => 'Mandiri',
             'number'=> '8692176030',
          ]);
         Bank::create([
             'name' => 'Dana',
             'number'=> '089658501537',
          ]);
     }

}
