<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLoginPage(){
        return view('/admin/login');
    }

    public function login(Request $request){
        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials) && Auth::user()->role === 'admin'){
            return redirect()->route('admin.dashboard');

        }
        else{
            return back()->withErrors(['email' => 'Ongeldige gegevens']);
        }

    }

    public function logout(){
        Auth::logout();

        return view('/admin/login');
    }

    public function calendar()
    {
        $bookings = Booking::all()->map(function($b) {
            return [
                'title' => $b->service . ' (' . $b->people . ' personen)',
                'start' => $b->date . 'T' . $b->time_start,
                'end'   => $b->date . 'T' . $b->time_end,
            ];
        });
        return view('admin.calendar', compact('bookings'));
    }

    public function dashboard(){
        return view('admin.adminDashboard');
    }
}
