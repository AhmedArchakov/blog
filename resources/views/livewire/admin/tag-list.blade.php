<div class="mt-4">

    @if(!empty($tags))
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
        <table id="default_order" class="table table-bordered display text-nowrap dataTable mt-3"
               aria-describedby="default_order_info">
            <thead>
            <tr>
                <th>ID
                </th>
                <th style="width: 50%">Название
                </th>
                <th style="width: 50%">Slug
                </th>
                <th>Действия
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($tags as $tag)
                <tr>
                    <td>{{ $tag->id }}</td>
                    <td>{{ $tag->title }}</td>
                    <td>{{ $tag->slug }}</td>
                    <td>
                        <a href="{{ route('tags.edit', ['id' => $tag->id]) }}" class="btn btn-rounded btn-success">
                            <i class="ti ti-edit fs-4"></i>
                        </a>
                        <button wire:click="delete({{ $tag->id }})" wire:confirm="Вы действительно хотите удалить тег {{ $tag->title }}?" type="button" class="btn btn-rounded btn-danger">
                            <i class="ti ti-trash fs-4"></i>
                        </button>
                    </td>

                </tr>
            @endforeach

            </tbody>
        </table>

        {{ $tags->links() }}
    @else
        <p>Тегов нет</p>
    @endif

</div>
