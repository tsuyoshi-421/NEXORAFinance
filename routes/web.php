<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;

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

Route::get('invoice', function () {
    return view('invoice');
});

Route::get('expensesdash', function () {
    return view('expensesdash');
})->name('expensesdash');

Route::get('salesdash', function () {
    return view('salesdash');
})->name('salesdash');

Route::get('cashflowdash', function () {
    return view('cashflowdash');
})->name('cashflowdash');

Route::get('accountsdash', function () {
    return view('accountsdash');
})->name('accountsdash');



