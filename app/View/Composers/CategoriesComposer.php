<?php

namespace App\View\Composers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\View\View;

class CategoriesComposer
{

    public function compose(View $view)
    {
        $categories = Category::orderBy('sort')->get();
        $tags = Tag::all();
        $recentPosts = Post::orderBy('created_at', 'desc')->limit(3)->get();
        $view->with('categoryList', $categories);
        $view->with('tagList', $tags);
        $view->with('recentPosts', $recentPosts);

    }

}
