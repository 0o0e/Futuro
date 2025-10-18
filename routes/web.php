<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\OwnerMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::match(['get', 'post'], '/booking', [BookingController::class, 'index'])->name('booking');

Route::view('/home', 'home')->name('home');



// Route::get('/admin/dashboard', [AdminController::class, 'calendar'])->middleware(AdminMiddleware::class);

Route::get('/admin/login', [AdminController::class, 'showLoginPage'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login']);
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');


Route::middleware(AdminMiddleware::class)->prefix('admin')->group(function () {

    Route::get('/kalender', [AdminController::class, 'calendar'])->name('admin.calendar');

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/reserveringen', [AdminController::class, 'reservations'])->name('admin.reservations');

    Route::get('/boeking/aanmaken', [Admincontroller::class, 'createReservation'])->name('admin.reservation.create');
    Route::post('/boeking/aanmaken', [Admincontroller::class, 'storeReservation'])->name('admin.reservation.store');


});

Route::middleware(OwnerMiddleware::class)->prefix('admin')->group(function () {

    Route::get('/user/create', [AdminController::class, 'createUser'])->name('admin.user.create');
    Route::post('/user/create', [AdminController::class, 'storeUser'])->name('admin.user.store');


});
