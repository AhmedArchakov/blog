@extends('layouts.main2')

@section('content')
    <div class="archive-box">
        <span>Регистрация</span>
    </div>
    {{--    <h1 class="contact-title">Регистрация</h1>--}}

    <div class="col-lg-4 col-md-6 mx-auto">

    @livewire('register-form')
        <div class="mt-3 text-center" style="font-size: 15px">Уже зарегистрированы? <a href="{{ route('login') }}" class="fw-600 login-link">Вход</a></div>
    </div>

@endsection
