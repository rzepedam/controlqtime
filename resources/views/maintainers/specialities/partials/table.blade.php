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
            @foreach($specialities as $speciality)
                <tr data-id="{{ $speciality->id }}">
                    <td>{{ $speciality->id }}</td>
                    <td>{{ $speciality->name }}</td>

                    <td class="text-center">
                        <a href="{{ route('maintainers.specialities.edit', $speciality) }}" class="btn btn-success btn-flat"><i class="fa fa-pencil"></i> Editar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>