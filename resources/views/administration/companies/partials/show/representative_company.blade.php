<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body">
                <?php $i = 1 ?>
                @foreach($company->representativeCompanies as $representative_company)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-alt alert-success alert-dismissible" role="alert">
                                <span class="text-success">Representante Empresa #{{ $i }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-offset-1 col-md-10">
                        <table class="table table-striped table-bordered">
                            <tbody>
                                <tr>
                                    <td>Nombre</td>
                                    <td class="text-center">{{ $representative_company->full_name }}</td>
                                </tr>
                                <tr>
                                    <td class="col-md-2">Rut</td>
                                    <td class="text-center">{{ $representative_company->rut_representative }}</td>
                                </tr>
                                <tr>
                                    <td>Fecha Nacimiento</td>
                                    <td class="text-center text-capitalize"><i class="fa fa-calendar"></i> {{ Date::parse($representative_company->birthday)->format('l j F Y') }}</td>
                                </tr>
                                <tr>
                                    <td>Edad</td>
                                    <td class="text-center">{{ $representative_company->birthday->age . " años" }}</td>
                                </tr>
                                <tr>
                                    <td>Nacionalidad</td>
                                    <td class="text-center">{{ $representative_company->nationality->name }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td class="text-center"><i class="fa fa-envelope" aria-hidden="true"></i> {{ Html::mailto($representative_company->email_representative, null, ['class' => 'text-muted']) }}</td>
                                </tr>
                                <tr>
                                    <td>Teléfono 1</td>
                                    <td class="text-center"><i class="fa fa-phone" aria-hidden="true"></i> {{ $representative_company->phone1_representative }}</td>
                                </tr>
                                @if($representative_company->phone2_representative)
                                    <tr>
                                        <td>Teléfono 2</td>
                                        <td class="text-center"><i class="fa fa-fax" aria-hidden="true"></i> {{ $representative_company->phone2_representative }}</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <br />
                        <br />
                    </div>
                    <?php $i++; ?>
                @endforeach
            </div>
        </div>
    </div>
</div>