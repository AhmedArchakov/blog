@extends('admin.layout')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="card">

        <div class="card-body">
            <h4 class="card-title">Создать тег</h4>

            <livewire:admin.create-tag />

        </div>
    </div>

@endsection
