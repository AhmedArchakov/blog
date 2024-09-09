<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;

class CreateCategory extends Component
{
    public $title;
    public $slug;
    public $sort;

    public function store()
    {
        $data = $this->validate([
            'title' => ['required'],
            'slug' => ['required', 'unique:categories'],
            'sort' => ['required', 'numeric']
        ], [
            'title.required' => 'Введите название категории',
            'slug.required' => 'Введите slug',
            'slug.unique' => 'Категория с таким slug уже существует',
            'sort.required' => 'Введите сортировку',
            'sort.numeric' => 'Сортировка должна быть числом',
        ]);


        Category::create($data);

        return redirect()->route('categories.index')->with('success', 'Категория добавлена!');
    }

    public function render()
    {
        return view('livewire.admin.create-category');
    }
}
