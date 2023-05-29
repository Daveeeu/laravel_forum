<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;

Route::get('/examples', [ExampleController::class, 'index']);
Route::get('/examples/{id}', [ExampleController::class, 'show']);
Route::post('/examples', [ExampleController::class, 'store']);
Route::put('/examples/{id}', [ExampleController::class, 'update']);
Route::delete('/examples/{id}', [ExampleController::class, 'destroy']);
