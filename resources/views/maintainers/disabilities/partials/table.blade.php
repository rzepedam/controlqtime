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
                @foreach($disabilities as $disability)
                    <tr data-id="{{ $disability->id }}">
                        <td>{{ $disability->id }}</td>
                        <td>{{ $disability->name }}</td>
                        <td class="text-center">
                            <a href="{{ route('maintainers.disabilities.show', $disability) }}" class="btn btn-squared btn-info waves-effect waves-light mitooltip" title="Ver"><i class="fa fa-search"></i></a>
                            <a href="{{ route('maintainers.disabilities.edit', $disability) }}" class="btn btn-squared btn-success waves-effect waves-light mitooltip" title="Editar"><i class="fa fa-pencil"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>