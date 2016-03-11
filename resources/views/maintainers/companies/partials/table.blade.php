<div class="box box-primary">
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th class="text-center">Estado</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($companies as $company)
                <tr data-id="{{ $company->id }}">
                    <td>{{ $company->id }}</td>
                    <td>{{ $company->firm_name }}</td>
                    <td>{{ $company->email }}</td>
                    @if (!$company->status)
                        <td class="text-center"><a href="{{ url('maintainers/companies/attachFiles/' . $company->id) }}" class="label label-danger upload-files">Activación pendiente</a></td>
                    @else
                        <td></td>
                    @endif
                    <td class="text-center">
                        <a href="{{ route('maintainers.companies.show', $company) }}" class="btn bg-navy btn-flat mitooltip" title="Ver Detalles"><i class="fa fa-search"></i></a>
                        <a href="{{ route('maintainers.companies.edit', $company) }}" class="btn btn-success btn-flat mitooltip" title="Editar Registro"><i class="fa fa-pencil"></i></a>
                        <a href="{{ url('maintainers/companies/attachFiles/' . $company->id) }}" class="btn bg-purple btn-flat mitooltip" title="Adjuntar Imágenes"><i class="fa fa-file-text-o"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>