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
                @foreach($forecasts as $forecast)
                    <tr data-id="{{ $forecast->id }}">
                        <td>{{ $forecast->id }}</td>
                        <td>{{ $forecast->name }}</td>
                        <td class="text-center">
                            <a href="{{ route('maintainers.forecasts.edit', $forecast) }}" class="btn btn-squared btn-success waves-effect waves-light mitooltip" title="Editar"><i class="fa fa-pencil"></i> </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>