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
            @foreach($pensions as $pension)
                <tr data-id="{{ $pension->id }}">
                    <td>{{ $pension->id }}</td>
                    <td>{{ $pension->name }}</td>
                    <td class="text-center">
                        <a href="{{ route('maintainers.pensions.edit', $pension) }}" class="btn btn-success btn-flat"><i class="fa fa-pencil"></i> Editar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>