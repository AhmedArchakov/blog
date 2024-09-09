<?php

namespace App\Livewire\Admin;

use App\Models\Tag;
use Livewire\Component;

class CreateTag extends Component
{
    public $title;
    public $slug;

    public function store()
    {
        $data = $this->validate([
            'title' => ['required'],
            'slug' => ['required', 'unique:tags'],
        ], [
            'title.required' => 'Введите название тега',
            'slug.required' => 'Введите slug',
            'slug.unique' => 'Тег с таким slug уже существует',

        ]);

        Tag::create($data);
        return redirect()->route('tags.index')->with('success', 'Тег добавлен!');
    }
    public function render()
    {
        return view('livewire.admin.create-tag');
    }
}
