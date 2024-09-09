<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use function Laravel\Prompts\error;

class LoginForm extends Component
{
    public $email;
    public $password;
    public $remember = false;

    public function login()
    {

        $credentials = $this->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ], [
            'email.required' => 'Введите email',
            'email.email' => 'Введите корретный email',
            'password.required' => 'Введите пароль'
        ]);

        if (Auth::attempt($credentials, $this->remember)) {
            if (Auth::user()->is_admin) {
                session()->regenerate();
                return redirect()->route('admin.index');
            } else {
                session()->regenerate();
                return redirect('/dashboard');
            }

        } else {
            session()->flash('error', 'Вы ввели неправильный логин или пароль');
            $this->reset('password');
        }


    }

    public function render()
    {
        return view('livewire.login-form');
    }
}
