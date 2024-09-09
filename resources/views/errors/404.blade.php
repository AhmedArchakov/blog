@extends('layouts.main2')

@section('content')
    <div class="error-404">
        <div class="error-404-body">
            <div class="error-404-title">404</div>
            <div class="error-404-content">Страница не найдена</div>
            <div class="error-404-back"><a href="{{ route('home') }}" class="error-404-link">На главную</a></div>
        </div>
    </div>
@endsection
