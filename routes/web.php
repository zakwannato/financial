<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\M_PaymentMethodController;
use App\Http\Controllers\M_CommitmentController;
use App\Http\Controllers\CommitmentController;
use App\Http\Controllers\CreditCardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard.main');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource(name:'expenses', controller: ExpenseController::class);
    Route::resource(name:'m_commitment', controller: M_CommitmentController::class);
    Route::resource(name:'commitments', controller: CommitmentController::class);
    Route::resource(name:'m_payment', controller: M_PaymentMethodController::class);
    Route::resource(name:'credit_card', controller: CreditCardController::class);
});

require __DIR__.'/auth.php';
