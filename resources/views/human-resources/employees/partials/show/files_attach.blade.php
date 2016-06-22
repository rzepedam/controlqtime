@if ($employee->num_certifications > 0)
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-alt alert-danger alert-dismissible" role="alert">
                                <i class="fa fa-picture-o text-danger"></i> Imágenes Certificaciones
                            </div>
                        </div>
                    </div>
                    @if($employee->imageCertificationEmployees->count() > 0)
                        @foreach($employee->imageCertificationEmployees as $image_certification)

                            <div class="col-md-4">
                                <div class="widget widget-shadow">
                                    <figure class="widget-header overlay-hover overlay">
                                        <img class="overlay-figure overlay-scale" src="{{ $image_certification->path }}">
                                        <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                                            {{ Form::open(array('route' => array('download.file'), 'method' => 'POST', 'id' => 'form-download', 'style' => 'display: inline')) }}
                                                <a class="icon md-download download-file" href="javascript:void(0)" data-id="{{ $image_certification->path }}"></a>
                                            {{ Form::close() }}
                                            <a class="icon md-search" href="{{ $image_certification->path }}"></a>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>

                        @endforeach
                    @else
                        <br/>
                        <h3 class="text-center text-danger">No existen Imágenes de Certificaciones asociadas al Trabajador actual
                            <br/>
                            <small>(Puede adjuntar la documentación desde <a class="text-danger" href="{{ route('human-resources.employees.attachFiles', $employee->id) }}">Aquí</a>)
                            </small>
                        </h3>
                        <br/>
                        <br/>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endif


@if ($employee->num_specialities > 0)
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-alt alert-warning alert-dismissible" role="alert">
                                <i class="fa fa-picture-o text-warning"></i> Imágenes Especialidades
                            </div>
                        </div>
                    </div>
                    @if($employee->imageSpecialityEmployees->count() > 0)
                        @foreach($employee->imageSpecialityEmployees as $image_speciality)

                            <div class="col-md-4">
                                <div class="widget widget-shadow">
                                    <figure class="widget-header overlay-hover overlay">
                                        <img class="overlay-figure overlay-scale" src="{{ $image_speciality->path }}">
                                        <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                                            {{ Form::open(array('route' => array('download.file'), 'method' => 'POST', 'id' => 'form-download', 'style' => 'display: inline')) }}
                                                <a class="icon md-download download-file" href="javascript:void(0)" data-id="{{ $image_speciality->path }}"></a>
                                            {{ Form::close() }}
                                            <a class="icon md-search" href="{{ $image_speciality->path }}"></a>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>

                        @endforeach
                    @else
                        <br/>
                        <h3 class="text-center text-warning">No existen Imágenes de Especialidades asociadas al Trabajador actual
                            <br/>
                            <small>(Puede adjuntar la documentación desde <a class="text-warning" href="{{ route('human-resources.employees.attachFiles', $employee->id) }}">Aquí</a>)
                            </small>
                        </h3>
                        <br/>
                        <br/>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endif

@if ($employee->num_professional_licenses > 0)
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-alt alert-success alert-dismissible" role="alert">
                                <i class="fa fa-picture-o text-success"></i                                                                                                                                                                                                                             > Imágenes Licencia Profesional
                            </div>
                        </div>
                    </div>
                    @if ($employee->imageProfessionalLicenses->count() > 0)
                        @foreach($employee->imageProfessionalLicenses as $image_professional_license)

                            <div class="col-md-4">
                                <div class="widget widget-shadow">
                                    <figure class="widget-header overlay-hover overlay">
                                        <img class="overlay-figure overlay-scale" src="{{ $image_professional_license->path }}">
                                        <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                                            {{ Form::open(array('route' => array('download.file'), 'method' => 'POST', 'id' => 'form-download', 'style' => 'display: inline')) }}
                                                <a class="icon md-download download-file" href="javascript:void(0)" data-id="{{ $image_professional_license->path }}"></a>
                                            {{ Form::close() }}
                                            <a class="icon md-search" href="{{ $image_professional_license->path }}"></a>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>

                        @endforeach
                    @else
                        <br/>
                        <h3 class="text-center text-success">No existen Imágenes de Licencia Profesional asociadas al Trabajador actual
                            <br/>
                            <small>(Puede adjuntar la documentación desde <a class="text-success" href="{{ route('human-resources.employees.attachFiles', $employee->id) }}">Aquí</a>)
                            </small>
                        </h3>
                        <br/>
                        <br/>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endif

@if ($employee->num_disabilities > 0)
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-alt alert-warning alert-dismissible" role="alert">
                                <i class="fa fa-picture-o text-warning"></i> Imágenes Discapacidades
                            </div>
                        </div>
                    </div>
                    @if ($employee->imageDisabilityEmployees->count() > 0)
                        @foreach($employee->imageDisabilityEmployees as $image_disability)

                            <div class="col-md-4">
                                <div class="widget widget-shadow">
                                    <figure class="widget-header overlay-hover overlay">
                                        <img class="overlay-figure overlay-scale" src="{{ $image_disability->path }}">
                                        <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                                            {{ Form::open(array('route' => array('download.file'), 'method' => 'POST', 'id' => 'form-download', 'style' => 'display: inline')) }}
                                                <a class="icon md-download download-file" href="javascript:void(0)" data-id="{{ $image_disability->path }}"></a>
                                            {{ Form::close() }}
                                            <a class="icon md-search" href="{{ $image_disability->path }}"></a>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>

                        @endforeach
                    @else
                        <br/>
                        <h3 class="text-center text-warning">No existen Imágenes de Discapacidades asociadas al Trabajador actual
                            <br/>
                            <small>(Puede adjuntar la documentación desde <a class="text-warning" href="{{ route('human-resources.employees.attachFiles', $employee->id) }}">Aquí</a>)
                            </small>
                        </h3>
                        <br/>
                        <br/>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endif

@if ($employee->num_diseases > 0)
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-alt alert-success alert-dismissible" role="alert">
                                <i class="fa fa-picture-o text-success"></i> Imágenes Enfermedades
                            </div>
                        </div>
                    </div>
                    @if ($employee->imageDiseaseEmployees->count() > 0)
                        @foreach($employee->imageDiseaseEmployees as $image_disease)

                            <div class="col-md-4">
                                <div class="widget widget-shadow">
                                    <figure class="widget-header overlay-hover overlay">
                                        <img class="overlay-figure overlay-scale" src="{{ $image_disease->path }}">
                                        <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                                            {{ Form::open(array('route' => array('download.file'), 'method' => 'POST', 'id' => 'form-download', 'style' => 'display: inline')) }}
                                                <a class="icon md-download download-file" href="javascript:void(0)" data-id="{{ $image_disease->path }}"></a>
                                            {{ Form::close() }}
                                            <a class="icon md-search" href="{{ $image_disease->path }}"></a>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>

                        @endforeach
                    @else
                        <br/>
                        <h3 class="text-center text-success">No existen Imágenes de Enfermedades asociadas al Trabajador actual
                            <br/>
                            <small>(Puede adjuntar la documentación desde <a class="text-success" href="{{ route('human-resources.employees.attachFiles', $employee->id) }}">Aquí</a>)
                            </small>
                        </h3>
                        <br/>
                        <br/>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endif

@if ($employee->num_exams > 0)
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-alt alert-info alert-dismissible" role="alert">
                                <i class="fa fa-picture-o text-info"></i> Imágenes Examen Preocupacional
                            </div>
                        </div>
                    </div>
                    @if ($employee->imageExamEmployees->count() > 0)
                        @foreach($employee->imageExamEmployees as $image_exam)

                            <div class="col-md-4">
                                <div class="widget widget-shadow">
                                    <figure class="widget-header overlay-hover overlay">
                                        <img class="overlay-figure overlay-scale" src="{{ $image_exam->path }}">
                                        <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                                            {{ Form::open(array('route' => array('download.file'), 'method' => 'POST', 'id' => 'form-download', 'style' => 'display: inline')) }}
                                                <a class="icon md-download download-file" href="javascript:void(0)" data-id="{{ $image_exam->path }}"></a>
                                            {{ Form::close() }}
                                            <a class="icon md-search" href="{{ $image_exam->path }}"></a>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>

                        @endforeach
                    @else
                        <br/>
                        <h3 class="text-center text-info">No existen Imágenes de Examen Preocupacional asociadas al Trabajador actual
                            <br/>
                            <small>(Puede adjuntar la documentación desde <a class="text-info" href="{{ route('human-resources.employees.attachFiles', $employee->id) }}">Aquí</a>)
                            </small>
                        </h3>
                        <br/>
                        <br/>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endif

@if ($employee->num_family_responsabilities > 0)
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-alt alert-danger alert-dismissible" role="alert">
                                <i class="fa fa-picture-o text-danger"></i> Imágenes Carga Familiar
                            </div>
                        </div>
                    </div>
                    @if ($employee->imageFamilyResponsabilityEmployees->count() > 0)
                        @foreach($employee->imageFamilyResponsabilityEmployees as $image_family_responsability)

                            <div class="col-md-4">
                                <div class="widget widget-shadow">
                                    <figure class="widget-header overlay-hover overlay">
                                        <img class="overlay-figure overlay-scale" src="{{ $image_family_responsability->path }}">
                                        <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                                            {{ Form::open(array('route' => array('download.file'), 'method' => 'POST', 'id' => 'form-download', 'style' => 'display: inline')) }}
                                                <a class="icon md-download download-file" href="javascript:void(0)" data-id="{{ $image_family_responsability->path }}"></a>
                                            {{ Form::close() }}
                                            <a class="icon md-search" href="{{ $image_family_responsability->path }}"></a>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>

                        @endforeach
                    @else
                        <br/>
                        <h3 class="text-center text-danger">No existen Imágenes de Carga Familiar asociadas al Trabajador actual
                            <br/>
                            <small>(Puede adjuntar la documentación desde <a class="text-danger" href="{{ route('human-resources.employees.attachFiles', $employee->id) }}">Aquí</a>)
                            </small>
                        </h3>
                        <br/>
                        <br/>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endif

@if ($employee->num_certifications + $employee->num_specialities + $employee->num_professional_licenses +
    $employee->num_disabilities + $employee->num_diseases + $employee->num_exams + $employee->num_family_responsabilities == 0)

    <div class="panel">
        <div class="panel-body">

            <br/>
            <h3 class="text-center text-primary">No existen Imágenes asociadas al Trabajador actual
                <br/>
                <small>(Puede adjuntar la documentación desde <a class="text-primary" href="{{ route('human-resources.employees.edit', $employee->id) }}">Aquí</a>)
                </small>
            </h3>
            <br/>
            <br/>

        </div>
    </div>

@endif