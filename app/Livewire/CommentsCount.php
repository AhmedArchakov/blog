<?php

namespace App\Livewire;


use App\Models\Comment;
use Livewire\Attributes\On;
use Livewire\Component;

class CommentsCount extends Component
{
    public $postId;

    #[On('comment-created')]
    public function render()
    {   $count = Comment::where('post_id', '=', $this->postId)->count();
        return view('livewire.comments-count', compact('count'));
    }
}
