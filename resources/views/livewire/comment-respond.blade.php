<div>

    <div class="comments mt-5">
        <h3 class="comments-count">Комментарии ({{ count($comments) }})</h3>
        @if(count($comments))
            @foreach($comments as $comment)
                <div class="comments-item">
                    {{--<div class="comments-author">{{ $comment['name'] }}</div>--}}
                    <div class="comments-author">{{ $comment->user->name }} (<a class="msg-email" href="mailto:{{ $comment->email }}">{{ $comment->email }}</a>)</div>
                    <div
                        class="comments-date">{{\Carbon\Carbon::parse($comment->created_at)->locale('ru')->translatedFormat('j F Y')}}</div>
                    <div class="comments-content">{{ $comment->content }}
                    </div>
                </div>
            @endforeach

        @else
            <p class="mb-3">Комментариев пока нет</p>
        @endif

    </div>

    <div class="comment-respond">
        <h3 class="comment-respond-title">Оставить комментарий</h3>

        @auth()
            @if(session('success'))
                <div class="mb-2 text-center" style="color: green; font-size: 16px;">{{ session('success') }}</div>
            @endif
            <form wire:submit="store">

            <textarea name="content" class="comment-text @error('content') is-invalid @enderror"
                      placeholder="Комментарий*" wire:model="content">{{ old('content') }}</textarea>
                @error('content')
                <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
                <div class="row mt-4">

                    <div class="col-12">
                        <input name="email" type="email" class="comment-input @error('email') is-invalid @enderror"
                               placeholder="Email*" wire:model="email">
                        @error('email')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-12 mt-4 text-center">
                        <button type="submit" class="comment-submit">Отправить <span wire:loading class="spinner-border spinner-border-sm"></span></button>
                    </div>
                </div>
            </form>
        @endauth

        @guest()
            <p class="msg-comment">
                Чтобы оставить комментарий необходимо <a href="{{ route('login') }}">войти</a> или <a href="{{ route('register') }}">зарегистрироваться</a>
            </p>

        @endguest


    </div>


</div>
