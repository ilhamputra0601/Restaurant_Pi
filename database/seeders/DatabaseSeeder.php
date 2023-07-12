<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Bank;
use App\Models\Food;
use App\Models\User;
use App\Models\Chef;
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
            'name' => 'Sauté',
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


          //chef
          Chef::create([
            'name' => 'Juna',
            'speciality' => 'Burning',
            'image' => 'chef-images/1GOLckZ2icL1ZUJbf5SYhkRs5j28uyUK2EpSYJ4G.jpg',
          ]);

          Chef::create([
            'name' => 'Renata',
            'speciality' => 'Sauté',
            'image' => 'chef-images/Q6moy2svzA4qyVLE2AyAx8DtMC2YDTawjae5wcsS.jpg',
          ]);
          Chef::create([
            'name' => 'Arnold',
            'speciality' => 'Soup',
            'image' => 'chef-images/vCwYyYylAMRcIBQE1vBJXwYHpmIjBwmamqfeb5wo.jpg',
          ]);

         //food
         Food::create([
                'category_id' => 2,
                'title' => 'Soto Nggading Special Campur',
                'price' => 25,
                'image' => 'food-images/mFxpVOz3JeZ2CXrAnO0ZIv13xla2aV5DhLb8QJnM.jpg',
                'description' => 'Soto ayam Kuah bening khas solo disajikan dalam satu mangkok lengkap dengan nasi putih, di taburi bawang goreng, keripik kentang dan seledri',
            ]);
         Food::create([
            'category_id' => 1,
            'title' => 'Nasi Goreng Kambing',
            'price' => 20,
            'image' => 'food-images/5LmiFqYKAXuYPHPz7RBOq24OaP3vkZKke2fbNDbD.jpg',
            'description' => 'Nasi goreng daging kambing yang lezat dilengkapi dengan telur mata sapi serta taburan bawang goreng dan seledri, disajikan dengan acar timun dan cabau',
            ]);
         Food::create( [
            'category_id' => 2,
            'title' => 'Lontong Cah Gomeh',
            'price' => 15,
            'image' => 'food-images/JGa0q6cP6vE6hS9Xdg7BEVMVZKWOLHHldktIRIP2.jpg',
            'description' => 'Sajian irisan lontong lengkap dengan sambal goreng labu, opor ayam yang gurih ditambah potongan telur pindang dengan taburan bawang goreng',
        ]);
         Food::create(  [
            'category_id' => 3,
            'title' => 'Ayam Bakar',
            'price' => 20,
            'image' => 'food-images/ECMnfAQP1yTynzVsZI7hX7O7xGPKbjuFORciuDuK.jpg',
            'description'=>'Ayam potong bakar dengan bumbu rahasia khas Kampung Bunga disajikan lengkap dengan tempe goreng, lalap, dan sambal',
           ]);
         Food::create([
            'category_id' => 1,
            'title' => 'Ayam Goreng Lombok Ijo',
            'price' => 20,
            'image' => 'food-images/mrVGrKPL8Wn1S8L2sjLboagjGK54j6hDaB7P6pf6.jpg',
            'description' => 'Ayam goreng dengan Ulekan sambel ijo khas Kampung Bunga di sajikan lengkap dengan tempe goreng dan lalap',
        ]);
         Food::create([
            'category_id' => 1,
            'title' => 'Ayam Goreng Kremes',
            'price' => 18,
            'image' => 'food-images/tUPfRt21Rexx8LDcqQEAQoxcA09V4fVmanW1Rpid.jpg',
            'description' => 'Ayam Potong goreng ditaburi dengan kriuk kremes yang renyah disajikan dengan tempe goreng, lalap, dan sambal',
        ]);
         Food::create(
            [
                'category_id' => 1,
                'title' => 'Oseng - oseng Mercon',
                'price' => 15,
                'image' => 'food-images/K7IHIgjOiZRT1nUq0fSgKtnFeN0TuBQf6VzBZd3q.jpg',
                'description' => 'Campuran Sambal pedas dengan irisan daging dan kikil ditaburi toge dan seledri',
            ]);

            Food::create([
                'category_id' => 3,
                'title' => 'Sate Ayam',
                'price' => 25,
                'image' => 'food-images/I6S1v32d8u7nEcyZVerdDA0bnb7vVfYNe10iAci0.jpg',
                'description' => 'Sate ayam Khas Kampung Bunga terinspirasi kelezatan sate ayam Ponorogo disiram bumbu kacang dan kecap manis dilengkapi dengan irisan bawang merah dan cabe rawit',
                ]);
            Food::create([

                'category_id' => 1,
                'title' => 'Pecel Solo',
                'price' => 18,
                'image' => 'food-images/x0GMNortOtLv71870cVVFbeddfIvYIRkC3KCmGoG.jpg',
                'description' => 'Pecel Sayuran disiram dengan bumbu kacang yang rasanya gurih manis Pedas',
            ]);
            Food::create([
                'category_id' => 2,
                'title' => 'Timlo Special',
                'price' => 25,
                'image' => 'food-images/NUT9jNxr0ZrSw2HUbHYnMHBy19S6eHiSWaqlFUgi.jpg',
                'description' => 'Sup Kuah bening dengan campuran mi soun, sosis solo, telur pindang, ampela ati, suwir ayam, dan taburan keripik kentang',
            ]);
            Food::create([
                'category_id' => 3,
                'title' => 'Sate Buntel',
                'price' => 14,
                'image' => 'food-images/5HqPPFu5uSTBXrppwn5RIDa3HFexyMaUFLv3TnyW.jpg',
                'description' => 'Sate Kambing cincang dengan bumbu spesial yang memberikan arasa gurih dan dibungkus dengan kulit lemak kambing, disiram dengan kecap manis dan disajikan dengan irisan kol, bawang merah dan cabai',
            ]);
            Food::create([
                'category_id' => 2,
                'title' => 'Selat Solo',
                'price' => 25,
                'image' => 'food-images/8H0Za7DkxGpeE3r1uPYWJFjbHbftYLCRpztRf9pa.jpg',
                'description' => 'Potongan bestik daging sapi yang empuk dengan sayuran dan siran kuah manis yang ringan dengan kecap khas Kampung Bunga dengan taburan keripik kentang dan Mayones',
            ]);
     }

}
