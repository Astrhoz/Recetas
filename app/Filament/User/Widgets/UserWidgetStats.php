<?php

namespace App\Filament\User\Widgets;

use App\Models\Comment;
use App\Models\Follower;
use App\Models\Like;
use App\Models\Rating;
use App\Models\Recipe;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class UserWidgetStats extends BaseWidget
{
    protected function getStats(): array
    {
        // Obtener el usuario actualmente autenticado
        $user = Auth::user();
        // Obtener el número de recetas del usuario actualmente autenticado
        $recipeCount = Recipe::where('user_id', $user->id)->count();
        $commentCount = Comment::where('user_id', $user->id)->count();
        $likeCount = Like::where('user_id', $user->id)->count();
        $ratingCount = Rating::where('user_id', $user->id)->count();
        $followerCount = Follower::where('followed_id', $user->id)->count();
        $followedCount = Follower::where('user_id', $user->id)->count();

        return [
            Stat::make('Recipes', $recipeCount)
                ->icon('heroicon-o-book-open'),
            Stat::make('Comments', $commentCount)
                ->icon('heroicon-o-chat-bubble-left-right'),
            Stat::make('Likes', $likeCount)
                ->icon('heroicon-o-heart'),
            Stat::make('Ratings', $ratingCount)
                ->icon('heroicon-o-star'),
            Stat::make('Followers', $followerCount)
                ->icon('heroicon-o-user-plus'),
            Stat::make('Following', $followedCount)
                ->icon('heroicon-o-user'),
        ];
    }
}
