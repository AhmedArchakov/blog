<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class EditUser extends Component
{
    public $user;
    public $userName;
    public $password;
    public $password_confirmation;
    public $is_admin;

    public function mount($user)
    {
        $this->user = $user;
        $this->userName = $user->name;
        $this->is_admin = $user->is_admin;
    }

    public function changeName($id)
    {
        $this->validate([
            'userName' => ['required']
        ], [
            'userName.required' => 'Введите имя пользователя'
        ]);

        $user = User::find($id);

        $user->update(['name' => $this->userName]);
        session()->flash('success', 'Имя пользователя сохранено!');
    }

    public function changePassword($id)
    {
        $this->validate([
            'password' => ['required', 'confirmed'],
            'password_confirmation' => 'required'
        ],[
            'password.required' => 'Введите пароль',
            'password.confirmed' => 'Пароли не совпадают',
            'password_confirmation' => 'Повторите пароль'
        ]);

        $user = User::find($id);
        $user->update([
            'password' => Hash::make($this->password)
        ]);

        $this->reset('password', 'password_confirmation');
        session()->flash('success_password', 'Пароль изменен!');
    }

    public function changeGroup($id)
    {
        $user = User::find($id);
        $user->update(['is_admin' => $this->is_admin]);
        session()->flash('success_group', 'Группа изменена!');
    }

    public function close()
    {
        return redirect()->route('users.index');
    }



    public function render()
    {
        return view('livewire.admin.edit-user');
    }
}
