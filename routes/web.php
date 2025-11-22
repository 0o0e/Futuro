<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\OwnerMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\DiscountCodeController;

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



// Route::get('/admin/dashboard', [AdminController::class, 'calendar'])->middleware(AdminMiddleware::class);

Route::get('/admin/login', [AdminController::class, 'showLoginPage'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login']);
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');


Route::middleware(AdminMiddleware::class)->prefix('admin')->group(function () {

    Route::get('/kalender', [AdminController::class, 'calendar'])->name('admin.calendar');

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/reserveringen', [AdminController::class, 'reservations'])->name('admin.reservations');

    Route::get('/reservations/{id}/edit', [AdminController::class, 'editReservation'])->name('admin.reservations.edit');
    Route::post('/reservations/{id}/update', [AdminController::class, 'updateReservation'])->name('admin.reservations.update');


    Route::get('/boeking/aanmaken', [Admincontroller::class, 'createReservation'])->name('admin.reservation.create');
    Route::post('/boeking/aanmaken', [Admincontroller::class, 'storeReservation'])->name('admin.reservation.store');

    Route::post('/discount-codes', [DiscountCodeController::class, 'store'])->name('admin.discount-codes.store');
    Route::get('/discount-codes', [DiscountCodeController::class, 'index'])->name('admin.discount-codes.index');
});

Route::middleware(OwnerMiddleware::class)->prefix('admin')->group(function () {

    Route::get('/user/create', [AdminController::class, 'createUser'])->name('admin.user.create');
    Route::post('/user/create', [AdminController::class, 'storeUser'])->name('admin.user.store');


});
