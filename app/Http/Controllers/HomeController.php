<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        $postsOnSlider = Post::where('show_on_slider', 1)->orderBy('created_at', 'desc')->limit(6)->get();

        $posts = Post::where('show_on_slider', '=', 0)->orderBy('created_at', 'desc')->paginate(6);


        return view('index', compact('postsOnSlider', 'posts'));

    }

    public function category($slug)
    {
        $category = Category::where('slug', '=', $slug)->firstOrFail();
        $posts = $category->posts()->orderBy('created_at', 'desc')->paginate(6);
        $title = $category->title;
        return view('category', compact('category', 'posts', 'title'));
    }

    public function tag($slug)
    {
        $tag = Tag::where('slug', '=', $slug)->firstOrFail();
        $posts = $tag->posts()->orderBy('created_at', 'desc')->paginate(6);
        $title = $tag->title;
        return view('tag', compact('tag', 'posts', 'title'));

    }

    public function showPost($slug)
    {
        $curr_post = Post::where('slug', '=', $slug)->firstOrFail();
        $curr_post->increment('views');
        $title = $curr_post->title;

        return view('singlepost', compact('curr_post', 'title'));
    }

    public function storeComment(Request $request, $id)
    {
        $request->validate([
            'content' => ['required'],
            'name' => ['required'],
            'email' => ['required', 'email'],
        ],
            [
                'content.required' => 'Заполните комментарий',
                'name.required' => 'Заполните имя',
                'email.required' => 'Заполните email',
                'email.email' => 'Заполните корректный email',
            ]);

        $data = $request->all();
        $data['post_id'] = $id;
        Comment::create($data);
        session()->flash('success', 'Комментарий добавлен!');
        return redirect()->back();


    }

    public function about()
    {
        $title = 'Обо мне';
        return view('about', compact('title'));
    }


    public function searchResult(Request $request)
    {
        if ($request->s) {
            $result = Post::search($request->s)->paginate(9)->withQueryString();

            return view('search', compact('result'));
        } else {

            return view('search');
        }
    }

    public function showRegisterForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'unique:users', 'max:255'],
            'password' => ['required', 'string', 'confirmed'],
        ],
            [
                'name.required' => 'Введите имя',
                'name.string' => 'Введите корректное имя',
                'name.max' => 'Максимальное количество символов: 255',
                'email.required' => 'Введите email',
                'email.string' => 'Введите email',
                'email.email' => 'Введите корректный email',
                'email.unique' => 'Пользователь с таким email уже зарегистрирован',
                'password.required' => 'Введите пароль',
                'password.confirmed' => 'Пароли должны совпадать',
            ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login.form')->with('success', 'Вы успешно зарегистрировались. Теперь Вы можете войти на сайт используя свой логин и пароль');
    }

    public function showLoginForm()
    {
        return view('login');

    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ],
            [
                'email.required' => 'Введите email',
                'password.required' => 'Введите пароль',
            ]);

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            if (Auth::user()->is_admin) {
                return redirect()->route('admin.home');
            } else {
                return  redirect()->route('home');
            }
        } else {
            return redirect()->back()->with('error', 'Вы ввели неправильный логин или пароль');
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');

    }


}
