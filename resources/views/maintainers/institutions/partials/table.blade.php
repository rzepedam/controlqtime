<div class="box box-primary">
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Tipo Institución</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($institutions as $institution)
                <tr data-id="{{ $institution->id }}">
                    <td>{{ $institution->id }}</td>
                    <td>{{ $institution->name }}</td>
                    <td>{{ $institution->typeInstitution->name }}</td>
                    <td class="text-center">
                        <a href="{{ route('maintainers.institutions.edit', $institution) }}" class="btn btn-success btn-flat"><i class="fa fa-pencil"></i> Editar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>