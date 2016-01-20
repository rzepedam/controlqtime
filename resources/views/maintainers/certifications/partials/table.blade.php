<div class="box box-primary">
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Institución</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($certifications as $certification)
                <tr data-id="{{ $certification->id }}">
                    <td>{{ $certification->id }}</td>
                    <td>{{ $certification->name }}</td>
                    <td>{{ $certification->institution->name }}</td>
                    <td class="text-center">
                        <a href="{{ route('maintainers.certifications.edit', $certification) }}" class="btn btn-success btn-flat"><i class="fa fa-pencil"></i> Editar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>