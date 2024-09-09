<div>
    <form wire:submit="store">
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Название</label>
                    <input wire:model="title" type="text" class="form-control @error('title') is-invalid @enderror">
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Название на английском (slug)</label>
                    <input wire:model="slug" type="text" class="form-control @error('slug') is-invalid @enderror">
                    @error('slug')
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
