
        <table class="table table-responsive table-bordered table-hover">
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
                        <a href="{{ route('human-resources.manpowers.show', $manpower) }}" class="btn bg-navy btn-flat"><i class="fa fa-search"></i></a>
                        <a href="{{ route('human-resources.manpowers.edit', $manpower) }}" class="btn btn-success btn-flat"><i class="fa fa-pencil"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
