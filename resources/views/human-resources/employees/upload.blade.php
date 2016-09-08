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
                    @foreach($employee->imageIdentityCardEmployees as $image_identity_card)
                            "<img style='height:160px' src='{{ Storage::disk('s3')->url($image_identity_card->path) }}' />",
                    @endforeach
                ],
                initialPreviewConfig: [
                    @foreach($employee->imageIdentityCardEmployees as $image_identity_card)
                        { caption: "{{ $image_identity_card->orig_name }}", size: "{{ $image_identity_card->size }}", url: "{{ route('EmployeeDeleteFiles') }}", key: "{{ $image_identity_card->id }}", extra: { path: "{{ $image_identity_card->path }}", id: "{{ $id }}", type: "IdentityCardEmployee" } },
                    @endforeach
                ],
                uploadUrl: "{{ route('EmployeeAddImages') }}",
                uploadExtraData:  {
                    employee_id: "{{ $id }}",
                    repo_id: '',
                    type: "IdentityCardEmployee"
                }
            });

            /*
             *  Criminal Record
             */

            $("#criminalRecord").fileinput({
                initialPreview: [
                    @foreach($employee->imageCriminalRecordEmployees as $image_criminal_record)
                            "<img style='height:160px' src='{{ Storage::disk('s3')->url($image_criminal_record->path) }}' />",
                    @endforeach
                ],
                initialPreviewConfig: [
                    @foreach($employee->imageCriminalRecordEmployees as $image_criminal_record)
                        { caption: "{{ $image_criminal_record->orig_name }}", size: "{{ $image_criminal_record->size }}", url: "{{ route('EmployeeDeleteFiles') }}", key: "{{ $image_criminal_record->id }}", extra: { path: "{{ $image_criminal_record->path }}", id: "{{ $id }}", type: "CriminalRecordEmployee" } },
                    @endforeach
                ],
                uploadUrl: "{{ route('EmployeeAddImages') }}",
                uploadExtraData:  {
                    employee_id: "{{ $id }}",
                    repo_id: '',
                    type: "CriminalRecordEmployee"
                }
            });

            /*
             *  Health Certificate
             */

            $("#healthCertificate").fileinput({
                initialPreview: [
                    @foreach($employee->imageHealthCertificateEmployees as $image_health_certificate)
                            "<img style='height:160px' src='{{ Storage::disk('s3')->url($image_health_certificate->path) }}' />",
                    @endforeach
                ],
                initialPreviewConfig: [
                    @foreach($employee->imageHealthCertificateEmployees as $image_health_certificate)
                        { caption: "{{ $image_health_certificate->orig_name }}", size: "{{ $image_health_certificate->size }}", url: "{{ route('EmployeeDeleteFiles') }}", key: "{{ $image_health_certificate->id }}", extra: { path: "{{ $image_health_certificate->path }}", id: "{{ $id }}", type: "HealthCertificateEmployee" } },
                    @endforeach
                ],
                uploadUrl: "{{ route('EmployeeAddImages') }}",
                uploadExtraData:  {
                    employee_id: "{{ $id }}",
                    repo_id: '',
                    type: "HealthCertificateEmployee"
                }
            });

            /*
             *  Pension Certificate
             */

            $("#pensionCertificate").fileinput({
                initialPreview: [
                    @foreach($employee->imagePensionCertificateEmployees as $image_pension_certificate)
                            "<img style='height:160px' src='{{ Storage::disk('s3')->url($image_pension_certificate->path) }}' />",
                    @endforeach
                ],
                initialPreviewConfig: [
                        @foreach($employee->imagePensionCertificateEmployees as $image_pension_certificate)
                    { caption: "{{ $image_pension_certificate->orig_name }}", size: "{{ $image_pension_certificate->size }}", url: "{{ route('EmployeeDeleteFiles') }}", key: "{{ $image_pension_certificate->id }}", extra: { path: "{{ $image_pension_certificate->path }}", id: "{{ $id }}", type: "PensionCertificateEmployee" } },
                    @endforeach
                ],
                uploadUrl: "{{ route('EmployeeAddImages') }}",
                uploadExtraData:  {
                    employee_id: "{{ $id }}",
                    repo_id: '',
                    type: "PensionCertificateEmployee"
                }
            });

            /**
             *  Certifications
             */

            <?php $i = 0 ?>
            @foreach($employee->certifications as $certification)
                $("#certification{{ $i }}").fileinput({
                    initialPreview: [
                        @foreach($certification->imageCertificationEmployees as $image_certification)
                            "<img style='height:160px' src='{{ Storage::disk('s3')->url($image_certification->path) }}' />",
                        @endforeach
                    ],
                    initialPreviewConfig: [
                        @foreach($certification->imageCertificationEmployees as $image_certification)
                            { caption: "{{ $image_certification->orig_name }}", size: "{{ $image_certification->size }}", url: "{{ route('EmployeeDeleteFiles') }}", key: "{{ $image_certification->id }}", extra: { path: "{{ $image_certification->path }}", id: "{{ $id }}", type: "CertificationEmployee" } },
                        @endforeach
                    ],
                    uploadUrl: "{{ route('EmployeeAddImages') }}",
                    uploadExtraData:  {
                        employee_id: "{{ $id }}",
                        repo_id: "{{ $certification->id }}",
                        type: "CertificationEmployee"
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
                        @foreach($speciality->imageSpecialityEmployees as $image_speciality)
                            "<img style='height:160px' src='{{ Storage::disk('s3')->url($image_speciality->path) }}' />",
                        @endforeach
                    ],
                    initialPreviewConfig: [
                        @foreach($speciality->imageSpecialityEmployees as $image_speciality)
                            { caption: "{{ $image_speciality->orig_name }}", size: "{{ $image_speciality->size }}", url: "{{ route('EmployeeDeleteFiles') }}", key: "{{ $image_speciality->id }}", extra: { path: "{{ $image_speciality->path }}", id: "{{ $id }}", type: "SpecialityEmployee" } },
                        @endforeach
                    ],
                    uploadUrl: "{{ route('EmployeeAddImages') }}",
                    uploadExtraData:  {
                        employee_id: "{{ $id }}",
                        repo_id: "{{ $speciality->id }}",
                        type: "SpecialityEmployee"
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
                        @foreach($professional_license->imageProfessionalLicenseEmployees as $image_professional_license)
                            "<img style='height:160px' src='{{ Storage::disk('s3')->url($image_professional_license->path) }}' />",
                        @endforeach
                    ],
                    initialPreviewConfig: [
                        @foreach($professional_license->imageProfessionalLicenseEmployees as $image_professional_license)
                            { caption: "{{ $image_professional_license->orig_name }}", size: "{{ $image_professional_license->size }}", url: "{{ route('EmployeeDeleteFiles') }}", key: "{{ $image_professional_license->id }}", extra: { path: "{{ $image_professional_license->path }}", id: "{{ $id }}", type: "ProfessionalLicenseEmployee" } },
                        @endforeach
                    ],
                    uploadUrl: "{{ route('EmployeeAddImages') }}",
                    uploadExtraData:  {
                        employee_id: "{{ $id }}",
                        repo_id: "{{ $professional_license->id }}",
                        type: "ProfessionalLicenseEmployee"
                    }
                });
                <?php $i++; ?>
            @endforeach

            /**
             *  Discapacidades
             */

            <?php $i = 0 ?>
            @foreach($employee->disabilities as $disability)
                $("#disability{{ $i }}").fileinput({
                    initialPreview: [
                        @foreach($disability->imageDisabilityEmployees as $image_disability)
                            "<img style='height:160px' src='{{ Storage::disk('s3')->url($image_disability->path) }}' />",
                        @endforeach
                    ],
                    initialPreviewConfig: [
                        @foreach($disability->imageDisabilityEmployees as $image_disability)
                            { caption: "{{ $image_disability->orig_name }}", size: "{{ $image_disability->size }}", url: "{{ route('EmployeeDeleteFiles') }}", key: "{{ $image_disability->id }}", extra: { path: "{{ $image_disability->path }}", id: "{{ $id }}", type: "DisabilityEmployee" } },
                        @endforeach
                    ],
                    uploadUrl: "{{ route('EmployeeAddImages') }}",
                    uploadExtraData:  {
                        employee_id: "{{ $id }}",
                        repo_id: "{{ $disability->id }}",
                        type: "DisabilityEmployee"
                    }
                });
                <?php $i++; ?>
            @endforeach

            /**
             *  Enfermedades
             */

            <?php $i = 0 ?>
            @foreach($employee->diseases as $disease)
                $("#disease{{ $i }}").fileinput({
                    initialPreview: [
                        @foreach($disease->imageDiseaseEmployees as $image_disease)
                            "<img style='height:160px' src='{{ Storage::disk('s3')->url($image_disease->path) }}' />",
                        @endforeach
                    ],
                    initialPreviewConfig: [
                        @foreach($disease->imageDiseaseEmployees as $image_disease)
                            { caption: "{{ $image_disease->orig_name }}", size: "{{ $image_disease->size }}", url: "{{ route('EmployeeDeleteFiles') }}", key: "{{ $image_disease->id }}", extra: { path: "{{ $image_disease->path }}", id: "{{ $id }}", type: "DiseaseEmployee" } },
                        @endforeach
                    ],
                    uploadUrl: "{{ route('EmployeeAddImages') }}",
                    uploadExtraData:  {
                        employee_id: "{{ $id }}",
                        repo_id: "{{ $disease->id }}",
                        type: "DiseaseEmployee"
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
                        @foreach($exam->imageExamEmployees as $image_exam)
                            "<img style='height:160px' src='{{ Storage::disk('s3')->url($image_exam->path) }}' />",
                        @endforeach
                    ],
                    initialPreviewConfig: [
                        @foreach($exam->imageExamEmployees as $image_exam)
                            { caption: "{{ $image_exam->orig_name }}", size: "{{ $image_exam->size }}", url: "{{ route('EmployeeDeleteFiles') }}", key: "{{ $image_exam->id }}", extra: { path: "{{ $image_exam->path }}", id: "{{ $id }}", type: "ExamEmployee" } },
                        @endforeach
                    ],
                    uploadUrl: "{{ route('EmployeeAddImages') }}",
                    uploadExtraData:  {
                        employee_id: "{{ $id }}",
                        repo_id: "{{ $exam->id }}",
                        type: "ExamEmployee"
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
                        @foreach($family_responsability->imageFamilyResponsabilityEmployees as $image_family_responsability)
                            "<img style='height:160px' src='{{ Storage::disk('s3')->url($image_family_responsability->path) }}' />",
                        @endforeach
                    ],
                    initialPreviewConfig: [
                        @foreach($family_responsability->imageFamilyResponsabilityEmployees as $image_family_responsability)
                            { caption: "{{ $image_family_responsability->orig_name }}", size: "{{ $image_family_responsability->size }}", url: "{{ route('EmployeeDeleteFiles') }}", key: "{{ $image_family_responsability->id }}", extra: { path: "{{ $image_family_responsability->path }}", id: "{{ $id }}", type: "FamilyResponsabilityEmployee" } },
                        @endforeach
                    ],
                    uploadUrl: "{{ route('EmployeeAddImages') }}",
                    uploadExtraData:  {
                        employee_id: "{{ $id }}",
                        repo_id: "{{ $family_responsability->id }}",
                        type: "FamilyResponsabilityEmployee"
                    }
                });
                <?php $i++; ?>
            @endforeach

        });

    </script>

@stop