<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminController;
Route::get('/', function () {
    return view('welcome');
});

Route::match(['get', 'post'], '/booking', [BookingController::class, 'index'])->name('booking');

Route::view('/home', 'home')->name('home');



// Route::get('/admin/dashboard', [AdminController::class, 'calendar'])->middleware(AdminMiddleware::class);


Route::middleware(AdminMiddleware::class)->prefix('admin')->group(function () {
    // Dashboard home
    Route::get('/dashboard', [AdminController::class, 'calendar'])->name('admin.dashboard');
});

Route::get('/admin/logout', function() {
    return response('Logged out', 401)
           ->header('WWW-Authenticate', 'Basic');
})->name('admin.logout');
