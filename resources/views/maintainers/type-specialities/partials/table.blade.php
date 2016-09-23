<div class="panel">
    <div class="panel-body">
        <div id="myToolbar" class="pull-left margin-bottom-10 padding-left-0 col-xs-9 col-sm-8 col-md-6"></div>
        <table class="table-hover table-condensed" id="type_speciality_table" data-mobile-responsive="true">
            <thead>
                <tr>
                    <th data-field="id" data-sortable="true">ID</th>
                    <th data-field="name" data-sortable="true">Nombre</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <!--<tbody>
            {{--@foreach($type_specialities as $type_speciality)
                <tr data-id="{{ $type_speciality->id }}">
                    <td>{{ $type_speciality->id }}</td>
                    <td>{{ $type_speciality->name }}</td>

                    <td class="text-center">
                        <a href="{{ route('maintainers.type-specialities.edit', $type_speciality) }}" class="btn btn-squared btn-warning waves-effect waves-light tooltip-warning" data-toggle="tooltip" data-original-title="Editar"><i class="fa fa-pencil"></i> </a>
                    </td>
                </tr>
            @endforeach--}}
            </tbody>-->
        </table>
    </div>
</div>