@if($company->num_subsidiary)
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <?php $i = 1 ?>
                    @foreach($company->subsidiaries as $subsidiary)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-alt alert-warning alert-dismissible" role="alert">
                                    <span id="num_subsidiary{{ $i }}" class="text-warning">Sucursal #{{ $i }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-offset-1 col-md-10">
                            <table class="table table-striped table-bordered">
                                <tbody>
                                    <tr>
                                        <td><b>Email</b></td>
                                        <td class="text-center">
                                            <i class="fa fa-envelope" aria-hidden="true"></i> {{ Html::mailto($subsidiary->email_suc, null, ['class' => 'text-muted']) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Teléfono 1</b></td>
                                        <td class="text-center"><i class="fa fa-phone" aria-hidden="true"></i> {{ $subsidiary->phone1_suc }}</td>
                                    </tr>
                                    @if($subsidiary->phone2_suc)
                                        <tr>
                                            <td><b>Teléfono 2</b></td>
                                            <td class="text-center"><i class="fa fa-fax" aria-hidden="true"></i> {{ $subsidiary->phone2_suc }}</td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td><b>Dirección</b></td>
                                        <td class="text-center"><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $subsidiary->address_suc . " " . $subsidiary->num_suc . ". " . $subsidiary->commune->name . ", " . $subsidiary->commune->province->name . ". " . $subsidiary->commune->province->region->name }}</td>
                                    </tr>
                                    @if($subsidiary->lot_suc)
                                        <tr>
                                            <td><b>Lote</b></td>
                                            <td class="text-center">{{ $subsidiary->lot_suc }}</td>
                                        </tr>
                                    @endif
                                    @if($subsidiary->floor_suc)
                                        <tr>
                                            <td><b>Piso</b></td>
                                            <td class="text-center">{{ $subsidiary->floor_suc }}</td>
                                        </tr>
                                    @endif
                                    @if($subsidiary->ofi_suc)
                                        <tr>
                                            <td><b>Oficina</b></td>
                                            <td class="text-center">{{ $subsidiary->ofi_suc }}</td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td><b>Patente Municipal</b></td>
                                        <td class="text-center">{{ $subsidiary->muni_license_suc }}</td>
                                    </tr>
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
@else
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-heading">
                    <h3 class="panel-title"></h3>
                </div>
                <div class="panel-body">

                    <br />
                    <br />
                    <h1 class="text-center text-warning"><i class="fa fa-cubes fa-4x"></i>
                        <br />
                        <br />
                        No existen Sucursales Asociadas
                    </h1>
                    <br />
                    <br />
                    <br />

                </div>
                <div class="panel-footer">

                </div>
            </div>
        </div>
    </div>
@endif