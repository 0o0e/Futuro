<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Arrangement;

class BookingController extends Controller
{
    public function index(Request $request) {
        $step = $request->input('step', 1);

        if($request->ismethod('post')){
            if($step == 1){
                session(['service'=>$request->service]);
                if ($request->service == 'Watertaxi') {
                    $request->validate([
                        'departure' => 'required',
                        'destination' => 'required',
                    ]);
                    session([
                        'departure' => $request->departure,
                        'destination' => $request->destination

                    ]);
                } else {
                    session()->forget(['departure', 'destination']);
                }
                $step = 2;
            }
            elseif($step == 2){
                session(['date'=>$request->date,'time_start' => $request->time_start]);
                session(['date'=>$request->date,'time_end' => $request->time_end]);
                $step = 3;
            }
            elseif ($step == 3){
                session(['arrangement'=>$request->arrangement ]);
                $step = 4;
            }
            elseif ($step == 4){

                session(['name'=>$request->name, 'email'=>$request->email,'opmerking'=>$request->opmerking ]);

                $data = session()->only(['service','departure', 'destination', 'date', 'time_start', 'time_end', 'arrangement', 'name', 'email', 'opmerking']);

                $booking = Booking::create([
                    'service' => $data['service'],
                    'date' => $data['date'],
                    'time_start' => $data['time_start'],
                    'time_end' => $data['time_end'],

                    'name' => $data['name'],

                    'email' => $data['email'],
                    'comment' => $data['opmerking'],
                    'departure' => $data['departure'] ?? null,
                    'destination' => $data['destination'] ?? null,
                ]);

                $arrangement = [
                    'prosecco' => 0,
                    'picnic' => 0,
                    'olala' => 0,
                    'bistro' => 0,
                    'barca' => 0,
                ];


                $arrangement['booking_id'] = $booking->id;

                if (isset($data['arrangement']) && isset($arrangement[$data['arrangement']])) {
                    $arrangement[$data['arrangement']] = 1;
                }

                Arrangement::create($arrangement);


                $step = 5;
            }
        }

        $data = session()->only(['service','departure', 'destination', 'date', 'time_start', 'time_end', 'arrangement', 'name', 'email', 'opmerking']);

        return view('booking', ['data' => $data,'step' => $step]);
    }

}
