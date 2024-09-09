<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GerenteController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/gerentes', [GerenteController::class, 'index']);
Route::get('/admins', [AdminsController::class], 'index');