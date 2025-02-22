<?php

use App\Http\Controllers\APISTaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/task', APISTaskController::class);//não precisa dar nome pois não vamos chamar a rota internamente
