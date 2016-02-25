<div class="box box-primary">
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Terminal</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($areas as $area)
                <tr data-id="{{ $area->id }}">
                    <td>{{ $area->id }}</td>
                    <td>{{ $area->name }}</td>
                    <td>{{ $area->terminal->name }}</td>
                    <td class="text-center">
                        <a href="{{ route('maintainers.areas.edit', $area) }}" class="btn btn-success btn-flat"><i class="fa fa-pencil"></i> Editar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>