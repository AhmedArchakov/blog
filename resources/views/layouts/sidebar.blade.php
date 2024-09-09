<div class="sidebar">

    <div class="about-widget">
        <h3 class="widget-title">Обо мне</h3>
        <div class="author-image">
            <img src="{{ asset('images/author.png') }}" alt="">
        </div>
        <div class="author-info">
            <h3 class="author-name">
                Привет! Меня зовут Анна Вебер
            </h3>
            <p class="author-desc">
                Я - дизайнер интерьера. А еще я увлекаюсь модой, люблю путешествовать и готовить. На страницах своего блога я рассказываю о своей работе и о своих увлечениях.
            </p>
        </div>
    </div> <!--about-widget-->

    <div class="categories-widget">
        <h3 class="widget-title">Категории</h3>
        @foreach($categoryList as $category)
            <div class="category-item">
                <div class="category-item-title">
                    <a href="{{ route('category', ['slug' => $category->slug]) }}">{{ $category->title }}</a>
                </div>

                <span class="count">({{ $category->posts->count() }})</span>
            </div>
        @endforeach

    </div><!--categories-widget-->

    <div class="recent-posts-widget">
        <h3 class="widget-title">Последние статьи</h3>
        @foreach($recentPosts as $post)
            <div class="recent-posts-item">
                <div class="recent-posts-thumbnail">
                    <img src="{{ asset($post->thumbnail) }}" alt="">
                </div>
                <div class="recent-posts-content">

                        <a href="{{ route('post', ['slug' => $post->slug]) }}">{{ $post->title }}</a>



                    <div class="recent-posts-date">{{ \Carbon\Carbon::parse($post->created_at)->locale('ru')->translatedFormat('j F Y') }}</div>

                </div>
            </div>
        @endforeach
    </div><!--recent-posts-widget-->

    <div class="tags-widget">
        <h3 class="widget-title">Теги</h3>
        <ul class="tags-list">
            @foreach($tagList as $tag)
                <li>
                    <a href="{{ route('tag', ['slug' => $tag->slug]) }}" class="tags-list-link">{{ $tag->title }}</a>
                </li>
            @endforeach

        </ul>

    </div><!--tags-widget-->

    <div class="social-widget">
        <h3 class="widget-title">Мои соцсети</h3>
        <ul class="social-icons">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
        </ul>
    </div><!--social widget-->

</div>
