<div class="panel">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-condensed">
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
                            <td class="text-center"><a href="{{ url('maintainers/companies/attachFiles/' . $company->id) }}" class="label label-round label-danger">Activar</a></td>
                        @else
                            <td></td>
                        @endif
                        <td class="text-center">
                            <a href="{{ route('maintainers.companies.show', $company) }}" class="btn btn-squared btn-info waves-effect waves-light mitooltip" title="Ver"><i class="fa fa-search"></i></a>
                            <a href="{{ route('maintainers.companies.edit', $company) }}" class="btn btn-squared btn-success waves-effect waves-light mitooltip" title="Editar"><i class="fa fa-pencil"></i></a>
                            <a href="{{ url('attachFiles', $company->id) }}" class="btn btn-squared btn-primary waves-effect waves-light mitooltip" title="Adjuntar Imágenes"><i class="fa fa-cloud-upload"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>