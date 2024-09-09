<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;

class CommentRespond extends Component
{
    public $content;

    public $email;
    public $postId;
    public $userId;


    public function store()
    {

        $this->validate([
            'content' => ['required'],

            'email' => ['required', 'email'],
        ],
            [
                'content.required' => 'Заполните комментарий',

                'email.required' => 'Заполните email',
                'email.email' => 'Заполните корректный email',
            ]);


        $data = [
            'content' => $this->content,

            'email' => $this->email,
            'post_id' => $this->postId,
            'user_id' => $this->userId,
        ];

        Comment::create($data);

        session()->flash('success', 'Комментарий успешно добавлен!');
        $this->reset('content', 'email');

        $this->dispatch('comment-created');

    }
    public function render()
    {
        $comments = Comment::where('post_id', '=', $this->postId)->get();
        return view('livewire.comment-respond', compact('comments'));
    }
}
