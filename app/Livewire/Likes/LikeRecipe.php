<?php

namespace App\Livewire\Likes;

use Livewire\Component;
use App\Models\Recipe;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeRecipe extends Component
{
    public $recipeId;
    public $userId;

    public function mount($recipeId)
    {
        $this->recipeId = $recipeId;
        $this->userId = Auth::id(); // Obtiene el ID del usuario autenticado
    }

    public function toggleLike()
    {
        $like = Like::where('recipe_id', $this->recipeId)
                    ->where('user_id', $this->userId)
                    ->first();

        if ($like) {
            $like->delete();
        } else {
            Like::create([
                'recipe_id' => $this->recipeId,
                'user_id' => $this->userId,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.likes.like-recipe', [
            'isLiked' => Like::where('recipe_id', $this->recipeId)->where('user_id', $this->userId)->exists(),
            'likesCount' => Like::where('recipe_id', $this->recipeId)->count(),
        ]);
    }
}
