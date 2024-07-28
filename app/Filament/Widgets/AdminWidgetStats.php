<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Follower;
use App\Models\Like;
use App\Models\Rating;
use App\Models\Recipe;
use App\Models\User;

class AdminWidgetStats extends BaseWidget
{
    protected function getStats(): array
    {
        // Obtener el número de categorías, recetas y usuarios
        $categoryCount = Category::count();
        $recipeCount = Recipe::count();
        $userCount = User::count();
        $commentCount = Comment::count();
        $likeCount = Like::count();
        $ratingCount = Rating::count();

        return [
            Stat::make('Recipes', $recipeCount)
                ->icon('heroicon-o-book-open'),
            Stat::make('Categories', $categoryCount)
                ->icon('heroicon-o-tag'),
            Stat::make('Users', $userCount)
                ->icon('heroicon-o-users'),
            Stat::make('Likes', $likeCount)
                ->icon('heroicon-o-heart'),
            Stat::make('Ratings', $ratingCount)
                ->icon('heroicon-o-star'),
            Stat::make('Comments', $commentCount)
                ->icon('heroicon-o-chat-bubble-left-right'),
        ];
    }
}
