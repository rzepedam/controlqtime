@extends('layout.index')

@section('title_header') Adjuntar Documentos a Trabajador: <span class="text-primary">{{ $id }}</span> @stop

@section('css')

    <link rel="stylesheet" href="{{ elixir('css/upload-common.css') }}">

@stop

@section('breadcumb')
    <li><a href="{{ route('human-resources') }}"><i class="fa fa-street-view"></i> Recursos Humanos</a></li>
    <li><a href="{{ route('employees.index') }}"><i class="md-accounts font-size-16"></i> Trabajadores</a></li>
    <li class="active">Subir Archivos</li>
@stop

@section('content')

    @include('human-resources.employees.partials.upload.identityCard')

    @include('human-resources.employees.partials.upload.criminalRecord')

    @include('human-resources.employees.partials.upload.healthCertificate')

    @include('human-resources.employees.partials.upload.pensionCertificate')

    @include('human-resources.employees.partials.upload.certifications')

    @include('human-resources.employees.partials.upload.specialities')

    @include('human-resources.employees.partials.upload.professional_licenses')

    @include('human-resources.employees.partials.upload.disabilities')

    @include('human-resources.employees.partials.upload.diseases')

    @include('human-resources.employees.partials.upload.exams')

    @include('human-resources.employees.partials.upload.family_responsabilities')

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('employees.index') }}">Volver</a>
        </div>
    </div>

@stop

@section('scripts')

    <script src="{{ elixir('js/upload-common.js') }}"></script>

    <script type="text/javascript">

        $(document).ready(function() {

            /*
             *  Identity Card
             */
            $("#identityCard").fileinput({
                initialPreview: [
                    @foreach($employee->images_identity_card as $image_identity_card)
                        "<img style='height:160px' src='{{ Storage::disk('s3')->url($image_identity_card->path) }}' />",
                    @endforeach
                ],
                initialPreviewConfig: [
                    @foreach($employee->images_identity_card as $image_identity_card)
                        { caption: "{{ $image_identity_card->orig_name }}", size: "{{ $image_identity_card->size }}", url: "{{ route('EmployeeDeleteFiles') }}", key: "{{ $image_identity_card->id }}", extra: { path: "{{ $image_identity_card->path }}", id: "{{ $id }}", type: "Employee" } },
                    @endforeach
                ],
                uploadUrl: "{{ route('EmployeeAddImages') }}",
                uploadExtraData:  {
                    employee_id: "{{ $id }}",
                    repo_id: '',
                    type: "Employee",
                    subClass: "IdentityCard/"
                }
            });

            /*
             *  Criminal Record
             */
            $("#criminalRecord").fileinput({
                initialPreview: [
                    @foreach($employee->images_criminal_record as $image_criminal_record)
                        "<img style='height:160px' src='{{ Storage::disk('s3')->url($image_criminal_record->path) }}' />",
                    @endforeach
                ],
                initialPreviewConfig: [
                    @foreach($employee->images_criminal_record as $image_criminal_record)
                      { caption: "{{ $image_criminal_record->orig_name }}", size: "{{ $image_criminal_record->size }}", url: "{{ route('EmployeeDeleteFiles') }}", key: "{{ $image_criminal_record->id }}", extra: { path: "{{ $image_criminal_record->path }}", id: "{{ $id }}", type: "Employee" } },
                    @endforeach
                ],
                uploadUrl: "{{ route('EmployeeAddImages') }}",
                uploadExtraData:  {
                    employee_id: "{{ $id }}",
                    repo_id: '',
                    type: "Employee",
                    subClass: "CriminalRecord/"
                }
            });

            /*
             *  Health Certificate
             */
            $("#healthCertificate").fileinput({
                initialPreview: [
                    @foreach($employee->images_health_certificate as $images_health_certificate)
                        "<img style='height:160px' src='{{ Storage::disk('s3')->url($images_health_certificate->path) }}' />",
                    @endforeach
                ],
                initialPreviewConfig: [
                    @foreach($employee->images_health_certificate as $images_health_certificate)
                        { caption: "{{ $images_health_certificate->orig_name }}", size: "{{ $images_health_certificate->size }}", url: "{{ route('EmployeeDeleteFiles') }}", key: "{{ $images_health_certificate->id }}", extra: { path: "{{ $images_health_certificate->path }}", id: "{{ $id }}", type: "Employee" } },
                    @endforeach
                ],
                uploadUrl: "{{ route('EmployeeAddImages') }}",
                uploadExtraData:  {
                    employee_id: "{{ $id }}",
                    repo_id: '',
                    type: "Employee",
                    subClass: "HealthCertificate/"
                }
            });

            /*
             *  Pension Certificate
             */
            $("#pensionCertificate").fileinput({
                initialPreview: [
                    @foreach($employee->images_pension_certificate as $images_pension_certificate)
                        "<img style='height:160px' src='{{ Storage::disk('s3')->url($images_pension_certificate->path) }}' />",
                    @endforeach
                ],
                initialPreviewConfig: [
                    @foreach($employee->images_pension_certificate as $images_pension_certificate)
                        { caption: "{{ $images_pension_certificate->orig_name }}", size: "{{ $images_pension_certificate->size }}", url: "{{ route('EmployeeDeleteFiles') }}", key: "{{ $images_pension_certificate->id }}", extra: { path: "{{ $images_pension_certificate->path }}", id: "{{ $id }}", type: "Employee" } },
                    @endforeach
                ],
                uploadUrl: "{{ route('EmployeeAddImages') }}",
                uploadExtraData:  {
                    employee_id: "{{ $id }}",
                    repo_id: '',
                    type: "Employee",
                    subClass: "PensionCertificate/"
                }
            });

            /**
             *  Certifications
             */
            <?php $i = 0 ?>
            @foreach($employee->certifications as $certification)
                $("#certification{{ $i }}").fileinput({
                    initialPreview: [
                        @foreach($certification->imageable as $image_certification)
                            "<img style='height:160px' src='{{ Storage::disk('s3')->url($image_certification->path) }}' />",
                        @endforeach
                    ],
                    initialPreviewConfig: [
                        @foreach($certification->imageable as $image_certification)
                            { caption: "{{ $image_certification->orig_name }}", size: "{{ $image_certification->size }}", url: "{{ route('EmployeeDeleteFiles') }}", key: "{{ $image_certification->id }}", extra: { path: "{{ $image_certification->path }}", id: "{{ $id }}", type: "Certification" } },
                        @endforeach
                    ],
                    uploadUrl: "{{ route('EmployeeAddImages') }}",
                    uploadExtraData:  {
                        employee_id: "{{ $id }}",
                        repo_id: "{{ $certification->id }}",
                        type: "Certification"
                    }
                });
                <?php $i++; ?>
            @endforeach

            /**
             *  Specialities
             */
            <?php $i = 0 ?>
            @foreach($employee->specialities as $speciality)
                $("#speciality{{ $i }}").fileinput({
                    initialPreview: [
                        @foreach($speciality->imageable as $image_speciality)
                            "<img style='height:160px' src='{{ Storage::disk('s3')->url($image_speciality->path) }}' />",
                        @endforeach
                    ],
                    initialPreviewConfig: [
                        @foreach($speciality->imageable as $image_speciality)
                            { caption: "{{ $image_speciality->orig_name }}", size: "{{ $image_speciality->size }}", url: "{{ route('EmployeeDeleteFiles') }}", key: "{{ $image_speciality->id }}", extra: { path: "{{ $image_speciality->path }}", id: "{{ $id }}", type: "Speciality" } },
                        @endforeach
                    ],
                    uploadUrl: "{{ route('EmployeeAddImages') }}",
                    uploadExtraData:  {
                        employee_id: "{{ $id }}",
                        repo_id: "{{ $speciality->id }}",
                        type: "Speciality"
                    }
                });
                <?php $i++; ?>
            @endforeach

            /**
             *  Professional Licenses
             */
            <?php $i = 0 ?>
            @foreach($employee->professionalLicenses as $professional_license)
                $("#professional_license{{ $i }}").fileinput({
                    initialPreview: [
                        @foreach($professional_license->imageable as $image_professional_license)
                            "<img style='height:160px' src='{{ Storage::disk('s3')->url($image_professional_license->path) }}' />",
                        @endforeach
                    ],
                    initialPreviewConfig: [
                        @foreach($professional_license->imageable as $image_professional_license)
                            { caption: "{{ $image_professional_license->orig_name }}", size: "{{ $image_professional_license->size }}", url: "{{ route('EmployeeDeleteFiles') }}", key: "{{ $image_professional_license->id }}", extra: { path: "{{ $image_professional_license->path }}", id: "{{ $id }}", type: "ProfessionalLicense" } },
                        @endforeach
                    ],
                    uploadUrl: "{{ route('EmployeeAddImages') }}",
                    uploadExtraData:  {
                        employee_id: "{{ $id }}",
                        repo_id: "{{ $professional_license->id }}",
                        type: "ProfessionalLicense"
                    }
                });
                <?php $i++; ?>
            @endforeach

            /**
             *  Disabilities
             */
            <?php $i = 0 ?>
            @foreach($employee->disabilities as $disability)
                $("#disability{{ $i }}").fileinput({
                    initialPreview: [
                        @foreach($disability->imageable as $image_disability)
                            "<img style='height:160px' src='{{ Storage::disk('s3')->url($image_disability->path) }}' />",
                        @endforeach
                    ],
                    initialPreviewConfig: [
                        @foreach($disability->imageable as $image_disability)
                            { caption: "{{ $image_disability->orig_name }}", size: "{{ $image_disability->size }}", url: "{{ route('EmployeeDeleteFiles') }}", key: "{{ $image_disability->id }}", extra: { path: "{{ $image_disability->path }}", id: "{{ $id }}", type: "Disability" } },
                        @endforeach
                    ],
                    uploadUrl: "{{ route('EmployeeAddImages') }}",
                    uploadExtraData:  {
                        employee_id: "{{ $id }}",
                        repo_id: "{{ $disability->id }}",
                        type: "Disability"
                    }
                });
                <?php $i++; ?>
            @endforeach

            /**
             *  Diseases
             */
            <?php $i = 0 ?>
            @foreach($employee->diseases as $disease)
                $("#disease{{ $i }}").fileinput({
                    initialPreview: [
                        @foreach($disease->imageable as $image_disease)
                            "<img style='height:160px' src='{{ Storage::disk('s3')->url($image_disease->path) }}' />",
                        @endforeach
                    ],
                    initialPreviewConfig: [
                        @foreach($disease->imageable as $image_disease)
                            { caption: "{{ $image_disease->orig_name }}", size: "{{ $image_disease->size }}", url: "{{ route('EmployeeDeleteFiles') }}", key: "{{ $image_disease->id }}", extra: { path: "{{ $image_disease->path }}", id: "{{ $id }}", type: "Disease" } },
                        @endforeach
                    ],
                    uploadUrl: "{{ route('EmployeeAddImages') }}",
                    uploadExtraData:  {
                        employee_id: "{{ $id }}",
                        repo_id: "{{ $disease->id }}",
                        type: "Disease"
                    }
                });
                <?php $i++; ?>
            @endforeach

            /**
             *  Exámenes Preocupacionales
             */
            <?php $i = 0 ?>
            @foreach($employee->exams as $exam)
                $("#exam{{ $i }}").fileinput({
                    initialPreview: [
                        @foreach($exam->imageable as $image_exam)
                            "<img style='height:160px' src='{{ Storage::disk('s3')->url($image_exam->path) }}' />",
                        @endforeach
                    ],
                    initialPreviewConfig: [
                        @foreach($exam->imageable as $image_exam)
                            { caption: "{{ $image_exam->orig_name }}", size: "{{ $image_exam->size }}", url: "{{ route('EmployeeDeleteFiles') }}", key: "{{ $image_exam->id }}", extra: { path: "{{ $image_exam->path }}", id: "{{ $id }}", type: "Exam" } },
                        @endforeach
                    ],
                    uploadUrl: "{{ route('EmployeeAddImages') }}",
                    uploadExtraData:  {
                        employee_id: "{{ $id }}",
                        repo_id: "{{ $exam->id }}",
                        type: "Exam"
                    }
                });
                <?php $i++; ?>
            @endforeach

            /**
             *  Cargas Familiares
             */
            <?php $i = 0 ?>
            @foreach($employee->familyResponsabilities as $family_responsability)
                $("#family_responsability{{ $i }}").fileinput({
                    initialPreview: [
                        @foreach($family_responsability->imageable as $image_family_responsability)
                            "<img style='height:160px' src='{{ Storage::disk('s3')->url($image_family_responsability->path) }}' />",
                        @endforeach
                    ],
                    initialPreviewConfig: [
                        @foreach($family_responsability->imageable as $image_family_responsability)
                            { caption: "{{ $image_family_responsability->orig_name }}", size: "{{ $image_family_responsability->size }}", url: "{{ route('EmployeeDeleteFiles') }}", key: "{{ $image_family_responsability->id }}", extra: { path: "{{ $image_family_responsability->path }}", id: "{{ $id }}", type: "FamilyResponsability" } },
                        @endforeach
                    ],
                    uploadUrl: "{{ route('EmployeeAddImages') }}",
                    uploadExtraData:  {
                        employee_id: "{{ $id }}",
                        repo_id: "{{ $family_responsability->id }}",
                        type: "FamilyResponsability"
                    }
                });
                <?php $i++; ?>
            @endforeach
        });

    </script>

@stop