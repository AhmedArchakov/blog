<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [HomeController::class, 'about'])->name('about');


// Admin contollers
Route::middleware('admin')->prefix('/admin')->group(function () {

    Route::get('/', [AdminController::class, 'index'])->name('admin.index');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');

    Route::get('/tags', [TagController::class, 'index'])->name('tags.index');
    Route::get('/tags/create', [TagController::class, 'create'])->name('tags.create');
    Route::get('/tags/{id}/edit', [TagController::class, 'edit'])->name('tags.edit');

    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::post('/posts/{id}', [PostController::class, 'update'])->name('posts.update');

    Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');
    Route::get('/comments/{id}/edit', [CommentController::class, 'edit'])->name('comments.edit');

    Route::get('/users', [UserController::class, 'adminUsersIndex'])->name('users.index');
    Route::get('/users/{id}/edit', [UserController::class, 'adminUsersEdit'])->name('users.edit');

});
// End Admin Controllers


Route::get('/category/{slug}', [HomeController::class, 'category'])->name('category');

Route::get('/tag/{slug}', [HomeController::class, 'tag'])->name('tag');

Route::get('/post/{slug}', [HomeController::class, 'showPost'])->name('post');

Route::post('/post/{id}', [HomeController::class, 'storeComment'])->name('comment.store');

Route::get('/contact', [\App\Http\Controllers\MailController::class, 'showForm'])->name('contact');

Route::post('/contact', [\App\Http\Controllers\MailController::class, 'sendMail'])->name('contact.send');

Route::get('/search', [HomeController::class, 'searchResult'])->name('search');

// User routes

Route::middleware(['auth'])->group(
    function () {
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

        Route::get('/dashboard/profile', [UserController::class, 'profile'])->name('profile');

        Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    }
);

Route::middleware('guest')->group(function () {
    Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register');

    Route::get('/login', [UserController::class, 'login'])->name('login');

    Route::get('/forgot-password', function () {
        return view('user.forgot-password');
    })->name('password.request');

    Route::post('/forgot-password', [UserController::class, 'forgotPassword'])->name('password.email');

    Route::get('/reset-password/{token}', function (string $token) {
        return view('user.reset-password', ['token' => $token]);
    })->name('password.reset');

    Route::post('/reset-password', [UserController::class, 'resetPassword'])->name('password.update');
});



