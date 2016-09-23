<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-alt alert-info alert-dismissible" role="alert">
                            <i class="fa fa-picture-o text-info"></i> Carnet de Identidad
                        </div>
                    </div>
                </div>
                @if (count($employee->imageIdentityCardEmployees) > 0)
                    @foreach($employee->imageIdentityCardEmployees as $image_identity_card)

                        <div class="col-md-4">
                            <div class="widget widget-shadow">
                                <figure class="widget-header overlay-hover overlay">
                                    <img class="overlay-figure overlay-scale" src="{{ Storage::disk('s3')->url($image_identity_card->path) }}">
                                    <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                                        <a class="icon md-search" href="{{ Storage::disk('s3')->url($image_identity_card->path) }}" data-plugin="magnificPopup"></a>
                                        {{ Form::open(array('route' => array('download.file'), 'method' => 'POST', 'id' => 'form-download', 'style' => 'display: inline')) }}
                                        <a class="icon md-download download-file" href="javascript:void(0)" data-id="{{ $image_identity_card->path }}" data-name="{{ $image_identity_card->orig_name }}"></a>
                                        {{ Form::close() }}
                                    </figcaption>
                                </figure>
                            </div>
                        </div>

                    @endforeach
                @else
                    <br/>
                    <h3 class="text-center text-info">No existen Imágenes de Carnet de Identidad asociadas al Trabajador actual
                        <br/>
                        <small>(Puede adjuntar la documentación desde <a class="text-info" href="{{ route('EmployeeAttachFiles', $employee->id) }}">Aquí</a>)</small>
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
                        <div class="alert alert-alt alert-success alert-dismissible" role="alert">
                            <i class="fa fa-picture-o text-success"></i> Certificado de Antecedentes
                        </div>
                    </div>
                </div>
                @if (count($employee->imageCriminalRecordEmployees) > 0)
                    @foreach($employee->imageCriminalRecordEmployees as $image_criminal_record)

                        <div class="col-md-4">
                            <div class="widget widget-shadow">
                                <figure class="widget-header overlay-hover overlay">
                                    <img class="overlay-figure overlay-scale" src="{{ Storage::disk('s3')->url($image_criminal_record->path) }}">
                                    <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                                        <a class="icon md-search" href="{{ Storage::disk('s3')->url($image_criminal_record->path) }}" data-plugin="magnificPopup"></a>
                                        {{ Form::open(array('route' => array('download.file'), 'method' => 'POST', 'id' => 'form-download', 'style' => 'display: inline')) }}
                                            <a class="icon md-download download-file" href="javascript:void(0)" data-id="{{ $image_criminal_record->path }}" data-name="{{ $image_criminal_record->orig_name }}"></a>
                                        {{ Form::close() }}
                                    </figcaption>
                                </figure>
                            </div>
                        </div>

                    @endforeach
                @else
                    <br/>
                    <h3 class="text-center text-success">No existen Imágenes de Certificado de Antecedentes asociadas al Trabajador actual
                        <br/>
                        <small>(Puede adjuntar la documentación desde <a class="text-success" href="{{ route('EmployeeAttachFiles', $employee->id) }}">Aquí</a>)</small>
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
                            <i class="fa fa-picture-o text-warning"></i> Certificado de Previsión
                        </div>
                    </div>
                </div>
                @if (count($employee->imageHealthCertificateEmployees) > 0)
                    @foreach($employee->imageHealthCertificateEmployees as $image_health_certificate)

                        <div class="col-md-4">
                            <div class="widget widget-shadow">
                                <figure class="widget-header overlay-hover overlay">
                                    <img class="overlay-figure overlay-scale" src="{{ Storage::disk('s3')->url($image_health_certificate->path) }}">
                                    <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                                        <a class="icon md-search" href="{{ Storage::disk('s3')->url($image_health_certificate->path) }}" data-plugin="magnificPopup"></a>
                                        {{ Form::open(array('route' => array('download.file'), 'method' => 'POST', 'id' => 'form-download', 'style' => 'display: inline')) }}
                                            <a class="icon md-download download-file" href="javascript:void(0)" data-id="{{ $image_health_certificate->path }}" data-name="{{ $image_health_certificate->orig_name }}"></a>
                                        {{ Form::close() }}
                                    </figcaption>
                                </figure>
                            </div>
                        </div>

                    @endforeach
                @else
                    <br/>
                    <h3 class="text-center text-warning">No existen Imágenes de Certificado de Previsión asociadas al Trabajador actual
                        <br/>
                        <small>(Puede adjuntar la documentación desde <a class="text-warning" href="{{ route('EmployeeAttachFiles', $employee->id) }}">Aquí</a>)</small>
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
                            <i class="fa fa-picture-o text-danger"></i> Certificado de AFP
                        </div>
                    </div>
                </div>
                @if (count($employee->imagePensionCertificateEmployees) > 0)
                    @foreach($employee->imagePensionCertificateEmployees as $image_pension_certificate)

                        <div class="col-md-4">
                            <div class="widget widget-shadow">
                                <figure class="widget-header overlay-hover overlay">
                                    <img class="overlay-figure overlay-scale" src="{{ Storage::disk('s3')->url($image_pension_certificate->path) }}">
                                    <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                                        <a class="icon md-search" href="{{ Storage::disk('s3')->url($image_pension_certificate->path) }}" data-plugin="magnificPopup"></a>
                                        {{ Form::open(array('route' => array('download.file'), 'method' => 'POST', 'id' => 'form-download', 'style' => 'display: inline')) }}
                                            <a class="icon md-download download-file" href="javascript:void(0)" data-id="{{ $image_pension_certificate->path }}" data-name="{{ $image_pension_certificate->orig_name }}"></a>
                                        {{ Form::close() }}
                                    </figcaption>
                                </figure>
                            </div>
                        </div>

                    @endforeach
                @else
                    <br/>
                    <h3 class="text-center text-danger">No existen Imágenes de Certificado de AFP asociadas al Trabajador actual
                        <br/>
                        <small>(Puede adjuntar la documentación desde <a class="text-danger" href="{{ route('EmployeeAttachFiles', $employee->id) }}">Aquí</a>)</small>
                    </h3>
                    <br/>
                    <br/>
                @endif
            </div>
        </div>
    </div>
</div>
@if ($employee->num_certifications > 0)
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-alt alert-info alert-dismissible" role="alert">
                                <i class="fa fa-picture-o text-info"></i> Certificaciones
                            </div>
                        </div>
                    </div>
                    @if($employee->imageCertificationEmployees->count() > 0)
                        @foreach($employee->imageCertificationEmployees as $image_certification)

                            <div class="col-md-4">
                                <div class="widget widget-shadow">
                                    <figure class="widget-header overlay-hover overlay">
                                        <img class="overlay-figure overlay-scale" src="{{ Storage::disk('s3')->url($image_certification->path) }}">
                                        <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                                            <a class="icon md-search" href="{{ Storage::disk('s3')->url($image_certification->path) }}" data-plugin="magnificPopup"></a>
                                            {{ Form::open(array('route' => array('download.file'), 'method' => 'POST', 'id' => 'form-download', 'style' => 'display: inline')) }}
                                                <a class="icon md-download download-file" href="javascript:void(0)" data-id="{{ $image_certification->path }}" data-name="{{ $image_certification->orig_name }}"></a>
                                            {{ Form::close() }}
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>

                        @endforeach
                    @else
                        <br/>
                        <h3 class="text-center text-info">No existen Imágenes de Certificaciones asociadas al Trabajador actual
                            <br/>
                            <small>(Puede adjuntar la documentación desde <a class="text-info" href="{{ route('EmployeeAttachFiles', $employee->id) }}">Aquí</a>)
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
                            <div class="alert alert-alt alert-success alert-dismissible" role="alert">
                                <i class="fa fa-picture-o text-success"></i> Especialidades
                            </div>
                        </div>
                    </div>
                    @if($employee->imageSpecialityEmployees->count() > 0)
                        @foreach($employee->imageSpecialityEmployees as $image_speciality)

                            <div class="col-md-4">
                                <div class="widget widget-shadow">
                                    <figure class="widget-header overlay-hover overlay">
                                        <img class="overlay-figure overlay-scale" src="{{ Storage::disk('s3')->url($image_speciality->path) }}">
                                        <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                                            <a class="icon md-search" href="{{ Storage::disk('s3')->url($image_speciality->path) }}" data-plugin="magnificPopup"></a>
                                            {{ Form::open(array('route' => array('download.file'), 'method' => 'POST', 'id' => 'form-download', 'style' => 'display: inline')) }}
                                                <a class="icon md-download download-file" href="javascript:void(0)" data-id="{{ $image_speciality->path }}" data-name="{{ $image_speciality->orig_name }}"></a>
                                            {{ Form::close() }}
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>

                        @endforeach
                    @else
                        <br/>
                        <h3 class="text-center text-success">No existen Imágenes de Especialidades asociadas al Trabajador actual
                            <br/>
                            <small>(Puede adjuntar la documentación desde <a class="text-success" href="{{ route('EmployeeAttachFiles', $employee->id) }}">Aquí</a>)
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
                            <div class="alert alert-alt alert-warning alert-dismissible" role="alert">
                                <i class="fa fa-picture-o text-warning"></i> Licencias Profesionales
                            </div>
                        </div>
                    </div>
                    @if ($employee->imageProfessionalLicenses->count() > 0)
                        @foreach($employee->imageProfessionalLicenses as $image_professional_license)

                            <div class="col-md-4">
                                <div class="widget widget-shadow">
                                    <figure class="widget-header overlay-hover overlay">
                                        <img class="overlay-figure overlay-scale" src="{{ Storage::disk('s3')->url($image_professional_license->path) }}">
                                        <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                                            <a class="icon md-search" href="{{ Storage::disk('s3')->url($image_professional_license->path) }}" data-plugin="magnificPopup"></a>
                                            {{ Form::open(array('route' => array('download.file'), 'method' => 'POST', 'id' => 'form-download', 'style' => 'display: inline')) }}
                                                <a class="icon md-download download-file" href="javascript:void(0)" data-id="{{ $image_professional_license->path }}" data-name="{{ $image_professional_license->orig_name }}"></a>
                                            {{ Form::close() }}
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>

                        @endforeach
                    @else
                        <br/>
                        <h3 class="text-center text-warning">No existen Imágenes de Licencia Profesional asociadas al Trabajador actual
                            <br/>
                            <small>(Puede adjuntar la documentación desde <a class="text-warning" href="{{ route('EmployeeAttachFiles', $employee->id) }}">Aquí</a>)
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
                            <div class="alert alert-alt alert-danger alert-dismissible" role="alert">
                                <i class="fa fa-picture-o text-danger"></i> Discapacidades
                            </div>
                        </div>
                    </div>
                    @if ($employee->imageDisabilityEmployees->count() > 0)
                        @foreach($employee->imageDisabilityEmployees as $image_disability)

                            <div class="col-md-4">
                                <div class="widget widget-shadow">
                                    <figure class="widget-header overlay-hover overlay">
                                        <img class="overlay-figure overlay-scale" src="{{ Storage::disk('s3')->url($image_disability->path) }}">
                                        <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                                            <a class="icon md-search" href="{{ Storage::disk('s3')->url($image_disability->path) }}" data-plugin="magnificPopup"></a>
                                            {{ Form::open(array('route' => array('download.file'), 'method' => 'POST', 'id' => 'form-download', 'style' => 'display: inline')) }}
                                                <a class="icon md-download download-file" href="javascript:void(0)" data-id="{{ $image_disability->path }}" data-name="{{ $image_disability->orig_name }}"></a>
                                            {{ Form::close() }}
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>

                        @endforeach
                    @else
                        <br/>
                        <h3 class="text-center text-danger">No existen Imágenes de Discapacidades asociadas al Trabajador actual
                            <br/>
                            <small>(Puede adjuntar la documentación desde <a class="text-danger" href="{{ route('EmployeeAttachFiles', $employee->id) }}">Aquí</a>)
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
                            <div class="alert alert-alt alert-info alert-dismissible" role="alert">
                                <i class="fa fa-picture-o text-info"></i> Enfermedades
                            </div>
                        </div>
                    </div>
                    @if ($employee->imageDiseaseEmployees->count() > 0)
                        @foreach($employee->imageDiseaseEmployees as $image_disease)

                            <div class="col-md-4">
                                <div class="widget widget-shadow">
                                    <figure class="widget-header overlay-hover overlay">
                                        <img class="overlay-figure overlay-scale" src="{{ Storage::disk('s3')->url($image_disease->path) }}">
                                        <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                                            <a class="icon md-search" href="{{ Storage::disk('s3')->url($image_disease->path) }}" data-plugin="magnificPopup"></a>
                                            {{ Form::open(array('route' => array('download.file'), 'method' => 'POST', 'id' => 'form-download', 'style' => 'display: inline')) }}
                                                <a class="icon md-download download-file" href="javascript:void(0)" data-id="{{ $image_disease->path }}" data-name="{{ $image_disease->orig_name }}"></a>
                                            {{ Form::close() }}
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>

                        @endforeach
                    @else
                        <br/>
                        <h3 class="text-center text-info">No existen Imágenes de Enfermedades asociadas al Trabajador actual
                            <br/>
                            <small>(Puede adjuntar la documentación desde <a class="text-info" href="{{ route('EmployeeAttachFiles', $employee->id) }}">Aquí</a>)
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
                            <div class="alert alert-alt alert-success alert-dismissible" role="alert">
                                <i class="fa fa-picture-o text-success"></i> Exámenes Preocupacionales
                            </div>
                        </div>
                    </div>
                    @if ($employee->imageExamEmployees->count() > 0)
                        @foreach($employee->imageExamEmployees as $image_exam)

                            <div class="col-md-4">
                                <div class="widget widget-shadow">
                                    <figure class="widget-header overlay-hover overlay">
                                        <img class="overlay-figure overlay-scale" src="{{ Storage::disk('s3')->url($image_exam->path) }}">
                                        <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                                            <a class="icon md-search" href="{{ Storage::disk('s3')->url($image_exam->path) }}" data-plugin="magnificPopup"></a>
                                            {{ Form::open(array('route' => array('download.file'), 'method' => 'POST', 'id' => 'form-download', 'style' => 'display: inline')) }}
                                                <a class="icon md-download download-file" href="javascript:void(0)" data-id="{{ $image_exam->path }}" data-name="{{ $image_exam->orig_name }}"></a>
                                            {{ Form::close() }}
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>

                        @endforeach
                    @else
                        <br/>
                        <h3 class="text-center text-success">No existen Imágenes de Examen Preocupacional asociadas al Trabajador actual
                            <br/>
                            <small>(Puede adjuntar la documentación desde <a class="text-success" href="{{ route('EmployeeAttachFiles', $employee->id) }}">Aquí</a>)
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
                            <div class="alert alert-alt alert-warning alert-dismissible" role="alert">
                                <i class="fa fa-picture-o text-warning"></i> Cargas Familiares
                            </div>
                        </div>
                    </div>
                    @if ($employee->imageFamilyResponsabilityEmployees->count() > 0)
                        @foreach($employee->imageFamilyResponsabilityEmployees as $image_family_responsability)

                            <div class="col-md-4">
                                <div class="widget widget-shadow">
                                    <figure class="widget-header overlay-hover overlay">
                                        <img class="overlay-figure overlay-scale" src="{{ Storage::disk('s3')->url($image_family_responsability->path) }}">
                                        <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                                            <a class="icon md-search" href="{{ Storage::disk('s3')->url($image_family_responsability->path) }}" data-plugin="magnificPopup"></a>
                                            {{ Form::open(array('route' => array('download.file'), 'method' => 'POST', 'id' => 'form-download', 'style' => 'display: inline')) }}
                                                <a class="icon md-download download-file" href="javascript:void(0)" data-id="{{ $image_family_responsability->path }}" data-name="{{ $image_family_responsability->orig_name }}"></a>
                                            {{ Form::close() }}
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>

                        @endforeach
                    @else
                        <br/>
                        <h3 class="text-center text-warning">No existen Imágenes de Carga Familiar asociadas al Trabajador actual
                            <br/>
                            <small>(Puede adjuntar la documentación desde <a class="text-warning" href="{{ route('EmployeeAttachFiles', $employee->id) }}">Aquí</a>)
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