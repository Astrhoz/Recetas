<?php

use App\Models\Recipe;
use App\Models\Category;
use App\Http\Controllers\HomeController;
use App\Livewire\Recipes\CreateRecipe;
use App\Livewire\Recipes\EditRecipe;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Filament\Pages\RecipesReport;

Route::get('/', function (Request $request) {
    if (auth()->check()) {
        return view('feed');
    }
    return app(HomeController::class)($request);
});

Route::get('/recipe/{recipe}', function ($recipeId) {
    // Encuentra la receta o muestra un error 404 si no se encuentra
    $recipe = Recipe::findOrFail($recipeId);

    // Devuelve la vista y la receta
    return view('recipe', compact('recipe'));
})->name('recipe');

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

// Endpoint para obtener todas las recetas del sitio
Route::get('/recetas', function () {
    // Obtén las recetas de todo el sitio
    $recipes = Recipe::all();

    // Devuelve las recetas como JSON
    return response()->json($recipes);
})->name('recetas');

// Endpoint para obtener todas las categorías del sitio
Route::get('/categorias', function () {
    // Obtén las categorías de todo el sitio
    $recipes = Category::all();

    // Devuelve las categorías como JSON
    return response()->json($recipes);
})->name('categorias');

// Endpoint para obtener las recetas del usuario autenticado
Route::get('/usuario-recetas/{usuario}', function ($userId) {
    // Obtén las recetas del usuario autenticado
    $recipes = Recipe::where('user_id', $userId)->get();

    // Devuelve las recetas como JSON
    return response()->json($recipes);
})->name('usuario-recetas');

Route::get('/recipes-report/pdf/{month}', [RecipesReport::class, 'generatePdf'])->name('recipes-report.pdf');
