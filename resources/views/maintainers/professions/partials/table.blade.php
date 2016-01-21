<div class="box box-primary">
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($professions as $profession)
                <tr data-id="{{ $profession->id }}">
                    <td>{{ $profession->id }}</td>
                    <td>{{ $profession->name }}</td>
                    <td class="text-center">
                        <a href="{{ route('maintainers.professions.edit', $profession) }}" class="btn btn-success btn-flat"><i class="fa fa-pencil"></i> Editar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>