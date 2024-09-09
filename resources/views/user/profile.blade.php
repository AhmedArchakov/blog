@extends('layouts.main2')

@section('content')
    <div class="archive-box">
        <span>Добро пожаловать, {{ Auth::user()->name }}!</span>
    </div>

    <div class="row">
        <div class="col-md-3">

            <a href="{{ route('dashboard') }}" class="d-block dashboard-link">
                <i class="fa-regular fa-thumbs-up me-2"></i> Понравившиеся посты
            </a>

            <a href="{{ route('profile') }}" class="d-block dashboard-link">
                <i class="fa-regular fa-user me-2"></i> Поменять пароль</a>
        </div>

        <div class="col-md-9">
            <h3 class="mb-4">Поменять пароль</h3>

            <div class="col-md-6">
                <livewire:update-password />

            </div>

        </div>
    </div>


@endsection

