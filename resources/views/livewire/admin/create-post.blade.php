<div>
    <form wire:submit="store">

        <div class="row mt-4 align-items-center">
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="form-label">Заголовок поста</label>
                    <input wire:model="title" type="text" class="form-control @error('title') is-invalid @enderror">
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
                    <div wire:ignore>
                        <select wire:model="categoryID" class="form-control select2">
                            <option>Выберите категорию</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>



                </div>
            </div>

            <div class="col-md-6">
                <div wire:ignore class="mb-3 form-group">
                    <label class="form-label">Теги</label>
                    <select wire:model="tags2" class="form-control select2" multiple>
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
                    <textarea wire:model="description" class="form-control" rows="3"></textarea>
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-md-12">
                <div class="mb-3 form-group">
                    <label class="form-label">Полный текст</label>
                        <textarea wire:model="content" name="editor1" id="editor1" class="form-control" rows="10"></textarea>
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <div class="mb-3">
                <label for="thumbnail" class="form-label">Изображение</label>
                <input wire:model="thumbnail" class="form-control" type="file" id="thumbnail">
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-md-6">
                <div class="form-check form-switch">
                    <input wire:model="showOnSlider" class="form-check-input" type="checkbox" id="show_on_slider">
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
