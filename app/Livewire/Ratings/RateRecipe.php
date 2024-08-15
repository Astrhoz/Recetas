<?php

namespace App\Livewire\Ratings;

use Livewire\Component;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

class RateRecipe extends Component
{
    public $recipeId;
    public $rating;
    public $userRating;

    public function mount($recipeId)
    {
        $this->recipeId = $recipeId;
        $this->userRating = Rating::where('recipe_id', $this->recipeId)
                                  ->where('user_id', Auth::id())
                                  ->value('score');
        $this->rating = $this->userRating ?: 0;
    }

    public function rate($value)
    {
        if ($this->userRating && $this->userRating == $value) {
            // Si el usuario hace clic en la misma calificación, se elimina
            $this->removeRating();
        } else {
            // Si es una nueva calificación o una modificación, se actualiza
            $this->rating = $value;
            Rating::updateOrCreate(
                ['recipe_id' => $this->recipeId, 'user_id' => Auth::id()],
                ['score' => $this->rating]
            );
            $this->userRating = $this->rating;
        }
    }

    public function removeRating()
    {
        Rating::where('recipe_id', $this->recipeId)
              ->where('user_id', Auth::id())
              ->delete();

        $this->rating = 0;
        $this->userRating = null;
    }

    public function render()
    {
        return view('livewire.ratings.rate-recipe');
    }
}
