<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

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
                session(['date'=>$request->date,'time' => $request->time]);

                $step = 3;
            }
            elseif ($step == 3){
                session(['arrangement'=>$request->arrangement ]);
                $step = 4;
            }
            elseif ($step == 4){
                session(['name'=>$request->name, 'email'=>$request->email,'opmerking'=>$request->opmerking ]);
                $step = 5;
            }
        }

        $data = session()->only(['service','departure', 'destination', 'date', 'time', 'arrangement', 'name', 'email', 'opmerking']);

        return view('booking', ['data' => $data,'step' => $step]);
    }

}
