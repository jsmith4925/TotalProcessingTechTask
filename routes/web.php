<?php

namespace App\Http\Controllers{

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\TransactionController;

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

    Route::get('/home', [HomeController::class, 'home'])->name('home');

    Route::any('/payment', [HomeController::class, 'payment'])->name('payment');

    Route::post('/submitOrder', [TransactionController::Class, 'submitOrder']);

    Route::get('/completeOrder', [TransactionController::Class, 'completeOrder']);

}

namespace {
    use Illuminate\Support\Facades\Route;
    Auth::routes();
}