<div>
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card w-100 h-100 border">
                <div class="card-body">
                    <h4>Изменить имя</h4>
                    <form wire:submit="changeName({{ $user->id }})">
                        <div class="mb-3">
                            <label class="form-label">Имя пользователя</label>
                            <input wire:model="userName" type="text"
                                   class="form-control @error('userName') is-invalid @enderror">
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show mt-3"
                                     role="alert">
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    {{ session('success') }}
                                </div>
                            @endif
                            @error('userName')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="text-start">
                            <button type="submit" class="btn btn-primary">
                                Сохранить
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

        <div class="col-md-6">
            <div class="card w-100 border">
                <div class="card-body">
                    <h4>Изменить пароль</h4>
                    <form wire:submit="changePassword({{ $user->id }})">
                        <div class="mb-3">
                            <label class="form-label">Пароль</label>
                            <input wire:model="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Повторите пароль</label>
                            <input wire:model="password_confirmation" type="password"
                                   class="form-control @error('password_confirmation') is-invalid @enderror">
                            @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        @if(session('success_password'))
                            <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show mt-3"
                                 role="alert">
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                {{ session('success_password') }}
                            </div>
                        @endif

                        <div class="text-start">
                            <button type="submit" class="btn btn-primary">
                                Сохранить
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card w-100 border">
                <div class="card-body">
                    <h4>Изменить группу</h4>
                    <form wire:submit="changeGroup({{ $user->id }})">
                        <div class="mb-3">
                            <label class="form-label">Группа</label>
                            <select class="form-select" wire:model="is_admin">
                                <option value="0" @selected($user->is_admin === 0)>Пользователь</option>
                                <option value="1" @selected($user->is_admin)>Администратор</option>
                            </select>
                        </div>

                        @if(session('success_group'))
                            <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show mt-3"
                                 role="alert">
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                {{ session('success_group') }}
                            </div>
                        @endif

                        <div class="text-start">
                            <button type="submit" class="btn btn-primary">
                                Сохранить
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12 text-center">
            <button wire:click="close" type="submit" class="btn btn-primary">
                Закрыть
            </button>
        </div>
    </div>

</div>
