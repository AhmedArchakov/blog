@extends('layouts.main2')

@section('content')
    <div class="archive-box">
        <span>Поиск</span>
    </div>

    @if(isset($result))
        @if(count($result))
           <div class="row">
               @foreach($result as $post)
                   <div class="col-4 mb-5">
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
                               <i class="fa-regular fa-calendar-days"></i> {{ \Carbon\Carbon::parse($post->created_at)->locale('ru')->translatedFormat('j F Y') }}
                           </div>
                       </div>
                   </div>
               @endforeach

           </div>
           <div class="pagination-numbers">
               {{ $result->links('vendor.pagination.default')}}

           </div>
        @else
            <p class="search-allert">По вашему запросу ничего не найдено</p>

        @endif

    @endif

{{--    @if(isset($result))
        @dump($result)
    @endif--}}

@endsection
