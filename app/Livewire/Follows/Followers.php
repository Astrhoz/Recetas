<?php

namespace App\Livewire\Follows;

use Livewire\Component;
use App\Models\Follower;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Followers extends Component
{
    public $userId;
    public $followers = [];

    // Este método se ejecuta cuando se instancia el componente
    public function mount()
    {
        $this->userId = Auth::id();

        // Obtener todos los IDs de usuarios que siguen al usuario autenticado
        $followerIds = Follower::where('followed_id', $this->userId)
                                ->pluck('user_id');

        // Obtener los detalles de los seguidores
        $this->followers = User::whereIn('id', $followerIds)->get();
    }

    public function render()
    {
        return view('livewire.follows.followers', [
            'followers' => $this->followers,
        ]);
    }
}
