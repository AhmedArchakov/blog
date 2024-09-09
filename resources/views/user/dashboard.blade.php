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
            <h3 class="text-center mb-4">Понравившиеся посты</h3>
            <div class="row">
                @if(!empty($posts))
                    @foreach($posts as $post)
                        <div class="col-6 mb-5">
                            <div class="post-item">
                                <a href="{{ route('category', ['slug' => $post->category->slug]) }} wire:navigate" class="categories">{{ $post->category->title }}</a>
                                <div class="post-thumbnail">
                                    <a href="{{ route('post', ['slug' => $post->slug]) }}">
                                        <img src="{{ asset($post->thumbnail) }}" class="post-image" alt="">
                                    </a>
                                </div>
                                <div class="post-title">
                                    <a href="{{ route('post', ['slug' => $post->slug]) }}" class="post-title-link" wire:navigate>{{ $post->title }}</a>
                                </div>
                                <div class="post-date">
                                    <i class="fa-regular fa-calendar-days"></i> {{ \Carbon\Carbon::parse($post->created_at)->locale('ru')->translatedFormat('j F Y') }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                        <div class="pagination-numbers">
                            {{ $posts->links('vendor.pagination.default') }}

                        </div>

                @else
                    <p>Постов нет</p>

                @endif
            </div>

        </div>
    </div>


@endsection
