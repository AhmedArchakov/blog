<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $title = 'Комментарии';
        return view('admin.comment.index', compact('title') );
    }

    public function edit($id)
    {
        $title = 'Редактировать комментарий';
        $comment = Comment::find($id);
        return view('admin.comment.edit', compact('comment', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $comment = Comment::find($comment->id);

        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'content' => ['required'],
        ], [
            'name.required' => 'Введите имя',
            'email.required' => 'Введите email',
            'email.email' => 'Введите корректный email',
            'content.required' => 'Введите текст комментария',
            ]);

        $comment->update($request->all());
        return redirect()->route('comment.index')->with('success', 'Комментарий сохранен!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        Comment::destroy($comment->id);

        return redirect()->route('comment.index')->with('success', 'Комментарий удален');
    }
}
