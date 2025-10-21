<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WatertaxiRoute;

class WatertaxiRoutesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $routes = [
            ['destination' => 'Papendrecht', 'duration' => 15, 'price' => 90.00],
            ['destination' => 'Zwijndrecht', 'duration' => 15, 'price' => 90.00],

            ['destination' => 'Hendrik Ido Ambacht', 'duration' => 20, 'price' => 110.00],
            ['destination' => 'Restaurant Kita in Hendrik Ido Ambacht', 'duration' => 20, 'price' => 110.00],

            ['destination' => 'Hotel Ara in Zwijndrecht', 'duration' => 25, 'price' => 120.00],

            ['destination' => 'Restaurant Le Barrage in Alblasserdam', 'duration' => 30, 'price' => 130.00],
            ['destination' => 'Alblasserdam', 'duration' => 30, 'price' => 130.00],

            ['destination' => 'Heeren aan de Haven Streefkerk', 'duration' => 50, 'price' => 200.00],

            ['destination' => 'Kinderdijk', 'duration' => 45, 'price' => 170.00],

            ['destination' => 'Rotterdam centrum', 'duration' => 60, 'price' => 240.00],
            ['destination' => 'Gorinchem', 'duration' => 60, 'price' => 240.00],

            ['destination' => 'Slot Loevestijn', 'duration' => 70, 'price' => 250.00],


        ];

        foreach ($routes as $route) {
            WatertaxiRoute::create($route);
        }




    }
}
