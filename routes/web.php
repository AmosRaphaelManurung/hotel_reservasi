<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

Route::get('/', [BookingController::class, 'index'])->name('bookings.index');
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
Route::get('/bookings', [BookingController::class, 'list'])->name('bookings.list');
Route::get('/api/bookings', [BookingController::class, 'getBookings'])->name('api.bookings');
