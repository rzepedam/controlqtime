<div class="box box-primary">
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>País</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($cities as $city)
                <tr data-id="{{ $city->id }}">
                    <td>{{ $city->id }}</td>
                    <td>{{ $city->name }}</td>
                    <td>{{ $city->country->name }}</td>
                    <td class="text-center">
                        <a href="{{ route('maintainers.cities.edit', $city) }}" class="btn btn-success btn-flat"><i class="fa fa-pencil"></i> Editar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>