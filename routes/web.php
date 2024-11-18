<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    redirect('medicineList');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/admin/dashboard', function () {
    if (auth()->user()->role !== 'admin') {
        abort(403, 'Доступ заборонено до панелі');
    }
    abort(403, 'Доступ дозволено, но іді');
})->middleware('auth')->name('admin.dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/dashboard', [ProfileController::class, 'edit'])->name('dashboard');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
        Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
        Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
        Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

        Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
        Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
        Route::post('/orders/create', [OrderController::class, 'create'])->name('orders.create');
        Route::delete('/orders/{order}', [OrderController::class, 'cancel'])->name('orders.cancel');

        Route::prefix('medicine')->group(function () {
            // if ((auth()->user()->role ?? '') != 'admin') {
            //     abort(403, 'Доступ заборонено');
            // }
        
            Route::get('/search', 'App\Http\Controllers\MedicineController@index')->name('medicine');
            Route::get('/', 'App\Http\Controllers\MedicineController@index')->name('medicine.index');
            Route::get('/create', 'App\Http\Controllers\MedicineController@create')->name('medicine.create');
            Route::post('/', 'App\Http\Controllers\MedicineController@store')->name('medicine.store');
            Route::get('/{medicine}', 'App\Http\Controllers\MedicineController@show')->name('medicine.show');
            Route::get('/{medicine}/edit', 'App\Http\Controllers\MedicineController@edit')->name('medicine.edit');
            Route::patch('/{medicine}', 'App\Http\Controllers\MedicineController@update')->name('medicine.update');
            Route::delete('/{medicine}', 'App\Http\Controllers\MedicineController@destroy')->name('medicine.delete');
            Route::get('/update', 'App\Http\Controllers\MedicineController@update');
            Route::get('/delete', 'App\Http\Controllers\MedicineController@delete');
        });
});

Route::get('/medicineList/search', 'App\Http\Controllers\MedicineListController@index')->name('medicineList');
Route::get('/medicineList', 'App\Http\Controllers\MedicineListController@index')->name('medicineList.index');
Route::post('/medicineList', 'App\Http\Controllers\MedicineListController@store')->name('medicineList.store');
Route::get('/medicineList/{medicine}', 'App\Http\Controllers\MedicineListController@show')->name('medicineList.show');

require __DIR__.'/auth.php';
