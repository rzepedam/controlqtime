<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-alt alert-success alert-dismissible" role="alert">
                            <i class="fa fa-picture-o text-success"></i> Imágenes Padrón
                        </div>
                    </div>
                </div>
                @if (count($vehicle->imagePadrones) > 0)
                    @foreach($vehicle->imagePadrones as $image_padron)

                        <div class="col-md-4">
                            <div class="widget widget-shadow">
                                <figure class="widget-header overlay-hover overlay">
                                    <img class="overlay-figure overlay-scale" src="{{ $image_padron->path }}">
                                    <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                                        <a class="icon md-search" href="{{ $image_padron->path }}" data-plugin="magnificPopup"></a>
                                        {{ Form::open(array('route' => array('download.file'), 'method' => 'POST', 'id' => 'form-download', 'style' => 'display: inline')) }}
                                            <a class="icon md-download download-file" href="javascript:void(0)" data-id="{{ $image_padron->path }}"></a>
                                        {{ Form::close() }}
                                    </figcaption>
                                </figure>
                            </div>
                        </div>

                    @endforeach
                @else
                    <br/>
                    <h3 class="text-center text-success">No existen Imágenes de Padrón asociadas al Vehículo actual
                        <br/>
                        <small>(Puede adjuntar la documentación desde <a class="text-success" href="{{ route('operations.vehicles.attachFiles', $vehicle->id) }}">Aquí</a>)
                        </small>
                    </h3>
                    <br/>
                    <br/>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-alt alert-info alert-dismissible" role="alert">
                            <i class="fa fa-picture-o text-info"></i> Imágenes Seguro Obligatorio
                        </div>
                    </div>
                </div>
                @if (count($vehicle->imageObligatoryInsurances) > 0)
                    @foreach($vehicle->imageObligatoryInsurances as $image_obligatory_insurance)

                        <div class="col-md-4">
                            <div class="widget widget-shadow">
                                <figure class="widget-header overlay-hover overlay">
                                    <img class="overlay-figure overlay-scale" src="{{ $image_obligatory_insurance->path }}">
                                    <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                                        <a class="icon md-search" href="{{ $image_obligatory_insurance->path }}" data-plugin="magnificPopup"></a>
                                        {{ Form::open(array('route' => array('download.file'), 'method' => 'POST', 'id' => 'form-download', 'style' => 'display: inline')) }}
                                            <a class="icon md-download download-file" href="javascript:void(0)" data-id="{{ $image_obligatory_insurance->path }}"></a>
                                        {{ Form::close() }}
                                    </figcaption>
                                </figure>
                            </div>
                        </div>

                    @endforeach
                @else
                    <br/>
                    <h3 class="text-center text-info">No existen Imágenes de Seguro Obligatorio asociadas al Vehículo actual
                        <br/>
                        <small>(Puede adjuntar la documentación desde <a class="text-info" href="{{ route('operations.vehicles.attachFiles', $vehicle->id) }}">Aquí</a>)
                        </small>
                    </h3>
                    <br/>
                    <br/>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-alt alert-warning alert-dismissible" role="alert">
                            <i class="fa fa-picture-o text-warning"></i> Imágenes Patente Vehículo
                        </div>
                    </div>
                </div>
                @if (count($vehicle->imagePatents) > 0)
                    @foreach($vehicle->imagePatents as $image_patent)

                        <div class="col-md-4">
                            <div class="widget widget-shadow">
                                <figure class="widget-header overlay-hover overlay">
                                    <img class="overlay-figure overlay-scale" src="{{ $image_patent->path }}">
                                    <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                                        <a class="icon md-search" href="{{ $image_patent->path }}" data-plugin="magnificPopup"></a>
                                        {{ Form::open(array('route' => array('download.file'), 'method' => 'POST', 'id' => 'form-download', 'style' => 'display: inline')) }}
                                            <a class="icon md-download download-file" href="javascript:void(0)" data-id="{{ $image_patent->path }}"></a>
                                        {{ Form::close() }}
                                    </figcaption>
                                </figure>
                            </div>
                        </div>

                    @endforeach
                @else
                    <br/>
                    <h3 class="text-center text-warning">No existen Imágenes de Patente asociadas al Vehículo actual
                        <br/>
                        <small>(Puede adjuntar la documentación desde <a class="text-warning" href="{{ route('operations.vehicles.attachFiles', $vehicle->id) }}">Aquí</a>)
                        </small>
                    </h3>
                    <br/>
                    <br/>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-alt alert-danger alert-dismissible" role="alert">
                            <i class="fa fa-picture-o text-danger"></i> Imágenes Permiso de Circulación
                        </div>
                    </div>
                </div>
                @if (count($vehicle->imageCirculationPermits) > 0)
                    @foreach($vehicle->imageCirculationPermits as $image_circulation_permit)

                        <div class="col-md-4">
                            <div class="widget widget-shadow">
                                <figure class="widget-header overlay-hover overlay">
                                    <img class="overlay-figure overlay-scale" src="{{ $image_circulation_permit->path }}">
                                    <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                                        <a class="icon md-search" href="{{ $image_circulation_permit->path }}" data-plugin="magnificPopup"></a>
                                        {{ Form::open(array('route' => array('download.file'), 'method' => 'POST', 'id' => 'form-download', 'style' => 'display: inline')) }}
                                            <a class="icon md-download download-file" href="javascript:void(0)" data-id="{{ $image_circulation_permit->path }}"></a>
                                        {{ Form::close() }}
                                    </figcaption>
                                </figure>
                            </div>
                        </div>

                    @endforeach
                @else
                    <br/>
                    <h3 class="text-center text-danger">No existen Imágenes de Permiso de Circulación asociadas al Vehículo actual
                        <br/>
                        <small>(Puede adjuntar la documentación desde <a class="text-danger" href="{{ route('operations.vehicles.attachFiles', $vehicle->id) }}">Aquí</a>)
                        </small>
                    </h3>
                    <br/>
                    <br/>
                @endif
            </div>
        </div>
    </div>
</div>