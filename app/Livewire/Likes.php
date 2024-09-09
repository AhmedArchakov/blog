<?php

namespace App\Livewire;

use App\Models\Like;
use App\Models\User;
use Livewire\Component;

class Likes extends Component
{
    public $postId;

    public $userId;



    public function toggleLike()
    {
        $user = User::find($this->userId);

        $user->likes()->toggle($this->postId);

        $this->dispatch('liked');


    }
    public function render()
    {
        $isActive = Like::where('post_id', '=', $this->postId)->where('user_id', '=', $this->userId)->exists();

        return view('livewire.likes', compact('isActive'));
    }
}
