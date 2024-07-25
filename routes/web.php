<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use League\Csv\Query\Row;
use Illuminate\Http\Request;

Route::get('/', function (Request $request) {
    if (auth()->check()) {
        return view('index');
    }
    return app(HomeController::class)($request);
});


Route::get('/login', function () {
    return view('auth.auth');
})->name('login');

Route::get('/register', function () {
    return view('auth.auth');
})->name('register');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/recipes', function() {
        return view('user-content.recipes');
    })->name('recipes');
    Route::get('/saved-recipes', function() {
        return view('user-content.saved-recipes');
    })->name('saved-recipes');
    Route::get('/create-recipe', function () {
        return view('create-recipe');
    })->name('create-recipe');
});
