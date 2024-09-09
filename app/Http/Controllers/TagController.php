<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Список тегов';

        return view('admin.tag.index', compact('title'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Добавить тег';
        return view('admin.tag.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    /*public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'slug' => ['required', 'unique:tags']
        ],
            [
                'title.required' => 'Заполните поле заголовок',
                'slug.required' => 'Заполните поле slug',
                'slug.unique' => 'Тег с таким slug существует',
            ]);

        Tag::create($request->all());
        session()->flash('success', 'Тег добавлен');
        return redirect()->route('tag.index');
    }*/



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = 'Редактировать тег';

        $tag = Tag::find($id);

        return view('admin.tag.edit', compact('title', 'tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'title' => ['required'],
            'slug' => ['required'],

        ],
            [
                'title.required' => 'Заполните поле название',
                'slug.required' => 'Заполните поле slug',

            ]);

        $data = $request->all();

        $tag = Tag::find($tag->id);

        $tag->update($data);

        session()->flash('success', 'Тег сохранен');
        return redirect()->route('tag.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        Tag::destroy($tag->id);
        session()->flash('success', 'Тег удален');
        return redirect()->route('tag.index');
    }
}
