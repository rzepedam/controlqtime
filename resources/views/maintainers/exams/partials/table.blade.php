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
            @foreach($exams as $exam)
                <tr data-id="{{ $exam->id }}">
                    <td>{{ $exam->id }}</td>
                    <td>{{ $exam->name }}</td>
                    <td class="text-center">
                        <a href="{{ route('maintainers.exams.edit', $exam) }}" class="btn btn-success btn-flat"><i class="fa fa-pencil"></i> Editar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>