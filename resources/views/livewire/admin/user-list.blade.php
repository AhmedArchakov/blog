<div class="mt-4">

    @if(!empty($users))
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <label>Показывать по <select wire:model.live="perPage" class="datatable-select">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select> записей</label></div>
            <div id="t_add_row_filter" class="dataTables_filter"><label>Поиск: <input wire:model.live="query" type="text" class="search-input" placeholder="" aria-controls="t_add_row"></label></div>
        </div>
        <table class="table table-bordered display  dataTable mt-3">
            <thead>
            <tr>
                <th>Имя</th>
                <th>E-mail</th>
                <th>Группа</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->is_admin ? 'Администратор' : 'Пользователь'}}</td>
                    <td>
                        <a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-rounded btn-success">
                            <i class="ti ti-edit fs-4"></i>
                        </a>
                        <button wire:click="delete({{ $user->id }})" wire:confirm="Вы действительно хотите удалить пользователя {{ $user->name }}?" type="button" class="btn btn-rounded btn-danger">
                            <i class="ti ti-trash fs-4"></i>
                        </button>
                    </td>

                </tr>
            @endforeach

            </tbody>
        </table>

        {{ $users->links() }}
    @else
        <p>Пользователей нет</p>
    @endif

</div>
