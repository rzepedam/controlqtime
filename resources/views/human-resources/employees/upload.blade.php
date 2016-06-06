@extends('layout.index')

@section('title_header') Adjuntar imágenes a Trabajador: <span class="text-primary">{{ $id }}</span> @stop

@section('css')

    {{ Html::style('assets/css/fileinput.css') }}

@stop

@section('breadcumb')
    <li><a href="{{ route('human-resources') }}"><i class="fa fa-street-view"></i> Recursos Humanos</a></li>
    <li><a href="{{ route('human-resources.employees.index') }}"><i class="md-accounts font-size-16"></i> Trabajadores</a></li>
    <li class="active">Subir Archivos</li>
@stop

@section('content')

    @if ($employee->num_certifications + $employee->num_disabilities + $employee->num_diseases +
        $employee->num_exams + $employee->num_family_responsabilities +
        $employee->num_professional_licenses + $employee->num_specialities)

        @include('human-resources.employees.partials.upload.certifications')

        @include('human-resources.employees.partials.upload.specialities')

        @include('human-resources.employees.partials.upload.professional_licenses')

        @include('human-resources.employees.partials.upload.disabilities')

        @include('human-resources.employees.partials.upload.diseases')

        @include('human-resources.employees.partials.upload.exams')

        @include('human-resources.employees.partials.upload.family_responsabilities')

    @else
        <div class="panel panel-bordered">
            <div class="panel-body">
                <br/>
                <h3 class="text-center text-success">
                    No existen elementos asociados para adjuntar imágenes
                    <br/>
                    <small>(Pulse <a href="{{ route('human-resources.employees.edit', $employee->id) }}" class="text-success">Aquí</a>  para comenzar su adición)
                    </small>
                </h3>
                <br/>
                <br/>
            </div>
        </div>

    @endif

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('human-resources.employees.index') }}">Volver</a>
        </div>
    </div>

@stop

@section('scripts')

    {{ Html::script('assets/js/fileinput.js') }}
    {{ Html::script('assets/js/config.js') }}

    <script>

        $(document).ready(function() {

            /**
             *  Certifications
             */

            <?php $i = 0 ?>
            @foreach($employee->certifications as $certification)
                $("#certification{{ $i }}").fileinput({
                    initialPreview: [
                        @foreach($certification->imageCertificationEmployees as $image_certification)
                            "<img style='height:160px' src='{{ $image_certification->path }}' />",
                        @endforeach
                    ],
                    initialPreviewConfig: [
                        @foreach($certification->imageCertificationEmployees as $image_certification)
                            { caption: "{{ $image_certification->orig_name }}", size: "{{ $image_certification->size }}", url: "{{ route('human-resources.employees.deleteFiles') }}", key: "{{ $image_certification->id }}", extra: { path: "{{ $image_certification->path }}", id: "{{ $id }}", type: "certification" } },
                        @endforeach
                    ],
                    overwriteInitial: false,
                    uploadUrl: "{{ route('human-resources.employees.addImages') }}",
                    uploadExtraData:  {
                        id: "{{ $id }}",
                        subRepoId: "{{ $certification->id }}",
                        type: "certification"
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
                            "<img style='height:160px' src='{{ $image_speciality->path }}' />",
                        @endforeach
                    ],
                    initialPreviewConfig: [
                        @foreach($speciality->imageSpecialityEmployees as $image_speciality)
                            { caption: "{{ $image_speciality->orig_name }}", size: "{{ $image_speciality->size }}", url: "{{ route('human-resources.employees.deleteFiles') }}", key: "{{ $image_speciality->id }}", extra: { path: "{{ $image_speciality->path }}", id: "{{ $id }}", type: "speciality" } },
                        @endforeach
                    ],
                    overwriteInitial: false,
                    uploadUrl: "{{ route('human-resources.employees.addImages') }}",
                    uploadExtraData:  {
                        id: "{{ $id }}",
                        subRepoId: "{{ $speciality->id }}",
                        type: "speciality"
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
                            "<img style='height:160px' src='{{ $image_professional_license->path }}' />",
                        @endforeach
                    ],
                    initialPreviewConfig: [
                        @foreach($professional_license->imageProfessionalLicenseEmployees as $image_professional_license)
                            { caption: "{{ $image_professional_license->orig_name }}", size: "{{ $image_professional_license->size }}", url: "{{ route('human-resources.employees.deleteFiles') }}", key: "{{ $image_professional_license->id }}", extra: { path: "{{ $image_professional_license->path }}", id: "{{ $id }}", type: "professional_license" } },
                        @endforeach
                    ],
                    overwriteInitial: false,
                    uploadUrl: "{{ route('human-resources.employees.addImages') }}",
                    uploadExtraData:  {
                        id: "{{ $id }}",
                        subRepoId: "{{ $professional_license->id }}",
                        type: "professional_license"
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
                            "<img style='height:160px' src='{{ $image_disability->path }}' />",
                        @endforeach
                    ],
                    initialPreviewConfig: [
                        @foreach($disability->imageDisabilityEmployees as $image_disability)
                            { caption: "{{ $image_disability->orig_name }}", size: "{{ $image_disability->size }}", url: "{{ route('human-resources.employees.deleteFiles') }}", key: "{{ $image_disability->id }}", extra: { path: "{{ $image_disability->path }}", id: "{{ $id }}", type: "disability" } },
                        @endforeach
                    ],
                    overwriteInitial: false,
                    uploadUrl: "{{ route('human-resources.employees.addImages') }}",
                    uploadExtraData:  {
                        id: "{{ $id }}",
                        subRepoId: "{{ $disability->id }}",
                        type: "disability"
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
                            "<img style='height:160px' src='{{ $image_disease->path }}' />",
                        @endforeach
                    ],
                    initialPreviewConfig: [
                        @foreach($disease->imageDiseaseEmployees as $image_disease)
                            { caption: "{{ $image_disease->orig_name }}", size: "{{ $image_disease->size }}", url: "{{ route('human-resources.employees.deleteFiles') }}", key: "{{ $image_disease->id }}", extra: { path: "{{ $image_disease->path }}", id: "{{ $id }}", type: "disease" } },
                        @endforeach
                    ],
                    overwriteInitial: false,
                    uploadUrl: "{{ route('human-resources.employees.addImages') }}",
                    uploadExtraData:  {
                        id: "{{ $id }}",
                        subRepoId: "{{ $disease->id }}",
                        type: "disease"
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
                            "<img style='height:160px' src='{{ $image_exam->path }}' />",
                        @endforeach
                    ],
                    initialPreviewConfig: [
                        @foreach($exam->imageExamEmployees as $image_exam)
                            { caption: "{{ $image_exam->orig_name }}", size: "{{ $image_exam->size }}", url: "{{ route('human-resources.employees.deleteFiles') }}", key: "{{ $image_exam->id }}", extra: { path: "{{ $image_exam->path }}", id: "{{ $id }}", type: "exam" } },
                        @endforeach
                    ],
                    overwriteInitial: false,
                    uploadUrl: "{{ route('human-resources.employees.addImages') }}",
                    uploadExtraData:  {
                        id: "{{ $id }}",
                        subRepoId: "{{ $exam->id }}",
                        type: "exam"
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
                            "<img style='height:160px' src='{{ $image_family_responsability->path }}' />",
                        @endforeach
                    ],
                    initialPreviewConfig: [
                        @foreach($family_responsability->imageFamilyResponsabilityEmployees as $image_family_responsability)
                            { caption: "{{ $image_family_responsability->orig_name }}", size: "{{ $image_family_responsability->size }}", url: "{{ route('human-resources.employees.deleteFiles') }}", key: "{{ $image_family_responsability->id }}", extra: { path: "{{ $image_family_responsability->path }}", id: "{{ $id }}", type: "family_responsability" } },
                        @endforeach
                    ],
                    overwriteInitial: false,
                    uploadUrl: "{{ route('human-resources.employees.addImages') }}",
                    uploadExtraData:  {
                        id: "{{ $id }}",
                        subRepoId: "{{ $family_responsability->id }}",
                        type: "family_responsability"
                    }
                });
                <?php $i++; ?>
            @endforeach


        });

    </script>

@stop