@extends('admin.layout')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="card">

        <div class="card-body">
            <h4 class="card-title">Создать категорию</h4>

            <livewire:admin.create-category />

        </div>
    </div>

@endsection
