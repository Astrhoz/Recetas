<?php

namespace App\Livewire\Follows;

use Livewire\Component;
use App\Models\Follower;
use Illuminate\Support\Facades\Auth;

class FollowUser extends Component
{
    public $userId;
    public $toFollowUserId;
    public $following;

    // Este método se ejecuta cuando se instancia el componente y recibe el ID
    public function mount($toFollowUserId)
    {
        $this->userId = Auth::id();
        $this->toFollowUserId = $toFollowUserId;
        $this->following = Follower::where('user_id', $this->userId)
                                    ->where('followed_id', $this->toFollowUserId)
                                    ->exists();
    }

    public function follow()
    {
        Follower::create([
            'user_id' => $this->userId,
            'followed_id' => $this->toFollowUserId
        ]);
        $this->following = true;
    }

    public function unfollow()
    {
        Follower::where('user_id', $this->userId)
                ->where('followed_id', $this->toFollowUserId)
                ->delete();

        $this->following = false;
    }

    public function render()
    {
        return view('livewire.follows.follow-user');
    }
}
