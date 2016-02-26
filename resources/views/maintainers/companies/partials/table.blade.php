<div class="box box-primary">
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Área</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($companies as $company)
                <tr data-id="{{ $company->id }}">
                    <td>{{ $company->id }}</td>
                    <td>{{ $company->name }}</td>
                    <td></td>
                    <td class="text-center">
                        <a href="{{ route('maintainers.companies.show', $company) }}" class="btn bg-navy btn-flat"><i class="fa fa-search"></i></a>
                        <a href="{{ route('maintainers.companies.edit', $company) }}" class="btn btn-success btn-flat"><i class="fa fa-pencil"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>