<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
class AdminController extends Controller
{
    public function showLoginPage(){
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.dashboard');

        }

        return back()->withErrors(['email' => 'Ongeldige gegevens']);

    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

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

    public function createUser(){
        return view('admin.createUser');
    }

    public function storeUser(Request $request){
        $validated = $request->validate(
            [
                'name'=> 'required|string|max:255',
                'email'=> 'required|email|unique:users',
                'password'=> 'required|min:6|confirmed'
            ]);

            User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);


        return redirect()->route('admin.user.create')->with('success','it worked');
    }


    public function reservations(){
        $bookings = Booking::orderBy('date','asc')->get();
        $today = Carbon::today();

        return view('admin.reservations', compact('bookings', 'today'));
    }
}
