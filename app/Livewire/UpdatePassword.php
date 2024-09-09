<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UpdatePassword extends Component
{
    public $password;
    public $password_confirmation;

    public function updatePassword()
    {
        $this->validate([
            'password' => ['required', 'confirmed'],
            'password_confirmation' => ['required']
        ], [
            'password.required' => 'Введите пароль',
            'password.confirmed' => 'Пароли должны совпадать',
            'password_confirmation.required' => 'Повторите пароль'
        ]);

        if (Auth::user()->update([
            'password' => Hash::make($this->password)
        ])) {
            session()->flash('success', 'Пароль успешно изменен!');
            $this->reset('password', 'password_confirmation');
        } else {
            session()->flash('error', 'Пароль не изменен!');
        }

    }

    public function render()
    {
        return view('livewire.update-password');
    }
}
