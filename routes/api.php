<?php
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CuadrosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;   


Route::resource('category',CategoryController::class)
            ->only(['index','show', 'update','store','destroy']);   

Route::resource('cuadros',CuadrosController::class)
            ->only(['index','show', 'update','store','destroy']);   