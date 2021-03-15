<?php

namespace App\Http\Controllers{

    use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */

    Route::get('/', function () {
        return view('index');
    });

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/payment', [HomeController::class, 'index'])->name('payment');

    Route::post('/order', [TransactionController::class, 'order'])->name('order');

}

namespace {
    use Illuminate\Support\Facades\Route;
    Auth::routes();
}