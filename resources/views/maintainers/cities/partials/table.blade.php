<div class="panel">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-condensed">
                <thead>
                    <tr>
                        <th class="col-md-1">ID</th>
                        <th class="col-md-5">Nombre</th>
                        <th class="col-md-4">País</th>
                        <th class="text-center col-md-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($cities as $city)
                    <tr data-id="{{ $city->id }}">
                        <td>{{ $city->id }}</td>
                        <td>{{ $city->name }}</td>
                        <td>{{ $city->country->name }}</td>
                        <td class="text-center">
                            <a href="{{ route('maintainers.cities.edit', $city) }}" class="btn btn-squared btn-warning waves-effect waves-light mitooltip" title="Editar"><i class="fa fa-pencil"></i> </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>