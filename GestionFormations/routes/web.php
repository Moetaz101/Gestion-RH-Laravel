<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\FormationController;

Route::get('/', function () {
    return redirect()->route('formations.index');
});

Route::resource('formations', FormationController::class);
