<div>

    <form wire:submit="update({{ $comment->id }})">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="form-label">Текст комментария</label>
                    <textarea wire:model="content" class="form-control @error('content') is-invalid @enderror" rows="5">{{ $comment->content }}</textarea>
                    @error('content')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="text-start">
            <button type="submit" class="btn btn-primary  me-6">
                Сохранить
            </button>
        </div>

    </form>
</div>
