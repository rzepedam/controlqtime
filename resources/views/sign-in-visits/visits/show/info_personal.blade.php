<div class="table-responsive">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <table class="table table-striped table-bordered">
            <tbody>
                <tr>
                    <td class="col-md-3">Tipo Visita</td>
                    <td class="text-center">
                        {{ $visit->typeVisit->name }}
                    </td>
                </tr>
                <tr>
                    <td class="col-md-3">Guía</td>
                    <td class="text-center">
                        {{ $visit->user->employee->full_name }}
                    </td>
                </tr>
                <tr>
                    <td class="col-md-3">Recorrido</td>
                    <td class="text-center">
                        {{ $visit->text_is_walking }}
                    </td>
                </tr>
                <tr>
                    <td class="col-md-3">Visita</td>
                    <td class="text-center">
                        {{ $visit->full_name }}
                    </td>
                </tr>
                <tr>
                    <td class="col-md-3">Rut</td>
                    <td class="text-center">
                        {{ $visit->rut }}
                    </td>
                </tr>
                <tr>
                    <td class="col-md-3">Cargo</td>
                    <td class="text-center">
                        {{ $visit->position }}
                    </td>
                </tr>
                <tr>
                    <td class="col-md-3">Empresa</td>
                    <td class="text-center">
                        {{ $visit->company }}
                    </td>
                </tr>
                <tr>
                    <td class="col-md-3">Teléfono</td>
                    <td class="text-center">
                        {{ $visit->phone }}
                    </td>
                </tr>
                <tr>
                    <td class="col-md-3">Email</td>
                    <td class="text-center">
                        {{ $visit->email }}
                    </td>
                </tr>
                <tr>
                    <td class="col-md-3">Fecha Visita</td>
                    <td class="text-center">{{ $visit->date_more_hour }}</td>
                </tr>
                <tr>
                    <td class="col-md-3">Motivo</td>
                    <td class="text-center">{{ $visit->obs }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>