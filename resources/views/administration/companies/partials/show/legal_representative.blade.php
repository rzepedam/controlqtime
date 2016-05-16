<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body">
                <?php $i = 1 ?>
                @foreach($company->legalRepresentatives as $legal)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-alt alert-success alert-dismissible" role="alert">
                                <span class="text-success">Representante Legal #{{ $i }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-offset-1 col-md-10">
                        <table class="table table-striped table-bordered">
                            <tbody>
                                <tr>
                                    <td>Nombre</td>
                                    <td class="text-center">{{ $legal->full_name }}</td>
                                </tr>
                                <tr>
                                    <td class="col-md-2">Rut</td>
                                    <td class="text-center">{{ $legal->rut_legal }}</td>
                                </tr>
                                <tr>
                                    <td>Fecha Nacimiento</td>
                                    <td class="text-center text-capitalize"><i class="fa fa-calendar"></i> {{ Date::parse($legal->birthday)->format('l j F Y') }}</td>
                                </tr>
                                <tr>
                                    <td>Edad</td>
                                    <td class="text-center">{{ $legal->birthday->age . " años" }}</td>
                                </tr>
                                <tr>
                                    <td>Nacionalidad</td>
                                    <td class="text-center">{{ $legal->nationality->name }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td class="text-center"><i class="fa fa-envelope" aria-hidden="true"></i> {{ Html::mailto($legal->email_legal, null, ['class' => 'text-muted']) }}</td>
                                </tr>
                                <tr>
                                    <td>Teléfono 1</td>
                                    <td class="text-center"><i class="fa fa-phone" aria-hidden="true"></i> {{ $legal->phone1_legal }}</td>
                                </tr>
                                @if($legal->phone2_legal)
                                    <tr>
                                        <td>Teléfono 2</td>
                                        <td class="text-center"><i class="fa fa-fax" aria-hidden="true"></i> {{ $legal->phone2_legal }}</td>
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