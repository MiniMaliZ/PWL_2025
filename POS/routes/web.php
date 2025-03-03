<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SalesController;


Route::get('/', [HomeController::class, 'index']);

Route::prefix('category')->group(function () {
    Route::get('/food-beverage', [ProductControlLer :: class, 'foodBeverage' ]);
    Route:: get('/beauty-health', [ProductControlLer :: class, 'beautyHealth' ]);
    Route:: get('/home-care', [ProductController :: class, 'homeCare' ]);
    Route::get('/baby-kid', [ProductControlLer :: class, 'babykid' ]);
});

Route::get('/user/{id}/name/{name}', [UserController::class, 'user']);

Route::get('/sales', [SalesController::class, 'sales']);