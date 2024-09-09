<div class="mt-4">

    @if(count($comments))
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <label>Показывать по <select wire:model.live="perPage" class="datatable-select">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select> записей</label></div>
            <div id="t_add_row_filter" class="dataTables_filter"><label>Поиск: <input wire:model.live="query" type="text" class="search-input" placeholder="" aria-controls="t_add_row"></label></div>
        </div>
        <table class="table table-bordered display dataTable mt-3"
               aria-describedby="default_order_info">
            <thead>
            <tr>
                <th>Дата</th>
                <th>Текст</th>
                <th>Пост</th>
                <th>Пользователь</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)
                <tr>
                    <td class="text-nowrap">{{ $comment->created_at }}</td>
                    <td>{{ $comment->content }}</td>
                    <td><a href="{{ route('post', ['slug' => $comment->post->slug]) }}" target="_blank">{{ $comment->post->title }} </a></td>
                    <td>{{ $comment->user->name }}</td>
                    <td class="text-nowrap">
                        <a href="{{ route('comments.edit', ['id' => $comment->id]) }}" class="btn btn-rounded btn-success">
                            <i class="ti ti-edit fs-4"></i>
                        </a>
                        <button wire:click="delete({{ $comment->id }})" wire:confirm="Вы действительно хотите удалить комментарий?" type="button" class="btn btn-rounded btn-danger">
                            <i class="ti ti-trash fs-4"></i>
                        </button>
                    </td>

                </tr>
            @endforeach

            </tbody>
        </table>

        {{ $comments->links() }}
    @else
        <p>Комментариев нет</p>
    @endif

</div>

