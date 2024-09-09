<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Tag;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePost extends Component
{
    use WithFileUploads;

    public $title;
    public $slug;
    public $description;
    public $content;
    public $thumbnail;
    public $showOnSlider;
    public $categoryID;
    public $tags2 = [];

    public function store()
    {
//        dd($this->title, $this->categoryID, $this->description, $this->content, $this->thumbnail, $this->showOnSlider,  $this->tags2);
        dd($this->title, $this->categoryID, $this->tags2, $this->content);

        $data = $this->validate([
            'title' => ['required'],
            'description' => ['required'],
            'content' => ['required'],
            'category_id' => ['required'],
            'thumbnail' => ['image']
        ],
            [
                'title.required' => 'Заголовок должен быть заполнен',
                'description.required' => 'Описание должно быть заполнено',
                'content.required' => 'Полный текст статьи должен быть заполнен',
                'category_id.required' => 'Выберите категорию',
                'thumbnail.image' => 'Файл должен быть изображением',
            ]);
    }

    public function render()
    {
        $categories = Category::orderBy('title')->get();
        $tags = Tag::orderBy('title')->get();
        return view('livewire.admin.create-post', compact('categories', 'tags'));
    }
}
