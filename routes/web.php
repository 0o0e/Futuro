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


// admin routes
Route::middleware(AdminMiddleware::class)->prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'showLoginPage'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login']);

    Route::get('/kalender', [AdminController::class, 'calendar'])->name('admin.calendar');

    Route::get('/dashboard', function(){
        return 'dashboard';
    })->name('admin.dashboard');

    Route::get('/boekingen', function() {
        return 'boekingen';
    });

    Route::get('/adduser',function(){
        return 'add a new user';
    });

});

Route::get('/admin/logout', function() {
    return response('Logged out', 401)
           ->header('WWW-Authenticate', 'Basic');
})->name('admin.logout');
