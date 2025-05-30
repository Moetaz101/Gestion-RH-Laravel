<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\CongeController;

Route::get('/', function () {
    return redirect()->route('conges.index');
});

Route::resource('conges', CongeController::class);
