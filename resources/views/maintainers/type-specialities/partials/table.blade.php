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
                @foreach($type_specialities as $type_speciality)
                    <tr data-id="{{ $type_speciality->id }}">
                        <td>{{ $type_speciality->id }}</td>
                        <td>{{ $type_speciality->name }}</td>

                        <td class="text-center">
                            <a href="{{ route('maintainers.type-specialities.edit', $type_speciality) }}" class="btn btn-squared btn-warning waves-effect waves-light mitooltip" title="Editar"><i class="fa fa-pencil"></i> </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>