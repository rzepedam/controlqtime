<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-alt alert-success alert-dismissible" role="alert">
                            <i class="fa fa-picture-o text-success"></i> Imágenes Rol
                        </div>
                    </div>
                </div>
                @if (count($company->imageRolCompanies) > 0)
                    @foreach($company->imageRolCompanies as $image_rol)

                        <div class="col-md-4">
                            <div class="widget widget-shadow">
                                <figure class="widget-header overlay-hover overlay">
                                    <img class="overlay-figure overlay-scale" src="{{ Storage::disk('s3')->url($image_rol->path) }}">
                                    <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                                        <a class="icon md-search" href="{{ Storage::disk('s3')->url($image_rol->path) }}" data-plugin="magnificPopup"></a>
                                        {{ Form::open(array('route' => array('download.file'), 'method' => 'POST', 'id' => 'form-download', 'style' => 'display: inline')) }}
                                            <a class="icon md-download download-file" href="javascript:void(0)" data-id="{{ $image_rol->path }}" data-name="{{ $image_rol->orig_name }}"></a>
                                        {{ Form::close() }}
                                    </figcaption>
                                </figure>
                            </div>
                        </div>

                    @endforeach
                @else
                    <br/>
                    <h3 class="text-center text-success">No existen Imágenes de Rol asociadas a la Empresa actual
                        <br/>
                        <small>(Puede adjuntar la documentación desde <a class="text-success" href="{{ route('CompanyAttachFiles', $company->id) }}">Aquí</a>)</small>
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
                            <i class="fa fa-picture-o text-info"></i> Imágenes Patente
                        </div>
                    </div>
                </div>
                @if (count($company->imagePatentCompanies) > 0)
                    @foreach($company->imagePatentCompanies as $image_patent)

                        <div class="col-md-4">
                            <div class="widget widget-shadow">
                                <figure class="widget-header overlay-hover overlay">
                                    <img class="overlay-figure overlay-scale" src="{{ Storage::disk('s3')->url($image_patent->path) }}">
                                    <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                                        <a class="icon md-search" href="{{ Storage::disk('s3')->url($image_patent->path) }}" data-plugin="magnificPopup"></a>
                                        {{ Form::open(array('route' => array('download.file'), 'method' => 'POST', 'id' => 'form-download', 'style' => 'display: inline')) }}
                                            <a class="icon md-download download-file" href="javascript:void(0)" data-id="{{ $image_patent->path }}" data-name="{{ $image_patent->orig_name }}"></a>
                                        {{ Form::close() }}
                                    </figcaption>
                                </figure>
                            </div>
                        </div>

                    @endforeach
                @else
                    <br/>
                    <h3 class="text-center text-info">No existen Imágenes de Patente asociadas a la Empresa actual
                        <br/>
                        <small>(Puede adjuntar la documentación desde <a class="text-info" href="{{ route('CompanyAttachFiles', $company->id) }}">Aquí</a>)</small>
                    </h3>
                    <br/>
                    <br/>
                @endif
            </div>
        </div>
    </div>
</div>