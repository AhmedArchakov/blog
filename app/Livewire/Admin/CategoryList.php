<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryList extends Component
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
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Категория удалена!');
    }


    public function render()
    {
        $categories = Category::where('title', 'like', '%' . $this->query . '%')->orderBy('sort')->paginate($this->perPage);
        return view('livewire.admin.category-list', compact('categories'));
    }


}
