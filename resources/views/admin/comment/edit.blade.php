@extends('admin.layout')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Редактировать комментарий</h4>

            <livewire:admin.edit-comment :comment="$comment" />
        </div>
    </div>

@endsection


