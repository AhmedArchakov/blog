<?php

namespace App\Livewire\Admin;

use App\Models\Tag;
use Livewire\Component;

class EditTag extends Component
{
    public $title;
    public $slug;
    public $tag;

    public function mount($tag)
    {
        $this->tag = $tag;
        $this->title = $tag->title;
        $this->slug = $tag->slug;

    }

    public function update($id)
    {
        $this->validate([
            'title' => ['required'],
            'slug' => ['required'],
        ], [
            'title.required' => 'Введите название тега',
            'slug.required' => 'Введите slug',

        ]);

        $tag = Tag::find($id);
        $tag->update([
            'title' => $this->title,
            'slug' => $this->slug
        ]);

        return redirect()->route('tags.index')->with('success', 'Тег изменен!');


    }


    public function render()
    {
        return view('livewire.admin.edit-tag');
    }
}
