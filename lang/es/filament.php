<?php

return [
    'category' => [
        'singular' => 'Categoría',
        'plural' => 'Categorías',
        'name' => 'Nombre',
        'description' => 'Descripción',
        'created_at' => 'Creado el',
        'updated_at' => 'Actualizado el',
    ],

    'recipe' => [
        'singular' => 'Receta',
        'plural' => 'Recetas',
        'title' => 'Título',
        'description' => 'Descripción',
        'ingredients' => 'Ingredientes',
        'ingredient_name' => 'Nombre del ingrediente',
        'quantity' => 'Cantidad',
        'unit_of_measurement' => 'Unidad de Medida',
        'steps' => 'Pasos',
        'tips' => 'Consejos',
        'categories' => 'Categorías',
        'images' => 'Imágenes',
        'user_id' => 'Usuario',
        'created_at' => 'Creado el',
        'updated_at' => 'Actualizado el',
    ],

    'user' => [
        'singular' => 'Usuario',
        'plural' => 'Usuarios',
        'name' => 'Nombre',
        'email' => 'Correo Electrónico',
        'password' => 'Contraseña',
        'roles' => 'Roles',
        'email_verified_at' => 'Correo Verificado el',
        'created_at' => 'Creado el',
        'updated_at' => 'Actualizado el',
    ],

    'rating' => [
        'singular' => 'Calificación',
        'plural' => 'Calificaciones',
        'score' => 'Puntuación',
        'recipe_id' => 'Receta',
        'user_id' => 'Usuario',
        'created_at' => 'Creado el',
        'updated_at' => 'Actualizado el',
        'recipe_image' => 'Imagen de la receta',
    ],

    'comment' => [
        'singular' => 'Comentario',
        'plural' => 'Comentarios',
        'content' => 'Contenido',
        'recipe_id' => 'Receta',
        'user_id' => 'Usuario',
        'created_at' => 'Creado el',
        'updated_at' => 'Actualizado el',
        'recipe_image' => 'Imagen de la receta',
    ],

    'like' => [
        'singular' => 'Me gusta',
        'plural' => 'Me gusta',
        'recipe_id' => 'Receta',
        'user_id' => 'Usuario',
        'created_at' => 'Creado el',
        'updated_at' => 'Actualizado el',
        'recipe_image' => 'Imagen de la receta',
    ],

    'follower' => [
        'singular' => 'Seguidor',
        'plural' => 'Seguidores',
        'user_id' => 'Usuario',
        'followed_id' => 'Seguido',
        'created_at' => 'Creado el',
        'updated_at' => 'Actualizado el',
    ],

    'widgets' => [
        'recipe_growth_heading' => 'Crecimiento de Recetas',
        'recipe_growth_label' => 'Recetas',
        'user_growth_heading' => 'Crecimiento de Usuarios',
        'user_growth_label' => 'Usuarios',
        'followers_heading' => 'Crecimiento de Seguidores',
        'follower_growth_label' => 'Seguidores',
        'stats' => [
            'recipes' => 'Recetas',
            'categories' => 'Categorías',
            'users' => 'Usuarios',
            'likes' => 'Me gusta',
            'ratings' => 'Calificaciones',
            'comments' => 'Comentarios',
            'followers' => 'Seguidores',
            'following' => 'Siguiendo',
        ],
    ],


];
