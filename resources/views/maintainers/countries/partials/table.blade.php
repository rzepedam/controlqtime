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
            @foreach($countries as $country)
                <tr data-id="{{ $country->id }}">
                    <td>{{ $country->id }}</td>
                    <td>{{ $country->name }}</td>
                    <td class="text-center">
                        <a href="#" class="btn btn-success"><i class="fa fa-pencil"></i> Editar</a>
                        <a href="#" class="btn btn-danger btn-delete"><i class="fa fa-trash-o"></i> Eliminar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>