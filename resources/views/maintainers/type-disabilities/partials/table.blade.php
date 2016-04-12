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
                @foreach($type_disabilities as $type_disability)
                    <tr data-id="{{ $type_disability->id }}">
                        <td>{{ $type_disability->id }}</td>
                        <td>{{ $type_disability->name }}</td>
                        <td class="text-center">
                            <a href="{{ route('maintainers.type-disabilities.show', $type_disability) }}" class="btn btn-squared btn-info waves-effect waves-light mitooltip" title="Ver"><i class="fa fa-search"></i></a>
                            <a href="{{ route('maintainers.type-disabilities.edit', $type_disability) }}" class="btn btn-squared btn-success waves-effect waves-light mitooltip" title="Editar"><i class="fa fa-pencil"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>