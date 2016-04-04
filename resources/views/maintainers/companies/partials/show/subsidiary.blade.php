@if($company->num_subsidiaries)
    <?php $i = 1 ?>
    @foreach($company->subsidiaries as $subsidiary)
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-alt alert-warning alert-dismissible" role="alert">
                    <span id="num_subsidiary{{ $i }}" class="text-warning">Sucursal #{{ $i }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <div class="panel">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-condensed">
                            <tbody>
                                <tr>
                                    <td><b>Email</b></td>
                                    <td class="text-center"><i class="fa fa-envelope"></i> {{ Html::mailto($subsidiary->email) }}</td>
                                </tr>
                                <tr>
                                    <td><b>Teléfono 1</b></td>
                                    <td class="text-center"><i class="fa fa-phone"></i> {{ $subsidiary->phone1 }}</td>
                                </tr>
                                <tr>
                                    <td><b>Dirección</b></td>
                                    <td class="text-center"><i class="fa fa-map-marker"></i> {{ $subsidiary->address . " " . $subsidiary->num . ". " . $subsidiary->commune->name . ", " . $subsidiary->commune->province->name . ". " . $subsidiary->commune->province->region->name }}</td>
                                </tr>
                                @if($subsidiary->lot)
                                    <tr>
                                        <td><b>Lote</b></td>
                                        <td class="text-center">{{ $subsidiary->lot }}</td>
                                    </tr>
                                @endif
                                @if($subsidiary->floor)
                                    <tr>
                                        <td><b>Piso</b></td>
                                        <td class="text-center">{{ $subsidiary->floor }}</td>
                                    </tr>
                                @endif
                                @if($subsidiary->ofi)
                                    <tr>
                                        <td><b>Oficina</b></td>
                                        <td class="text-center">{{ $subsidiary->ofi }}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td><b>Patente Municipal</b></td>
                                    <td class="text-center">{{ $subsidiary->muni_license }}</td>
                                </tr>
                                @if($subsidiary->phone2)
                                    <tr>
                                        <td><b>Teléfono 2</b></td>
                                        <td class="text-center">{{ $subsidiary->phone2 }}</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @if ($i > 1)
            <hr />
        @endif
        <?php $i++; ?>
    @endforeach
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