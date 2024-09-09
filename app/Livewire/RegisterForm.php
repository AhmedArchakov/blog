<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Livewire\Component;

class RegisterForm extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public function store()
    {
        $this->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
            'password_confirmation' => ['required']
        ], [
            'name.required' => 'Введите имя',
            'name.max' => 'Максимальное количество сивомолов: 255',
            'email.required' => 'Введите email',
            'email.email' => 'Введите корректный email',
            'email.max' => 'Максимальное количество символов: 255',
            'email.unique' => 'Пользователь с таким email уже зарегистрирован',
            'password.required' => 'Введите пароль',
            'password.confirmed' => 'Пароли должны совпадать',
            'password_confirmation.required' => 'Повторите пароль'

        ]);


        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);

        \Auth::login($user);

        return $this->redirect('/dashboard');
    }


    public function render()
    {
        return view('livewire.register-form');
    }
}
