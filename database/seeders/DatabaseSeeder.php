<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\User;
use App\Models\WatertaxiRoute;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            WatertaxiRoutesTableSeeder::class,
            AdminUserSeeder::class,
            OwnerUserSeeder::class,
            BookingSeeder::class,
        ]);

        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
