<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
}
public function show($page = 'dashboard')
{
    return view('layout', ['page' => $page]);
}

