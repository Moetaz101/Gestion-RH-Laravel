<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EvaluationController;


Route::get('/', function () {
    return redirect()->route('evaluations.index');
});

Route::resource('evaluations', EvaluationController::class);