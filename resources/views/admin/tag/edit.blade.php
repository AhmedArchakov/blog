@extends('admin.layout')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="card">

        <div class="card-body">
            <h4 class="card-title">Редактировать тег</h4>

            <livewire:admin.edit-tag :tag="$tag" />
        </div>
    </div>

@endsection

