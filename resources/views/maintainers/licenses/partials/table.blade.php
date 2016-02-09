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
            @foreach($licenses as $license)
                <tr data-id="{{ $license->id }}">
                    <td>{{ $license->id }}</td>
                    <td>{{ $license->name }}</td>
                    <td class="text-center">
                        <a href="{{ route('maintainers.licenses.edit', $license) }}" class="btn btn-success btn-flat"><i class="fa fa-pencil"></i> Editar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>