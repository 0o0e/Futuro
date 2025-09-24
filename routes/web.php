<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

Route::get('/', function () {
    return view('welcome');
});

Route::match(['get', 'post'], '/booking', [BookingController::class, 'index'])->name('booking');

Route::view('/home', 'home')->name('home');
