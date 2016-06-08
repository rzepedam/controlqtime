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
                                    <img class="overlay-figure overlay-scale" src="{{ $image_rol->path }}">
                                    <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                                        <a class="icon md-search" href="{{ $image_rol->path }}"></a>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>

                    @endforeach
                @else
                    <br/>
                    <h3 class="text-center text-success">No existen Imágenes de Rol asociadas a la Empresa actual
                        <br/>
                        <small>(Puede adjuntar la documentación desde <a class="text-warning" href="{{ route('administration.companies.attachFiles', $company->id) }}">Aquí</a>)
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
                            <i class="fa fa-picture-o text-info"></i> Imágenes Patente
                        </div>
                    </div>
                </div>
                @if (count($company->imagePatentCompanies) > 0)
                    @foreach($company->imagePatentCompanies as $image_patent)

                        <div class="col-md-4">
                            <div class="widget widget-shadow">
                                <figure class="widget-header overlay-hover overlay">
                                    <img class="overlay-figure overlay-scale" src="{{ $image_patent->path }}">
                                    <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                                        <a class="icon md-search" href="{{ $image_patent->path }}"></a>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>

                    @endforeach
                @else
                    <br/>
                    <h3 class="text-center text-info">No existen Imágenes de Patente asociadas a la Empresa actual
                        <br/>
                        <small>(Puede adjuntar la documentación desde <a class="text-info" href="{{ route('administration.companies.attachFiles', $company->id) }}">Aquí</a>)
                        </small>
                    </h3>
                    <br/>
                    <br/>
                @endif
            </div>
        </div>
    </div>
</div>