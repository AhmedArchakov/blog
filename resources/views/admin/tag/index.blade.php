@extends('admin.layout')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="card">

        <div class="card-body">
            <h4 class="card-title">Теги</h4>
            <div class="text-end">

                <a href="{{ route('tags.create') }}" class="btn btn-primary">
                    Добавить тег
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show mt-3 col-6 mx-auto" role="alert">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    {{ session('success') }}
                </div>
            @endif

            <livewire:admin.tag-list />
        </div>
    </div>

@endsection


