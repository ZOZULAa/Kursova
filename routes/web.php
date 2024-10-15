<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/drug', function () {
    return view('drug');
});

Route::get('/DrugDB', function () {
    return view('DrugDB');
});