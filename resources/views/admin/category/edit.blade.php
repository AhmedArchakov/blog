@extends('admin.layout')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="card">

        <div class="card-body">
            <h4 class="card-title">Редактировать категорию</h4>

            <livewire:admin.edit-category :category="$category" />
        </div>
    </div>

@endsection

