<?php

use App\Http\Controllers\Transaction\TransactionsController;
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
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    
    Route::prefix('dashboard')->group(function () {
        
        Route::get('/', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::get('transactions', [TransactionsController::class, 'index'])->name('transactions');

        Route::prefix('transaction')->group(function () {
            Route::get('show/{transaction}', [TransactionsController::class, 'show'])->name('show-transaction');
            Route::get('create', [TransactionsController::class, 'create'])->name('create-transaction');
            Route::post('store', [TransactionsController::class, 'store'])->name('store-transaction');
            Route::post('search', [TransactionsController::class, 'search'])->name('search-transaction');
        });
    });
});

Route::prefix('transaction')->group(function () {
    Route::get('payment/{link}', [TransactionsController::class, 'payment'])->name('payment');
    Route::post('make-payment/{transaction}', [TransactionsController::class, 'makePayment'])->name('make-payment');
});

require __DIR__.'/auth.php';
