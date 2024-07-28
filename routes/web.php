<?php

use App\Models\Recipe;
use App\Http\Controllers\HomeController;
use App\Livewire\Recipes\CreateRecipe;
use App\Livewire\Recipes\EditRecipe;
use Illuminate\Support\Facades\Route;
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
    Route::get('/my-recipes', function () {
        return view('my-recipes'); // Renderiza la vista que contiene el componente Livewire
    })->name('my-recipes');

    Route::get('/my-recipes/new-recipe', function () {
        return view('new-recipe'); // Renderiza la vista que contiene el componente Livewire
    })->name('new-recipe');

    Route::get('/my-recipes/edit-recipe/{recipe}', function ($recipeId) {
        // Encuentra la receta o muestra un error 404 si no se encuentra
        $recipe = Recipe::findOrFail($recipeId);

        // Devuelve la vista y la receta
        return view('edit-recipe', compact('recipe'));
    })->name('edit-recipe');
});
