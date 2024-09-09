@extends('layouts.main2')

@section('content')
    <div class="archive-box">
        <span>Вход</span>
    </div>

    @if(session('status'))
        <div class="mt-3 text-center pass-reset-text" style="color: green">{{ session('status') }}</div>
    @endif

    <div class="col-lg-4 col-md-6 mx-auto">

        <livewire:login-form />

        <div class="mt-3">
            Еще не зарегистрированы?

            <a href="{{ route('register') }}" class="fw-500 login-link">Регистрация</a>
        </div>

    </div>

@endsection
