<div class="panel">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-condensed">
                <thead>
                    <tr>
                        <th class="col-md-1">ID</th>
                        <th class="col-md-9">Nombre</th>
                        <th class="text-center col-md-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($relationships as $relationship)
                    <tr data-id="{{ $relationship->id }}">
                        <td>{{ $relationship->id }}</td>
                        <td>{{ $relationship->name }}</td>
                        <td class="text-center">
                            <a href="{{ route('maintainers.relationships.edit', $relationship) }}" class="btn btn-squared btn-success waves-effect waves-light mitooltip" title="Editar"><i class="fa fa-pencil"></i> </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>