<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RootController;
use App\Http\Controllers\BankUserController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\ConfirmationController;


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

Route::get('home' ,[HomeController::class, 'index'])->name('home');
Route::get('providers', [ProviderController::class, 'index']);

Route::get('providers/{id}/transactions', [ProviderController::class, 'transactionPerProvider'])->name('transaction.create');

Route::middleware(['auth'])->group(function () {
    Route::get('transactions', [TransactionController::class, 'index'])->name('transaction-web.index');
    Route::get('transactions/{id}', [TransactionController::class, 'show'])->name('transaction-web.show');
    Route::post('transactions', [TransactionController::class, 'store'])->name('transaction-web.store');
    Route::get('transactions/{id}/edit', [TransactionController::class, 'edit'])->name('transaction-web.edit');
    Route::put('transactions/{id}', [TransactionController::class, 'update'])->name('transaction-web.update');
    Route::delete('transactions/{id}', [TransactionController::class, 'destroy'])->name('transaction-web.destroy');


    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('bank-user/create', [BankUserController::class, 'create'])->name('bank-user.create');
    Route::post('bank-user', [BankUserController::class, 'store'])->name('bank-user.store');

    Route::get('/confirmation-transaction/{id}', [ConfirmationController::class, 'create'])->name('confirmation.transaction');
    
});