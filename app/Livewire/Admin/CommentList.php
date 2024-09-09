<?php

namespace App\Livewire\Admin;

use App\Models\Comment;
use Livewire\Component;
use Livewire\WithPagination;

class CommentList extends Component
{
    use WithPagination;
    public $perPage = 10;
    public $query;

    public function uodatedPerPage()
    {
        $this->resetPage();

    }

    public function updatedQuery()
    {
        $this->resetPage();
    }

    public function render()
    {
        $comments = Comment::where('content', 'like', '%' . $this->query . '%')->orderBy('created_at', 'desc')->paginate($this->perPage);
        return view('livewire.admin.comment-list', compact('comments'));
    }



    public function delete($id)
    {
        Comment::destroy($id);
    }
}
