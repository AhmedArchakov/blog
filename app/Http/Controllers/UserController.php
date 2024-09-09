<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function showRegisterForm()
    {
        return view('user.register');
    }

    public function store(Request $request)
    {
        $request->validate([
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

        $user = User::create($request->all());

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('verification.notice');
    }

    public function login()
    {
        return view('user.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ], [
            'email.required' => 'Введите email',
            'email.email' => 'Введите корретный email',
            'password.required' => 'Введите пароль'
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors(['status' => 'Вы ввели неправильный логин или пароль']);
    }

    public function dashboard()
    {
        $posts = Auth::user()->likes()->orderBy('created_at', 'desc')->paginate(6);
        return view('user.dashboard', compact('posts'));
    }

    public function profile()
    {
        return view('user.profile');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');

    }

    public function forgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email'], [
            'email.required' => 'Введите email',
            'email.email' => 'Введите корректный email',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['success' => 'Ссылка для сброса пароля отправлена на ваш email'])
            : back()->withErrors(['email' => 'Пользователь с данным email не зарегистрирован']);

    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ], [
            'token.required' => 'Не указан токен',
            'email.required' => 'Введите email',
            'email.email' => 'Введите корректный email',
            'password.required' => 'Введите пароль',
            'password.confirmed' => 'Пароли должны совпадать',
            'password_confirmation.required' => 'Повторите пароль'
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', 'Пароль изменен! Чтобы войти на сайт используйте новый пароль')
            : back()->withErrors(['email' => 'Пароль не изменен']);

    }

    // admin

    public function adminUsersIndex()
    {
        $title = 'Пользователи';
        return view('admin.user.index', compact('title'));
    }

    public function adminUsersEdit($id)
    {
        $title = 'Редактировать пользователя';
        $user = User::find($id);
        return view('admin.user.edit', compact('title', 'user'));
    }


}
