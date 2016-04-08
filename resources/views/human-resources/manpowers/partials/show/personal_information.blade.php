<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="ribbon ribbon-bookmark ribbon-reverse ribbon-info">
                <span class="ribbon-inner"><i class="fa fa-gift"></i> {{ "Miembro hace " . \Carbon\Carbon::now()->diffInYears($manpower->created_at) . " años" }}</span>
            </div>
            <div class="ribbon ribbon-bookmark ribbon-info">
                <span class="ribbon-inner">COD REF : 234568765434567</span>
            </div>
            <div class="panel-body">
                <br />
                <br />
                <div class="table-responsive">
                    <div class="row">
                        <div class="col-md-offset-2 col-md-6">
                            <table class="table table-striped table-bordered">
                                <tbody>
                                    <tr class="text-center">
                                        <td><i class="fa fa-street-view"></i> {{ $manpower->full_name }}</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td><i class="fa fa-building-o"></i> {{ $manpower->company->firm_name }}</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td><i class="fa fa-envelope"></i> {{ Html::mailto($manpower->email, null, ['class' => 'text-muted']) }}</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td><i class="md-seat font-size-18"></i> {{ $manpower->rating->name   }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-2" style="margin-top: 6px;">
                            <img src="{{ asset('assets/images/5.jpg') }}" alt="{{ $manpower->full_name }}" width="152" height="152" class="img-bordered img-bordered-primary">
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-md-offset-1 col-md-10">
                            <table class="table table-striped table-bordered">
                                <tbody>
                                    <tr>
                                        <td class="col-md-3">Rut</td>
                                        <td class="text-center"> {{ $manpower->rut }}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3">Edad</td>
                                        <td class="text-center">{{ $manpower->birthday->age . " años" }}</td>
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
                                        <td class="text-center"><i class="fa fa-map-marker"></i> {{ $manpower->address . ", " . $manpower->commune->name . ". " . $manpower->commune->province->name . ". " . $manpower->commune->province->region->name }}</td>
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
                <br />
                <div class="table-responsive">
                    <div class="row">
                        <div class="col-md-offset-1 col-md-10">
                            <?php $i = 1; ?>
                            <table class="table table-striped table-bordered">
                                <tbody>

                                    <tr class="text-center warning">
                                        <td class="col-md-12" colspan="3"><i class="md-male-female font-size-18"></i> Parentescos Familiares</td>
                                    </tr>
                                    <tr class="active">
                                        <th class="col-md-1 text-center"><i class="fa fa-hashtag"></i></th>
                                        <th class="col-md-3 text-center">Relación</th>
                                        <th class="col-md-8 text-center">Trabajador</th>
                                    </tr>

                                    @foreach($manpower->familyRelationships as $family_relationship)

                                        <tr>
                                            <td class="text-center">{{ $i }}</td>
                                            <td class="text-center">{{ $family_relationship->relationship->name }}</td>
                                            <td class="text-center">{{ $family_relationship->manpower->full_name }}</td>
                                        </tr>
                                        <?php $i++; ?>
                                    @endforeach


                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>