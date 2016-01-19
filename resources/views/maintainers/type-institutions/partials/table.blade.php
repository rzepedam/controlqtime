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
            @foreach($type_institutions as $type_institution)
                <tr data-id="{{ $type_institution->id }}">
                    <td>{{ $type_institution->id }}</td>
                    <td>{{ $type_institution->name }}</td>
                    <td class="text-center">
                        <a href="{{ route('maintainers.type-institutions.edit', $type_institution) }}" class="btn btn-success btn-flat"><i class="fa fa-pencil"></i> Editar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>