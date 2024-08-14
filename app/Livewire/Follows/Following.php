<?php

namespace App\Livewire\Follows;

use Livewire\Component;
use App\Models\Follower;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Following extends Component
{
    public $userId;
    public $followingUsers = [];

    // Este método se ejecuta cuando se instancia el componente y recibe el ID
    public function mount()
    {
        $this->userId = Auth::id();

        // Obtener todos los IDs de usuarios seguidos
        $followingIds = Follower::where('user_id', $this->userId)
                                ->pluck('followed_id');

        // Obtener los detalles de los usuarios seguidos
        $this->followingUsers = User::whereIn('id', $followingIds)->get();
    }

    public function render()
    {
        return view('livewire.follows.following', [
            'followingUsers' => $this->followingUsers,
        ]);
    }
}
