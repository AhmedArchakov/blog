<form wire:submit="updatePassword">
    @if(session('success'))
        <div class="mt-3 pass-reset-text" style="color: green">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mt-3 pass-reset-text" style="color: red">
            {{ session('error') }}
        </div>
    @endif

    <div class="mt-3">
        <div class="form-row">
            <input wire:model="password" type="password" class="comment-input login-input @error('password') is-invalid @enderror" placeholder="Пароль">
            @error('password')
            <span class="error invalid-feedback d-block">{{ $message }}</span>
            @enderror
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M336 352c97.2 0 176-78.8 176-176S433.2 0 336 0S160 78.8 160 176c0 18.7 2.9 36.8 8.3 53.7L7 391c-4.5 4.5-7 10.6-7 17v80c0 13.3 10.7 24 24 24h80c13.3 0 24-10.7 24-24V448h40c13.3 0 24-10.7 24-24V384h40c6.4 0 12.5-2.5 17-7l33.3-33.3c16.9 5.4 35 8.3 53.7 8.3zM376 96a40 40 0 1 1 0 80 40 40 0 1 1 0-80z"></path></svg>
        </div>

    </div>

    <div class="mt-3">
        <div class="form-row">
            <input wire:model="password_confirmation" type="password" class="comment-input login-input @error('password_confirmation') is-invalid @enderror" placeholder="Повторите пароль">
            @error('password_confirmation')
            <span class="error invalid-feedback d-block">{{ $message }}</span>
            @enderror

            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">><path d="M336 352c97.2 0 176-78.8 176-176S433.2 0 336 0S160 78.8 160 176c0 18.7 2.9 36.8 8.3 53.7L7 391c-4.5 4.5-7 10.6-7 17v80c0 13.3 10.7 24 24 24h80c13.3 0 24-10.7 24-24V448h40c13.3 0 24-10.7 24-24V384h40c6.4 0 12.5-2.5 17-7l33.3-33.3c16.9 5.4 35 8.3 53.7 8.3zM376 96a40 40 0 1 1 0 80 40 40 0 1 1 0-80z"></path></svg>
        </div>

    </div>
    <div class="mt-4 text-center">
        <button type="submit" class="comment-submit d-block w-100">Поменять пароль</button>
    </div>

</form>