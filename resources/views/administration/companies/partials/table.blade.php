<div class="panel">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-condensed">
                <thead>
                    <tr>
                        <th class="col-md-1">ID</th>
                        <th class="col-md-5">Nombre</th>
                        <th class="col-md-3">Email</th>
                        <th class="text-center col-md-1">Estado</th>
                        <th class="text-center col-md-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($companies as $company)
                    <tr data-id="{{ $company->id }}">
                        <td>{{ $company->id }}</td>
                        <td>{{ $company->firm_name }}</td>
                        <td>{{ $company->email_company }}</td>
                        @if ($company->state == 'disable')
                            <td class="text-center"><a href="{{ route('administration.companies.attachFiles', $company->id) }}" class="label label-round label-danger">Activar</a></td>
                        @else
                            <td></td>
                        @endif
                        <td class="text-center">
                            <a href="{{ route('administration.companies.show', $company) }}" class="btn btn-squared btn-info waves-effect waves-light tooltip-info" data-toggle="tooltip" data-original-title="Ver"><i class="fa fa-search"></i></a>
                            <a href="{{ route('administration.companies.edit', $company) }}" class="btn btn-squared btn-warning waves-effect waves-light tooltip-warning" data-toggle="tooltip" data-original-title="Editar"><i class="fa fa-pencil"></i></a>
                            <a href="{{ route('administration.companies.attachFiles', $company->id) }}" class="btn btn-squared btn-primary waves-effect waves-light tooltip-primary" data-toggle="tooltip" data-original-title="Adjuntar Archivos"><i class="fa fa-cloud-upload"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>