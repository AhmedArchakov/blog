@extends('layouts.main')
@section('content')
    <div class="single-post-item">

        <div class="single-post-thumbnail">
            <img src="{{ asset($curr_post->thumbnail) }}" alt="" class="single-post-image">
            <a href="{{ route('category', ['slug' => $curr_post->category->slug]) }}"
               class="categories">{{ $curr_post->category->title }}</a>
        </div>

        <div class="single-post-details">
            <h3 class="single-post-title">{{ $curr_post->title }}</h3>
            <div class="single-post-info">
                <span class="single-post-date"><i class="fa-regular fa-calendar-days" aria-hidden="true"></i>{{ \Carbon\Carbon::parse($curr_post->created_at)->locale('ru')->translatedFormat('j F Y, H:i') }}</span>
                <span class="single-post-comments"><i
                        class="fa fa-comments-o"></i>
                    @livewire('comments-count', ['postId' => $curr_post->id])
                </span>
                <span class="single-post-views"><i class="fa-regular fa-eye"></i> {{ $curr_post->views }}</span>

            </div>

        </div>


        <div class="single-post-content">
            {!! $curr_post->content !!}
        </div>

        <div class="single-post-footer d-flex justify-content-between align-items-center">
            <div class="likes d-flex align-items-center position-relative">
                @auth()
                    @livewire('likes', ['postId' => $curr_post->id, 'userId' => Auth::user()->id])
                @endauth

                @guest()
                    <button class="btn" @click="showLikeModal = !showLikeModal">
                        <svg class="like-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path
                                d="M313.4 32.9c26 5.2 42.9 30.5 37.7 56.5l-2.3 11.4c-5.3 26.7-15.1 52.1-28.8 75.2l144 0c26.5 0 48 21.5 48 48c0 18.5-10.5 34.6-25.9 42.6C497 275.4 504 288.9 504 304c0 23.4-16.8 42.9-38.9 47.1c4.4 7.3 6.9 15.8 6.9 24.9c0 21.3-13.9 39.4-33.1 45.6c.7 3.3 1.1 6.8 1.1 10.4c0 26.5-21.5 48-48 48l-97.5 0c-19 0-37.5-5.6-53.3-16.1l-38.5-25.7C176 420.4 160 390.4 160 358.3l0-38.3 0-48 0-24.9c0-29.2 13.3-56.7 36-75l7.4-5.9c26.5-21.2 44.6-51 51.2-84.2l2.3-11.4c5.2-26 30.5-42.9 56.5-37.7zM32 192l64 0c17.7 0 32 14.3 32 32l0 224c0 17.7-14.3 32-32 32l-64 0c-17.7 0-32-14.3-32-32L0 224c0-17.7 14.3-32 32-32z"/>
                        </svg>

                    </button>

                    <div x-show="showLikeModal" x-cloak class="like-modal">
                        <p class="msg-comment">
                            <a href="{{ route('login') }}">Войдите</a> в аккаунт, чтобы поставить оценку
                        </p>

                        <i class="fa-solid fa-xmark close-like-modal  cursor-pointer" @click="showLikeModal = false"></i>
                    </div>
                @endguest

                    @livewire('likes-count', ['postId' => $curr_post->id])

            </div>

            <div class="">
                <span>Теги</span>
                @foreach($curr_post->tags as $tag)
                    <a href="{{ route('tag', ['slug' => $tag->slug]) }}" class="single-tags-link">{{ $tag->title }}</a>
                @endforeach
            </div>


        </div>
    </div>

    @livewire('comment-respond', ['postId' => $curr_post->id, 'userId' => Auth::check() ? Auth::user()->id : null])
@endsection
