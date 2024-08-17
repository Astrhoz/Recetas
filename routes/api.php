<?php
use App\Models\Recipe;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

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