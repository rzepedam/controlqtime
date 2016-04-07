<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body">
                <div class="table-responsive">
                    <div class="row">
                        <div class="col-md-offset-2 col-md-6">
                            <table class="table table-striped">
                                <tbody>
                                    <tr class="text-center info">
                                        <td class="font-size-16">{{ $manpower->full_name }}</td>
                                    </tr>
                                    <tr class="text-center active">
                                        <td><i class="fa fa-building-o"></i> {{ $manpower->company->firm_name }}</td>
                                    </tr>
                                    <tr class="text-center active">
                                        <td><i class="fa fa-envelope"></i> {{ Html::mailto($manpower->email, null, ['class' => 'text-muted']) }}</td>
                                    </tr>
                                    <tr class="text-center active">
                                        <td> {{ $manpower->rating->name   }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-2" style="margin-top: 6px;">
                            <img src="{{ asset('assets/images/descarga.svg') }}" alt="" class="img-thumbnail">
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-md-offset-1 col-md-10">
                            <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td class="col-md-3">Rut</td>
                                <td class="text-center"> {{ $manpower->rut }}</td>
                            </tr>
                            <tr>
                                <td class="col-md-3">Fecha de Nacimiento</td>
                                <td class="text-center text-capitalize"><i class="fa fa-calendar"></i> {{ Date::parse($manpower->birthday)->format('l j F Y') }}</td>
                            </tr>
                            <tr>
                                <td class="col-md-3">Nacionalidad</td>
                                <td class="text-center">{{ $manpower->nationality->name }}</td>
                            </tr>
                            <tr>
                                <td class="col-md-3">Género</td>
                                <td class="text-center">{{ $manpower->gender->name }}</td>
                            </tr>
                            <tr>
                                <td class="col-md-3">Domicilio</td>
                                <td class="text-center"><i class="fa fa-map-marker"></i> {{ $manpower->address . ". " . $manpower->commune->name . ", " . $manpower->commune->province->name . ". " . $manpower->commune->province->region->name }}</td>
                            </tr>
                            <tr>
                                <td class="col-md-3">Teléfono 1</td>
                                <td class="text-center"><i class="fa fa-phone"></i> {{ $manpower->phone1 }}</td>
                            </tr>
                            <tr>
                                <td class="col-md-3">Teléfono 2</td>
                                <td class="text-center">{{ $manpower->phone2 }}</td>
                            </tr>
                            <tr>
                                <td class="col-md-3">Previsión</td>
                                <td class="text-center">{{ $manpower->forecast->name }}</td>
                            </tr>
                            <tr>
                                <td class="col-md-3">Mutualidad</td>
                                <td class="text-center">{{ $manpower->mutuality->name }}</td>
                            </tr>
                            <tr>
                                <td class="col-md-3">AFP</td>
                                <td class="text-center">{{ $manpower->pension->name }}</td>
                            </tr>
                            <tr>
                                <td class="col-md-3">Ingresado</td>
                                <td class="text-center text-capitalize">{{ Date::parse($manpower->created_at)->format('l j F Y H:i:s') }}</td>
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