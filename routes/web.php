<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TicketController;

Route::group(['controller' => SignupController::class, 'middleware' => 'guest'], function () {
    Route::get('/signup', 'showSignupForm')
        ->name('showSignupForm');
    Route::post('/signup', 'createUser')
        ->name('createUser');
});

Route::group(['controller' => AuthController::class], function () {
    Route::get('/login', 'showAuthForm')
        ->name('showAuthForm')
        ->middleware('guest');
    Route::post('/login', 'auth')
        ->name('auth')
        ->middleware('guest');
    Route::post('/logout', 'logout')
        ->name('logout')
        ->middleware('auth');
});

Route::group(['controller' => TicketController::class], function () {
    Route::get('/tickets', 'ticketsView')
        ->name('tickets')
        ->middleware('role:admin');
    Route::get('/create/ticket', 'showTicketForm')
        ->name('showTicketForm')
        ->middleware('auth');
    Route::post('/create/ticket', 'createTicket')
        ->name('createTicket')
        ->middleware('auth');
    Route::post('/update/status', 'updateStatus')
        ->name('updateStatus')
        ->middleware('role:admin');
    Route::get('/do/answer/{ticketId}', 'showAnswerForm')
        ->name('showAnswerForm')
        ->middleware('role:admin');
    Route::post('/do/answer/{ticketId}', 'doAnswer')
        ->name('doAnswer')
        ->middleware('role:admin');
    Route::match(['get', 'post'], '/notices/{userId}', 'yourTickets')
        ->name('yourTickets')
        ->middleware('role:default');
});
