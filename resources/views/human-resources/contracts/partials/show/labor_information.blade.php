<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body">
                <br/>
                <div class="table-responsive">
                    <div class="row">
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
                                            <a href="{{ route('administration.companies.show', $contract->company->id) }}" style="color: #757575"><i class="fa fa-building-o" aria-hidden="true"></i> {{ $contract->company->firm_name }}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3">Trabajador</td>
                                        <td class="text-center">
                                            <a href="{{ route('human-resources.employees.show', $contract->employee->id) }}" style="color: #757575"><i class="fa fa-street-view" aria-hidden="true"></i> {{ $contract->employee->full_name }}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3">Cargo</td>
                                        <td class="text-center">
                                            <a href="{{ route('maintainers.positions.index') }}" style="color: #757575"><i class="md-seat" aria-hidden="true"></i> {{ $contract->position->name }}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3">Área</td>
                                        <td class="text-center">
                                            <a href="{{ route('maintainers.areas.show', $contract->area->id) }}" style="color: #757575"><i class="fa fa-sitemap" aria-hidden="true"></i> {{ $contract->area->name }}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3">Nº de Horas</td>
                                        <td class="text-center">
                                            <a href="{{ route('maintainers.num-hours.index') }}" style="color: #757575"><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $contract->numHour->name }} hrs</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3">Periocidad Horas</td>
                                        <td class="text-center">
                                            <a href="{{ route('maintainers.periodicities.index') }}" style="color: #757575"><i class="fa fa-repeat" aria-hidden="true"></i> {{ $contract->periodicityHour->name }}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3">Jornada Laboral</td>
                                        <td class="text-center">
                                            <a href="{{ route('maintainers.day-trips.index') }}" style="color: #757575"><i class="fa fa-tasks" aria-hidden="true"></i> {{ $contract->dayTrip->name }}</a>
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
                                        <td class="col-md-3">Periocidad Mensual</td>
                                        <td class="text-center">
                                            <a href="{{ route('maintainers.periodicities.index') }}" style="color: #757575"><i class="fa fa-repeat" aria-hidden="true"></i> {{ $contract->periodicityWork->name }}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3">Ingresado</td>
                                        <td class="text-center text-capitalize">
                                            <i class="fa fa-calendar" aria-hidden="true"></i> {{ Date::parse($contract->created_at)->format('l j F Y H:i:s') }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <br />
                <div class="table-responsive">
                    <div class="row">
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
                                            {{ $contract->salary }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3">Movilización</td>
                                        <td class="text-center">
                                            {{ $contract->mobilization }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3">Colación</td>
                                        <td class="text-center">
                                            {{ $contract->collation }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3">Gratificación</td>
                                        <td class="text-center">
                                            <a href="{{ route('maintainers.gratifications.index') }}" style="color: #757575"><i class="fa fa-diamond" aria-hidden="true"></i> {{ $contract->gratification->name }}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3">Tipo Contrato</td>
                                        <td class="text-center">
                                            <a href="{{ route('maintainers.type-contracts.index') }}" style="color: #757575"><i class="fa fa-file-text" aria-hidden="true"></i> {{ $contract->typeContract->name }}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3">AFP</td>
                                        <td class="text-center">
                                            <a href="{{ route('maintainers.pensions.index') }}" style="color: #757575"><i class="fa fa-tags" aria-hidden="true"></i> AFP PENDIENTE</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3">Isapre</td>
                                        <td class="text-center">
                                            <a href="{{ route('maintainers.forecasts.index') }}" style="color: #757575"><i class="fa fa-heart" aria-hidden="true"></i> Isapre PENDIENTE</a>
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
</div>
