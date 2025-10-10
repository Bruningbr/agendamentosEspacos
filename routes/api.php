<?php

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('usuarios', [UserController::class, 'store']);    
Route::get('usuarios', [UserController::class, 'index']);