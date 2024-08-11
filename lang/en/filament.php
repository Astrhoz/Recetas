<?php

return [
    'category' => [
        'singular' => 'Category',
        'plural' => 'Categories',
        'name' => 'Name',
        'description' => 'Description',
        'created_at' => 'Created At',
        'updated_at' => 'Updated At',
    ],

    'recipe' => [
        'singular' => 'Recipe',
        'plural' => 'Recipes',
        'title' => 'Title',
        'description' => 'Description',
        'ingredients' => 'Ingredients',
        'ingredient_name' => 'Ingredient Name',
        'quantity' => 'Quantity',
        'unit_of_measurement' => 'Unit of Measurement',
        'steps' => 'Steps',
        'tips' => 'Tips',
        'categories' => 'Categories',
        'images' => 'Images',
        'user_id' => 'User',
        'created_at' => 'Created At',
        'updated_at' => 'Updated At',
    ],

    'user' => [
        'singular' => 'User',
        'plural' => 'Users',
        'name' => 'Name',
        'email' => 'Email',
        'password' => 'Password',
        'roles' => 'Roles',
        'email_verified_at' => 'Email Verified At',
        'created_at' => 'Created At',
        'updated_at' => 'Updated At',
    ],

    'rating' => [
        'singular' => 'Rating',
        'plural' => 'Ratings',
        'score' => 'Score',
        'recipe_id' => 'Recipe',
        'user_id' => 'User',
        'created_at' => 'Created At',
        'updated_at' => 'Updated At',
        'recipe_image' => 'Recipe Image',
    ],

    'comment' => [
        'singular' => 'Comment',
        'plural' => 'Comments',
        'content' => 'Content',
        'recipe_id' => 'Recipe',
        'user_id' => 'User',
        'created_at' => 'Created At',
        'updated_at' => 'Updated At',
        'recipe_image' => 'Recipe Image',
    ],

    'like' => [
        'singular' => 'Like',
        'plural' => 'Likes',
        'recipe_id' => 'Recipe',
        'user_id' => 'User',
        'created_at' => 'Created At',
        'updated_at' => 'Updated At',
        'recipe_image' => 'Recipe Image',
    ],

    'follower' => [
        'singular' => 'Follower',
        'plural' => 'Followers',
        'user_id' => 'User',
        'followed_id' => 'Followed',
        'created_at' => 'Created At',
        'updated_at' => 'Updated At',
    ],

    'widgets' => [
        'recipe_growth_heading' => 'Recipe Growth',
        'recipe_growth_label' => 'Recipes',
        'user_growth_heading' => 'User Growth',
        'user_growth_label' => 'Users',
        'followers_heading' => 'Follower Growth',
        'follower_growth_label' => 'Followers',
        'stats' => [
            'recipes' => 'Recipes',
            'categories' => 'Categories',
            'users' => 'Users',
            'likes' => 'Likes',
            'ratings' => 'Ratings',
            'comments' => 'Comments',
            'followers' => 'Followers',
            'following' => 'Following',
        ],
    ],

    'groups' => [
        'interaction' => 'Interactions',
        'content' => 'Content management',
        'user' => 'User management',
        'report' => 'Reports',
    ],

    'pages' => [
        'recipe' => 'Monthly Recipes',
        'user' => 'User Report',
        'category' => 'Category Report',
    ],
];
