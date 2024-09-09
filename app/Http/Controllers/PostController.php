<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Список статей';
        return view('admin.post.index', compact('title'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('sort')->get();
        $tags = Tag::all();
        $title = 'Добавить статью';
        return view('admin.post.create', compact('title', 'categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'content' => ['required'],
            'category_id' => ['required'],
            'thumbnail' => ['required', 'image']
        ],
            [
                'title.required' => 'Заголовок должен быть заполнен',
                'description.required' => 'Описание должно быть заполнено',
                'content.required' => 'Полный текст статьи должен быть заполнен',
                'category_id.required' => 'Выберите категорию',
                'thumbnail.required' => 'Выберите изображение',
                'thumbnail.image' => 'Файл должен быть изображением',
            ]);

        $data = $request->all();

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail')->store('/uploads/images');
            $data['thumbnail'] = $file;
        }

        if ($request->boolean('show_on_slider')) {
            $data['show_on_slider'] = 1;
        }

        $post = Post::create($data);

        $post->tags()->sync($request->tag_id);

        return redirect()->route('posts.index')->with('success', 'Статья добавлена');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = 'Редактировать статью';
        $post = Post::find($id);
        $categories = Category::pluck('title', 'id');
        $tags = Tag::orderBy('title')->pluck('title', 'id');
//        dd($post, $categories, $tags);
        return view('admin.post.edit', compact('post', 'title', 'categories', 'tags'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'content' => ['required'],
            'category_id' => ['required'],
            'thumbnail' => ['image'],
            'created_at' => ['required']
        ],
            [
                'title.required' => 'Заголовок должен быть заполнен',
                'description.required' => 'Описание должно быть заполнено',
                'content.required' => 'Полный текст статьи должен быть заполнен',
                'category_id.required' => 'Выберите категорию',
                'thumbnail.image' => 'Файл должен быть изображением',
                'created_at.required' => 'Заполните дату'
            ]);

        $post = Post::find($id);
        $post->slug = null;
        $data = $request->all();

        if ($request->hasFile('thumbnail')) {
            Storage::delete($post->thumbnail);
            $file = $request->file('thumbnail')->store('/uploads/images');
            $data['thumbnail'] = $file;
        }

        if ($request->boolean('show_on_slider')) {
            $data['show_on_slider'] = 1;
        } else {
            $data['show_on_slider'] = 0;
        }

        $post->update($data);

        $post->tags()->sync($request->tags);

        return redirect()->route('posts.index')->with('success', 'Изменения сохранены!');

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post = Post::find($post->id);

        if ($post->thumbnail) {
            Storage::delete($post->thumbnail);
        }

        $post->delete();

        session()->flash('success', 'Статья удалена!');
        return redirect()->route('post.index');

    }


}
