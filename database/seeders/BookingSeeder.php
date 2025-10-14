<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run()
{
    $booking = \App\Models\Booking::create([
        'service' => 'watertaxi',
        'date' => '2025-10-20',
        'time_start' => '18:00:00',
        'time_end' => '20:00:00',
        'people' => 3,
        'name' => 'Test Naam',
        'email' => 'naam@example.com',
        'comment' => null,
        'has_table' => false,
    ]);
}

}
