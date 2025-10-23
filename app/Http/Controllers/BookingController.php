<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Arrangement;
use App\Models\WatertaxiRoute;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $step = $request->input('step', 1);
        $watertaxiRoutes = WatertaxiRoute::all();

        if ($request->isMethod('post')) {

            if ($step == 1) {
                session(['service' => $request->service]);

if ($request->service == 'Watertaxi') {
    $request->validate([
        'watertaxi_route_id' => 'required|exists:watertaxi_routes,id',
    ]);
    session(['watertaxi_route_id' => $request->watertaxi_route_id]);
}


                $step = 2;
            }

            elseif ($step == 2) {
                $service = session('service');

                if ($service == 'Watertaxi') {
                    $request->validate([
                        'date' => 'required|date',
                        'time_start' => 'required',
                    ]);

                    session([
                        'date' => $request->date,
                        'time_start' => $request->time_start,
                        'time_end' => null
                    ]);
                    $step = 4;
                } else {
                    $request->validate([
                        'date' => 'required|date',
                        'time_start' => 'required',
                        'time_end' => 'required|after:time_start',
                    ]);
                    session([
                        'date' => $request->date,
                        'time_start' => $request->time_start,
                        'time_end' => $request->time_end,
                    ]);

                    $step = 3;
                }
            }

            elseif ($step == 3) {
                session(['arrangement' => $request->arrangement]);
                $step = 4;
            }

            elseif ($step == 4) {
                session([
                    'name' => $request->name,
                    'email' => $request->email,
                    'opmerking' => $request->opmerking,
                ]);

                $data = session()->only([
                    'service',
                    'date',
                    'time_start',
                    'time_end',
                    'arrangement',
                    'name',
                    'email',
                    'opmerking',
                    'watertaxi_route_id',
                ]);

                $booking = Booking::create([
                    'service' => $data['service'],
                    'date' => $data['date'],
                    'time_start' => $data['time_start'],
                    'time_end' => $data['time_end'],
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'comment' => $data['opmerking'],
                    'watertaxi_route_id' => session('watertaxi_route_id') ?? null,
                ]);

                if ($data['service'] !== 'Watertaxi') {
                    $arrangement = [
                        'booking_id' => $booking->id,
                        'prosecco' => 0,
                        'picnic' => 0,
                        'olala' => 0,
                        'bistro' => 0,
                        'barca' => 0,
                    ];

                    if (isset($data['arrangement']) && isset($arrangement[$data['arrangement']])) {
                        $arrangement[$data['arrangement']] = 1;
                    }

                    Arrangement::create($arrangement);
                }

                $step = 5;
            }
        }

        $data = session()->all();

        return view('booking', [
            'data' => $data,
            'step' => $step,
            'watertaxiRoutes' => $watertaxiRoutes,
        ]);
    }
}
