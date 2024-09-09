@extends('admin.layout')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="card">

        <div class="card-body">
            <h3 class="card-title">Редактировать пользователя</h3>

            <livewire:admin.edit-user :user="$user" />
        </div>
    </div>

@endsection


