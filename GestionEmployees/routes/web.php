<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return redirect()->route('employees.index');
});

Route::resource('employees', EmployeeController::class);
