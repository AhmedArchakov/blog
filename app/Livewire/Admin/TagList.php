<?php

namespace App\Livewire\Admin;

use App\Models\Tag;
use Livewire\Component;
use Livewire\WithPagination;

class TagList extends Component
{
    use WithPagination;
    public $perPage = 5;
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
        Tag::destroy($id);
    }


    public function render()
    {
        $tags = Tag::where('title', 'like', '%' . $this->query . '%')->paginate($this->perPage);
        return view('livewire.admin.tag-list', compact('tags'));
    }
}
