<div class="panel">
    <div class="panel-body">
        <div class="table-responsive">
            <div class="col-md-offset-1 col-md-10">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr class="text-center info">
                            <td class="col-md-12" colspan="2">
                                <i class="fa fa-pencil" aria-hidden="true"></i> Información Personal
                            </td>
                        </tr>
                        <tr>
                            <td class="col-md-3">Nombre Completo</td>
                            <td class="text-center">
                                {{ $signInVisit->full_name }}
                            </td>
                        </tr>
                        <tr>
                            <td class="col-md-3">Rut</td>
                            <td class="text-center">
                                {{ $signInVisit->rut }}
                            </td>
                        </tr>
                        <tr>
                            <td class="col-md-3">Fecha de Nacimiento</td>
                            <td class="text-center">
                                <span class="text-capitalize">{{ $signInVisit->birthday_to_spanish_format }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-md-3">Sexo</td>
                            <td class="text-center">
                                {{ $signInVisit->is_male_to_long_text }}
                            </td>
                        </tr>
                        <tr>
                            <td class="col-md-3">Teléfono</td>
                            <td class="text-center">
                                {{ $signInVisit->phone }}
                            </td>
                        </tr>
                        <tr>
                            <td class="col-md-3">Email</td>
                            <td class="text-center">
                                {{ $signInVisit->email }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>