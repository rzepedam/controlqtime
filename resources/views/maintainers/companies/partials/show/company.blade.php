<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td>Razón Social</td>
                                <td class="text-center"><i class="fa fa-building-o"></i> {{ $company->firm_name }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td class="text-center"><i class="fa fa-envelope"></i> {{ Html::mailto($company->email, null, ['class' => 'text-muted']) }}</td>
                            </tr>
                            <tr>
                                <td>Teléfono 1</td>
                                <td class="text-center"><i class="fa fa-phone"></i> {{ $company->phone1 }}</td>
                            </tr>
                            <tr>
                                <td>Dirección</td>
                                <td class="text-center"><i class="fa fa-map-marker"></i> {{ $company->address . " " . $company->num . ". " . $company->commune->name . ", " . $company->commune->province->name . ". " . $company->commune->province->region->name }}</td>
                            </tr>
                            <tr>
                                <td>Inicio Actividad</td>
                                <td class="text-center text-capitalize"><i class="fa fa-calendar"></i> {{ Date::parse($company->start_act)->format('l j F Y') }}</td>
                            </tr>
                            <tr>
                                <td class="col-md-2">Rut</td>
                                <td class="text-center">{{ $company->rut }}</td>
                            </tr>
                            <tr>
                                <td>Giro</td>
                                <td class="text-center">{{ $company->gyre }}</td>
                            </tr>
                            @if($company->lot)
                                <tr>
                                    <td>Lote</td>
                                    <td class="text-center">{{ $company->lot }}</td>
                                </tr>
                            @endif
                            @if($company->floor)
                                <tr>
                                    <td>Piso</td>
                                    <td class="text-center">{{ $company->floor }}</td>
                                </tr>
                            @endif
                            @if($company->ofi)
                                <tr>
                                    <td>Oficina</td>
                                    <td class="text-center">{{ $company->ofi }}</td>
                                </tr>
                            @endif
                            <tr>
                                <td>Patente Municipal</td>
                                <td class="text-center">{{ $company->muni_license }}</td>
                            </tr>
                            @if($company->phone2)
                                <tr>
                                    <td>Teléfono 2</td>
                                    <td class="text-center">{{ $company->phone2 }}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>