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
            @foreach($disabilities as $disability)
                <tr data-id="{{ $disability->id }}">
                    <td>{{ $disability->id }}</td>
                    <td>{{ $disability->name }}</td>
                    <td class="text-center">
                        <a href="{{ route('maintainers.disabilities.show', $disability) }}" class="btn bg-navy btn-flat"><i class="fa fa-search"></i></a>
                        <a href="{{ route('maintainers.disabilities.edit', $disability) }}" class="btn btn-success btn-flat"><i class="fa fa-pencil"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>