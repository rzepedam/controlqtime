<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body">
                <br/>
                <div class="table-responsive">
                    <div class="col-md-offset-1 col-md-10">
                        <table class="table table-striped table-bordered">
                            <tbody>
                                <tr class="text-center info">
                                    <td class="col-md-12" colspan="2">
                                        <i class="md-assignment" aria-hidden="true"></i> Información Laboral
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-3">Empresa</td>
                                    <td class="text-center">
                                        <a href="{{ route('companies.show', $contract->company->id) }}" style="color: #757575"><i class="fa fa-building-o" aria-hidden="true"></i> {{ $contract->company->firm_name }}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-3">Trabajador</td>
                                    <td class="text-center">
                                        <a href="{{ route('employees.show', $contract->employee->id) }}" style="color: #757575"><i class="fa fa-street-view" aria-hidden="true"></i> {{ $contract->employee->full_name }}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-3">Cargo</td>
                                    <td class="text-center">
                                        <a href="{{ route('positions.index') }}" style="color: #757575"><i class="md-seat" aria-hidden="true"></i> {{ $contract->position->name }}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-3">Área</td>
                                    <td class="text-center">
                                        <a href="{{ route('areas.show', $contract->area->id) }}" style="color: #757575"><i class="fa fa-sitemap" aria-hidden="true"></i> {{ $contract->area->name }}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-3">Nº de Horas</td>
                                    <td class="text-center">
                                        <a href="{{ route('num-hours.index') }}" style="color: #757575"><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $contract->numHour->name }} hrs</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-3">Periocidad Horas</td>
                                    <td class="text-center">
                                        <a href="{{ route('periodicities.index') }}" style="color: #757575"><i class="fa fa-repeat" aria-hidden="true"></i> {{ $contract->periodicity->name }}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-3">Jornada Laboral</td>
                                    <td class="text-center">
                                        <a href="{{ route('day-trips.index') }}" style="color: #757575"><i class="fa fa-tasks" aria-hidden="true"></i> {{ $contract->dayTrip->name }}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-3">Horario Mañana</td>
                                    <td class="text-center">
                                        {{ $contract->init_morning }} - {{ $contract->end_morning }} hrs
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-3">Horario Tarde</td>
                                    <td class="text-center">
                                        {{ $contract->init_afternoon }} - {{ $contract->end_afternoon }} hrs
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-3">Ingresado</td>
                                    <td class="text-center text-capitalize">
                                        <i class="fa fa-calendar" aria-hidden="true"></i> {{ $contract->created_at_to_spanish_format }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br />
                <div class="table-responsive">
                    <div class="col-md-offset-1 col-md-10">
                        <table class="table table-striped table-bordered">
                            <tbody>
                                <tr class="text-center success">
                                    <td class="col-md-12" colspan="2">
                                        <i class="md-money" aria-hidden="true"></i> Remuneraciones
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-3">Sueldo Base</td>
                                    <td class="text-center">
                                        $ {{ $contract->salary }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-3">Movilización</td>
                                    <td class="text-center">
                                        $ {{ $contract->mobilization }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-3">Colación</td>
                                    <td class="text-center">
                                        $ {{ $contract->collation }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-3">Gratificación</td>
                                    <td class="text-center">
                                        25% legal anticipada con tope de 4.75 SMM
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-3">Tipo Contrato</td>
                                    <td class="text-center">
                                        <a href="{{ route('type-contracts.index') }}" style="color: #757575"><i class="fa fa-file-text" aria-hidden="true"></i> {{ $contract->typeContract->full_name }}</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
