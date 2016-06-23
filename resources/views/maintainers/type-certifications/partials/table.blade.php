<div class="panel">
    <div class="panel-body">
        <div id="myToolbar" class="pull-left margin-bottom-10 padding-left-0 col-xs-9 col-sm-8 col-md-6"></div>
        <table class="table-hover table-condensed" id="type_certification_table" data-mobile-responsive="true">
            <thead>
                <tr>
                    <th data-field="id" data-sortable="true">ID</th>
                    <th data-field="name" data-sortable="true">Nombre</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
                <!--<tbody>
                {{--@foreach($type_certifications as $type_certification)
                    <tr data-id="{{ $type_certification->id }}">
                        <td>{{ $type_certification->id }}</td>
                        <td>{{ $type_certification->name }}</td>
                        <td class="text-center">
                            <a href="{{ route('maintainers.type-certifications.edit', $type_certification) }}" class="btn btn-squared btn-warning waves-effect waves-light tooltip-warning" data-toggle="tooltip" data-original-title="Editar"><i class="fa fa-pencil"></i> </a>
                        </td>
                    </tr>
                @endforeach--}}
                </tbody>-->
        </table>
    </div>
</div>