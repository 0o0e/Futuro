<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class AdminController extends Controller
{
    public function calendar()
    {
        $bookings = Booking::all()->map(function($b) {
            return [
                'title' => $b->service . ' (' . $b->people . ' personen)',
                'start' => $b->date . 'T' . $b->time_start,
                'end'   => $b->date . 'T' . $b->time_end,
            ];
        });

        return view('admin.adminDashboard', compact('bookings'));
    }
}
