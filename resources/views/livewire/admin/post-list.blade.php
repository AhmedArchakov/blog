<div class="mt-4">

    @if(!empty($posts))
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <label>Показывать по <select wire:model.live="perPage" class="datatable-select">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select> записей</label></div>
            <div id="t_add_row_filter" class="dataTables_filter"><label>Поиск: <input wire:model.live="query" type="text" class="search-input"></label>
            </div>
        </div>
        <table id="default_order" class="table table-bordered display dataTable mt-3"
               aria-describedby="default_order_info">
            <thead>
            <tr>
                <th>Дата
                </th>
                <th>Заголовок
                </th>
                <th>Категория
                </th>
                <th>Действия
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td class="text-nowrap">{{ $post->created_at }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->category->title }}</td>
                    <td class="text-nowrap">
                        <a href="{{ route('post', ['slug' => $post->slug]) }}" type="button" class="btn btn-secondary fs-4" target="_blank">
                            <i class="ti ti-eye"></i>
                        </a>
                        <a href="{{ route('posts.edit', ['id' => $post->id]) }}" class="btn btn-rounded btn-success">
                            <i class="ti ti-edit fs-4"></i>
                        </a>
                        <button wire:click="delete({{ $post->id }})"
                                wire:confirm="Вы действительно хотите удалить пост {{ $post->title }}?" type="button"
                                class="btn btn-rounded btn-danger">
                            <i class="ti ti-trash fs-4"></i>
                        </button>
                    </td>

                </tr>
            @endforeach

            </tbody>
        </table>

        {{ $posts->links() }}
    @else
        <p>Постов нет</p>
    @endif

</div>
