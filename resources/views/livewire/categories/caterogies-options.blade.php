@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Mis Recetas</h1>

        <!-- Aquí se renderiza el componente de categorías -->
        <div class="mb-4">
            <livewire:categories.categories-options />
        </div>

        <!-- Aquí podrían ir otros componentes de recetas o contenido -->
        <div class="my-recipes-content">
            <!-- Contenido relacionado con las recetas del usuario -->
        </div>
    </div>
@endsection
