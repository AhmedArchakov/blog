<?php

namespace App\Livewire;

use App\Models\Like;
use Livewire\Attributes\On;
use Livewire\Component;

class LikesCount extends Component
{
    public $postId;

    #[On('liked')]
    public function render()
    {
        $count = Like::where('post_id', '=', $this->postId)->count();
        return view('livewire.likes-count', compact('count'));
    }
}
