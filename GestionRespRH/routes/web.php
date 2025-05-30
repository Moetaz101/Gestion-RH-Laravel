<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\ResponsableRHController;

Route::get('/', function () {
    return redirect()->route('responsablerh.index');
});

Route::resource('responsablerh', ResponsableRHController::class);
