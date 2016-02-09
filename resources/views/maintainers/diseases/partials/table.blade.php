<div class="box box-primary">
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($diseases as $disease)
                <tr data-id="{{ $disease->id }}">
                    <td>{{ $disease->id }}</td>
                    <td>{{ $disease->name }}</td>
                    <td class="text-center">
                        <a href="{{ route('maintainers.diseases.show', $disease) }}" class="btn bg-navy btn-flat"><i class="fa fa-search"></i></a>
                        <a href="{{ route('maintainers.diseases.edit', $disease) }}" class="btn btn-success btn-flat"><i class="fa fa-pencil"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>