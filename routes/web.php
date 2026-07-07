<?php

use Illuminate\Support\Facades\Route;

Route::get('signin', function () {
    return view('signin');
})->name('signin');

Route::view('/contactus','contactus')->name('contactus');

Route::get('mainDash', function () {
    return view('mainDash');
})->name('mainDash');

Route::get('Dashboard', function () {
    return view('Dashboard');
})->name('Dashboard');

Route::get('invoiceDash', function () {
    return view('invoiceDash');
})->name('invoiceDash');

Route::get('invoice', function () {
    return view('invoice');
});

Route::get('expensesDash', function () {
    return view('expensesDash');
})->name('expensesDash');

Route::get('salesDash', function () {
    return view('salesDash');
})->name('salesDash');

Route::get('cashflowDash', function () {
    return view('cashflowDash');
})->name('cashflowDash');

Route::get('accountsDash', function () {
    return view('accountsDash');
})->name('accountsDash');

