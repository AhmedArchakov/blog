<?php

namespace App\Livewire\Admin;

use App\Models\Comment;
use Livewire\Component;

class EditComment extends Component
{
    public $comment;

    public $content;

    public function mount($comment)
    {
        $this->comment = $comment;
        $this->content = $this->comment->content;
    }

    public function update($id)
    {
        $this->validate([
            'content' => ['required']
        ], [
            'content.required' => 'Введите текст комментария'
        ]);

        $comment = Comment::find($id);
        $comment->update([
           'content' => $this->content
        ]);

        return redirect(route('comments.index'))->with('success', 'Комментарий сохранен!');
    }

    public function render()
    {
        return view('livewire.admin.edit-comment');
    }
}
