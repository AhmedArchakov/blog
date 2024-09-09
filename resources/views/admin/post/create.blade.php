@extends('admin.layout')

@section('style_select2')
    <link href="/admin_assets/assets/css/select2.min.css" rel="stylesheet" />
@endsection


@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="card">

        <div class="card-body">
            <h4 class="card-title">Создать пост</h4>

            <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row mt-4 align-items-center">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Заголовок поста</label>
                            <input name="title" type="text" class="form-control @error('title') is-invalid @enderror">
                            @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label class="form-label">Категория</label>
                            <div>
                                <select name="category_id" class="form-control select2 @error('category_id') is-invalid @enderror">
                                    <option>Выберите категорию</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label class="form-label">Теги</label>
                            <select name="tags[]" class="form-control select2" multiple>
                                <option>Выберите теги</option>
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-12">
                        <div class="mb-3 form-group">
                            <label class="form-label">Краткое содержание</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="5"></textarea>
                            @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-12">
                        <div class="mb-3 form-group">
                            <label class="form-label">Полный текст</label>
                            <textarea name="content" name="editor1" id="editor1" class="form-control @error('content') is-invalid @enderror"  rows="10"></textarea>
                            @error('content')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="mb-3">
                        <label for="thumbnail" class="form-label">Изображение</label>
                        <input name="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" type="file" id="thumbnail">
                        @error('thumbnail')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-6">
                        <div class="form-check form-switch">
                            <input name="show_on_slider" class="form-check-input" type="checkbox" id="show_on_slider">
                            <label class="form-label" for="show_on_slider">Показывать на слайдере</label>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="text-start">
                        <button type="submit" class="btn btn-primary  me-6">
                            Сохранить
                        </button>
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection

@section('select2_script')

    <script src="/admin_assets/assets/js/select2/select2.min.js"></script>
    <script src="/admin_assets/assets/js/forms/select2.init.js"></script>
@endsection

@section('ckeditor_script')

    <script src="//cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
    <script src="/ckfinder/ckfinder.js"></script>
    <script>

        CKEDITOR.replace( 'editor1' );
    </script>
    <script>
        var editor = CKEDITOR.replace( 'editor1' );
        CKFinder.setupCKEditor( editor );
    </script>



@endsection

