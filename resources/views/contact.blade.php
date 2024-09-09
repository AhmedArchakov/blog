@extends('layouts.main')
@section('content')

        <h1 class="contact-title">Контакты</h1>
        @if(session('success'))
            <div class="mb-2 text-center" style="color: green; font-size: 16px;">{{ session('success') }}</div>
        @endif

        <div class="comment-respond">

            <form action="{{ route('contact.send') }}" method="post">
                @csrf
                <div class="row">

                    <div class="col-6">
                        <label for="name">Имя*</label>
                        <input name="name" type="text" class="comment-input" id="name" value="{{ old('name') }}">
                        @error('name')
                        <span class="error invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="email">Email*</label>
                        <input name="email" type="email" class="comment-input" id="email" value="{{ old('email') }}">
                        @error('email')
                        <span class="error invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 mt-4">
                        <label for="message">Сообщение*</label>
                        <textarea name="message" class="comment-text" id="message">{{ old('message') }}</textarea>
                        @error('message')
                        <span class="error invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-12 text-center mt-3">
                        <button type="submit" class="comment-submit">Отправить</button>
                    </div>
                </div>

            </form>

        </div>

@endsection
