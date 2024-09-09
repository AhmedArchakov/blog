<?php

namespace App\Http\Controllers;

use App\Mail\SimpleMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{

    public function showForm()
    {
        return view('contact');
    }

    public function sendMail(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'email' => ['email'],
            'message' => ['required']
        ], [
            'name.required' => 'Введите имя',
            'email.email' => 'Введите корректный email',
            'message.required' => 'Введите сообщение',
            ]);


        Mail::to('iceman2000@mail.ru')->send(new SimpleMail($data));
        return redirect()->back()->with('success', 'Сообщение отправлено!');
    }
}
