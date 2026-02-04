<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\OwnerMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\DiscountCodeController;
use App\Http\Controllers\Admin\AdminBookingController;

use App\Http\Controllers\ClientController;

Route::get('/client', [ClientController::class, 'index'])->name('client.page');
Route::post('/client', [ClientController::class, 'showBooking'])->name('client.show');
Route::post('/client/update/{id}', [ClientController::class, 'updateBooking'])->name('client.update');

Route::get('/', function () {
    return view('/home');
});

Route::match(['get', 'post'], '/booking', [BookingController::class, 'index'])->name('booking');

Route::view('/home', 'home')->name('home');

// Algemene voorwaarden
Route::view('/algemene-voorwaarden', 'terms')->name('terms');
Route::view('/rondvaarten', 'rondvaarten')->name('rondvaarten');
Route::view('/arrangementen', 'arrangementen')->name('arrangementen');
Route::view('/overfuturo', 'overfuturo')->name('overfuturo');
Route::view('/reserveren', 'reserveren')->name('reserveren');
Route::view('/contact', 'contact')->name('contact');


Route::get('/admin/login', [AdminController::class, 'showLoginPage'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login']);
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');


Route::middleware(AdminMiddleware::class)->prefix('admin')->name('admin.')->group(function () {

    Route::get('/kalender', [AdminController::class, 'calendar'])->name('calendar');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // AANGEPAST: Gebruik AdminBookingController voor /reserveringen
    Route::get('/reservations', [AdminBookingController::class, 'index'])->name('bookings.index');
    Route::get('/reservations/{id}', [AdminBookingController::class, 'show'])->name('bookings.show');
    Route::get('/reservations/{id}/edit', [AdminBookingController::class, 'edit'])->name('bookings.edit');
    Route::put('/reservations/{id}', [AdminBookingController::class, 'update'])->name('bookings.update');
    Route::delete('/reservations/{id}', [AdminBookingController::class, 'destroy'])->name('bookings.destroy');

    Route::get('/boeking/aanmaken', [Admincontroller::class, 'createReservation'])->name('reservation.create');
    Route::post('/boeking/aanmaken', [Admincontroller::class, 'storeReservation'])->name('reservation.store');

    Route::post('/discount-codes', [DiscountCodeController::class, 'store'])->name('discount-codes.store');
    Route::get('/discount-codes', [DiscountCodeController::class, 'index'])->name('discount-codes.index');
});

Route::middleware(OwnerMiddleware::class)->prefix('admin')->name('admin.')->group(function () {

    Route::get('/user/create', [AdminController::class, 'createUser'])->name('user.create');
    Route::post('/user/create', [AdminController::class, 'storeUser'])->name('user.store');

});