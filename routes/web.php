<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DrugController;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/drugList', function () {
    return view('drugList');
});

Route::get('/drug', 'App\Http\Controllers\DrugController@index')->name('drug.index');
Route::get('/drug/create', 'App\Http\Controllers\DrugController@create')->name('drug.create');
Route::post('/drug', 'App\Http\Controllers\DrugController@store')->name('drug.store');
Route::get('/drug/{drug}', 'App\Http\Controllers\DrugController@show')->name('drug.show');
Route::get('/drug/{drug}/edit', 'App\Http\Controllers\DrugController@edit')->name('drug.edit');
Route::patch('/drug/{drug}', 'App\Http\Controllers\DrugController@update')->name('drug.update');
Route::delete('/drug/{drug}', 'App\Http\Controllers\DrugController@destroy')->name('drug.delete');

Route::get('/drug/update', 'App\Http\Controllers\DrugController@update');
Route::get('/drug/delete', 'App\Http\Controllers\DrugController@delete');
