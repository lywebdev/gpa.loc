<div class="table-responsive">
    @if ( (is_array($data) && count($data)) || $data->count() )
    <table class="table table-striped mb-0">
        <thead>
            <tr>
                <th>#</th>
                @foreach ($thead as $th)
                    <th>{{ $th }}</th>
                @endforeach
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $row)
            <tr>
                @if (is_array($row))
                    <th>{{ $key }}</th>
                    @foreach ($tbody as $columnName)
                        <td>{{ $row[$columnName] }}</td>
                    @endforeach
                    <td style="display: flex;">
                        <a href="{{ route($route . '.edit', $key) }}" class="btn btn-outline-success btn-sm">Редактировать</a>
                        <form action="{{ route($route . '.destroy', $key) }}" method="post" style="margin-left: 7px;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm">Удалить</button>
                        </form>
                    </td>
                @else
                    <th>{{ $row->id }}</th>
                    @foreach ($tbody as $columnName)
                        <td>
                            @if (is_array($columnName))
                                @switch($columnName[0])
                                    @case('method')
                                        {{ $row->{$columnName[1]}() }}
                                    @break
                                @endswitch
                            @else
                                {{ $row->{$columnName} }}
                            @endif
                        </td>
                    @endforeach
                    <td style="display: flex;">
                        <a href="{{ route($route . '.edit', $row->id) }}" class="btn btn-outline-success btn-sm">Редактировать</a>
                        <form action="{{ route($route . '.destroy', $row->id) }}" method="post" style="margin-left: 7px;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm">Удалить</button>
                        </form>
                    </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p class="card-title-desc">Нет записей</p>
    @endif

    @if ($data->count() && $data->hasPages())
        <div class="mt-4">
            {{ $data->links('vendor.pagination.bootstrap-4') }}
        </div>
    @endif
</div>
