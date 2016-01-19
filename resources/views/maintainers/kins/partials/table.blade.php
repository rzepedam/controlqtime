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
            @foreach($kins as $kin)
                <tr data-id="{{ $kin->id }}">
                    <td>{{ $kin->id }}</td>
                    <td>{{ $kin->name }}</td>
                    <td class="text-center">
                        <a href="{{ route('maintainers.kins.edit', $kin) }}" class="btn btn-success btn-flat"><i class="fa fa-pencil"></i> Editar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>