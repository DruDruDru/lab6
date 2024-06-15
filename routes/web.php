<?php

use Illuminate\Support\Facades\Route;


Route::post('/signup', function () {
    return view('signup');
})->name('signup');

Route::post('/login', function () {
    return view('login');
})->name('login');



