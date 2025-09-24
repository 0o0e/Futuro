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
                $step = 2;
            }
            elseif($step == 2){
                session(['date'=>$request->date,'time' => $request->time]);

                $step = 3;
            }
            elseif ($step == 3){
                session(['name'=>$request->name, 'email'=>$request->email]);
                $step = 4;
            }
        }

        $data = session()->only(['service', 'date', 'name', 'email','time']);

        return view('booking', ['data' => $data,'step' => $step]);
    }

}
