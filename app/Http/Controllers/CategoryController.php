<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Список категорий';


        return view('admin.category.index', compact('title'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Добавить категорию';
        return view('admin.category.create', compact('title'));
    }

    public function edit($id)
    {
        $title = 'Редактировать категорию';
        $category = Category::find($id);

        return view('admin.category.edit', compact('title', 'category'));
    }

}
