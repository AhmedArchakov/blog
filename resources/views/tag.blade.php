@extends('layouts.main')

@section('archive-box')
    <div class="archive-box">
        <h2>Тег: {{ $tag->title }}</h2>
    </div>
@endsection

@section('content')
    <div class="row">
        @foreach($posts as $post)
            <div class="col-md-6 mb-5">
                <div class="post-item">
                    <a href="{{ route('category', ['slug' => $post->category->slug]) }}" class="categories">{{ $post->category->title }}</a>
                    <div class="post-thumbnail">
                        <a href="{{ route('post', ['slug' => $post->slug]) }}">
                            <img src="{{ asset($post->thumbnail) }}" class="post-image" alt="">
                        </a>
                    </div>
                    <div class="post-title">
                        <a href="{{ route('post', ['slug' => $post->slug]) }}" class="post-title-link">{{ $post->title }}</a>
                    </div>
                    <div class="post-date">
                        <i class="fa-regular fa-calendar-days"></i> {{ \Carbon\Carbon::parse($post->created_at)->locale('ru')->translatedFormat('d F Y') }}
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    <div class="pagination-numbers">
        {{ $posts->links('vendor.pagination.default') }}

    </div>
@endsection
