{{--@dump($posts)--}}
@extends('layouts.main')

@section('slider')
<div class="top-slider">
    <div class="swiper-wrapper">
        <!-- Slides -->
        @foreach($postsOnSlider as $post)
            <div class="swiper-slide">
                <div class="swiper-slide-inner">
                    <img src="{{ asset($post->thumbnail) }}" alt="" class="slide-image">
                    <a href="{{ route('category', ['slug' => $post->category->slug]) }}" class="categories" >{{ $post->category->title }}</a>
                    <div class="swiper-slide-content">
                        <a href="{{ route('post', ['slug' => $post->slug]) }}" class="swiper-slide-title" >{{ $post->title }}</a>
                        <div class="swiper-slide-info"><i class="fa fa-calendar"></i>{{ \Carbon\Carbon::parse($post->created_at)->locale('ru')->translatedFormat('j F Y') }}</div>
                    </div>

                </div>
            </div>
        @endforeach


    </div>
    <!-- If we need pagination -->
    <div class="swiper-pagination"></div>

    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>


</div>
@endsection

@section('content')
           <div class="row">
               @foreach($posts as $post)
                   <div class="col-md-6 mb-5">
                       <div class="post-item">
                           <a href="{{ route('category', ['slug' => $post->category->slug]) }}"  class="categories">{{ $post->category->title }}</a>
                           <div class="post-thumbnail">
                               <a href="{{ route('post', ['slug' => $post->slug]) }}">
                                   <img src="{{ asset($post->thumbnail) }}" class="post-image" alt="">
                               </a>
                           </div>
                           <div class="post-title">
                               <a href="{{ route('post', ['slug' => $post->slug]) }}" class="post-title-link" >{{ $post->title }}</a>
                           </div>
                           <div class="post-date">
                               <i class="fa-regular fa-calendar-days"></i> {{ \Carbon\Carbon::parse($post->created_at)->locale('ru')->translatedFormat('j F Y') }}
                           </div>
                       </div>
                   </div>
               @endforeach

        </div>
        <div class="pagination-numbers">
            {{ $posts->links('vendor.pagination.default') }}

        </div>


@endsection

@section('swiperScripts')
    <script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('js/swiper.js') }}"></script>
@endsection

