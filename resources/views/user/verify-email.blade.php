@extends('layouts.main2')

@section('content')
<div class="col-md-6 mx-auto">
    <h3 class="text-center">Подтверждение адреса электронной почты</h3>
    <div class="mt-3 lh-lg fs-6">
        Для подтверждения вашего аккаунта на адрес электронной почты, указанной при регистрации, отправлено письмо с подтверждением. Вам необходимо перейти по ссылке, указанной в данном пьсьме.
    </div>
    <div class="mt-3">
        <h4 class="text-center mb-3">Не пришло письмо?</h4>
        </div>

    <form action="{{ route('verification.send') }}" method="post">
        @csrf
        <button type="submit" class="comment-submit d-block mx-auto">Отправить повторно</button>
    </form>

    @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif


</div>
@endsection
