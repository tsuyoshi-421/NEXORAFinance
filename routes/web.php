<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\AccountsController;
Route::get('signin', function () {
    return view('signin');
})->name('signin');

Route::view('/contactus','contactus')->name('contactus');

Route::get('maindash', function () {
    return view('maindash');
})->name('maindash');

Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('invoicedash', [InvoiceController::class, 'index'])->name('invoicedash');

Route::get('invoice/{id}/print', [InvoiceController::class, 'print'])
    ->name('invoice.print');

Route::put('/invoice/{invoice}', [InvoiceController::class, 'update'])
    ->name('invoice.update');    

Route::get('expensesdash', [ExpensesController::class, 'index'])->name('expensesdash');

Route::get('salesdash', function () {
    return view('salesdash');
})->name('salesdash');

Route::get('cashflowdash', function () {
    return view('cashflowdash');
})->name('cashflowdash');

Route::get('/accountsdash', [AccountsController::class, 'index'])->name('accountsdash');

Route::post('/accounts', [AccountsController::class, 'store'])
    ->name('accounts.store');

Route::put('/accounts/{account}', [AccountsController::class, 'update'])
    ->name('accounts.update');

Route::delete('/accounts/{account}', [AccountsController::class, 'destroy'])
    ->name('accounts.destroy');