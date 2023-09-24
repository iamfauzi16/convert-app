<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\RootController;
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

Route::get('/', [RootController::class, 'index'])->name('root');


Auth::routes();

Route::get('home' ,[HomeController::class, 'index']);
Route::get('providers', [ProviderController::class, 'index']);

Route::get('providers/{id}/transactions', [ProviderController::class, 'transactionPerProvider'])->name('transaction.create');

Route::middleware(['auth'])->group(function () {
    Route::get('transactions', [TransactionController::class, 'index'])->name('transaction-web.index');
    Route::get('transactions/{id}', [TransactionController::class, 'show'])->name('transaction-web.show');
    Route::post('transactions', [TransactionController::class, 'store'])->name('transaction-web.store');
    Route::get('transactions/{id}/edit', [TransactionController::class, 'edit'])->name('transaction-web.edit');
    Route::put('transactions/{id}', [TransactionController::class, 'update'])->name('transaction-web.update');
    Route::delete('transactions/{id}', [TransactionController::class, 'destroy'])->name('transaction-web.destroy');
});