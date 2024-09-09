<?php

namespace App\Livewire\Admin;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $query;

    public function updatedPerPage()
    {
        $this->resetPage();
    }

    public function updatedQuery()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        Post::destroy($id);
    }

    public function render()
    {
        $posts = Post::where('title', 'like', '%' . $this->query . '%')->orderBy('created_at', 'desc')->paginate($this->perPage);

        return view('livewire.admin.post-list', compact('posts'));
    }
}
