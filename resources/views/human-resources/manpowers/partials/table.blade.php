<div class="panel">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-condensed">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($manpowers as $manpower)
                        <tr data-id="{{ $manpower->id }}">
                            <td>{{ $manpower->id }}</td>
                            <td>{{ $manpower->full_name }}</td>
                            <td>{{ $manpower->email }}</td>
                            <td class="text-center">
                                <a href="{{ route('human-resources.manpowers.show', $manpower) }}" class="btn btn-squared btn-info waves-effect waves-light"><i class="fa fa-search"></i></a>
                                <a href="{{ route('human-resources.manpowers.edit', $manpower) }}" class="btn btn-squared btn-success waves-effect waves-light"><i class="fa fa-pencil"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>