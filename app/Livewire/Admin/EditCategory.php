<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;

class EditCategory extends Component
{
    public $title;
    public $slug;
    public $sort;

    public $category;

    public function mount($category = null)
    {
        $this->category = $category;

        $this->title = $category->title;
        $this->slug = $category->slug;
        $this->sort = $category->sort;

    }

    public function update($id)
    {
        $this->validate([
            'title' => ['required'],
            'slug' => ['required'],
            'sort' => ['required', 'numeric']
        ], [
            'title.required' => 'Введите название категории',
            'slug.required' => 'Введите slug',
            'sort.required' => 'Введите сортировку',
            'sort.numeric' => 'Сортировка должна быть числом',
        ]);

        $category = Category::find($id);

        $category->update([
            'title' => $this->title,
            'slug' => $this->slug,
            'sort' => $this->sort
        ]);

        return redirect()->route('categories.index')->with('success', 'Категория изменена!');

    }

    public function render()
    {

        return view('livewire.admin.edit-category');
    }
}
