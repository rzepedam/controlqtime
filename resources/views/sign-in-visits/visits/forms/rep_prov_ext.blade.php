<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="CQTime - Where questions find answers">
    <meta name="author" content="Raúl Elías Meza Mora">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>ControlQTime</title>
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ mix('css/index-layout-core.css') }}">
    <!-- Plugins -->
    <link rel="stylesheet" href="{{ mix('css/index-layout-plugin.css') }}">
    <!-- Fonts -->
    <link rel="stylesheet" href="{{ mix('css/index-layout-fonts.css') }}">
    <!-- Style Owned -->
    <link rel="stylesheet" href="{{ mix('css/style.css') }}">
    <link rel="stylesheet" href="{{ mix('css/upload-common.css') }}">
    <style>
        body {
            padding-top: 0px;
        }

    </style>
    <!-- Script Default Laravel -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <!-- Browsers Utilities -->
    <script src="{{ mix('js/index-layout-browser-utilities.js') }}"></script>
    <script>
        Breakpoints();
    </script>
</head>
<body>
<div id="app">
    {{-- Content --}}
    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title">
                Formulario Solicitud Visita
            </h1>
        </div>
        <div class="page-content">

            @include('layout.messages.errors-js')

            <div class="panel panel-bordered">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-pencil-square-o text-primary"></i> Información Personal
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <strong>#</strong> Documento que acredite filiación con su empresa
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    <br/>
                                    <input id="company" type="file" class="file-loading" multiple>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <strong>#</strong> Visa o permiso de trabajo
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    <br/>
                                    <input id="visa" type="file" class="file-loading" multiple>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <strong>#</strong> Copia de póliza de salud o declaración de plan adscrito a
                                        Isapre
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    <br/>
                                    <input id="forecast" type="file" class="file-loading" multiple>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <strong>#</strong> Copia de póliza de seguro de vida/accidente a todo evento
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    <br/>
                                    <input id="insurrance" type="file" class="file-loading" multiple>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-bordered">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-files-o text-success"></i> Certificado DAS
                    </h3>
                </div>
                <div class="panel-body">

                    @if ( is_null( $visit->formVisit ) )
                        {{ Form::open(['route' => 'form-visits.store', 'method' => 'POST', 'id' => 'form-submit']) }}
                        {{ Form::hidden('id', $visit->id) }}
                    @else
                        {{ Form::model($visit, ['route' => ['form-visits.update', $visit], 'method' => 'PUT', 'id' => 'form-submit']) }}
                    @endif

                        <div class="row">
                            {{-- Dirección Empresa text field --}}
                            <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                                {{ Form::label('address', 'Dirección Empresa') }}
                                {{ Form::text('address', is_null( $visit->formVisit ) ? null : $visit->formVisit->address, ['class' => 'form-control']) }}
                            </div>
                            {{-- Ciudad text field --}}
                            <div class="col-xs-12 col-sm-3 col-md-3 form-group">
                                {{ Form::label('city', 'Ciudad') }}
                                {{ Form::text('city', is_null( $visit->formVisit ) ? null : $visit->formVisit->city, ['class' => 'form-control']) }}
                            </div>
                            {{-- Teléfono text field --}}
                            <div class="col-xs-12 col-sm-3 col-md-3 form-group">
                                {{ Form::label('phone', 'Teléfono') }}
                                {{ Form::text('phone', is_null( $visit->formVisit ) ? null : $visit->formVisit->phone, ['class' => 'form-control']) }}
                            </div>
                        </div>

                    {{ Form::close() }}
                </div>
            </div>
            <div class="panel panel-bordered">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-file-text text-warning"></i> Certificado Inducción
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-warning">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <strong>#</strong> Certificado de Inducción
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    <br/>
                                    <input id="induction" type="file" class="file-loading" multiple>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button id="btnSubmit" type="submit" class="btn btn-squared btn-primary waves-effect waves-light pull-right"><i class="fa fa-floppy-o"></i> Guardar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Core  -->
<script src="{{ mix('js/index-layout-core.js') }}"></script>
<!-- Scripts -->
<script src="{{ mix('js/index-layout-scripts.js') }}"></script>
<!-- Components -->
<script src="{{ mix('js/index-layout-components.js') }}"></script>
<script src="{{ mix('js/sign-in-visits/form-visits/create-edit-custom-form-visits.js') }}"></script>
<script src="{{ mix('js/upload-common.js') }}"></script>

<script type="text/javascript">

    $(document).ready(function () {

        $("#company").fileinput({
            initialPreview: [
                @foreach($visit->images_company as $image_company)
                    "<img style='width:160px;height:160px' src='{{ Storage::disk('s3')->url($image_company->path) }}' />",
                @endforeach
            ],
            initialPreviewConfig: [
                @foreach($visit->images_company as $image_company)
                    { caption: "{{ $image_company->orig_name }}", size: "{{ $image_company->size }}", url: "{{ route('VisitDeleteImages') }}", key: "{{ $image_company->id }}", extra: { path: "{{ $image_company->path }}", id: "{{ $visit->id }}", type: "Visit" } },
                @endforeach
            ],
            uploadUrl: "{{ route('VisitAddImages') }}",
            uploadExtraData: {
                visit_id: '{{ $visit->id }}',
                repo_id: '',
                type: "Visit",
                subClass: "Company/"
            }
        });

        $("#visa").fileinput({
            initialPreview: [
                @foreach($visit->images_visa as $image_visa)
                    "<img style='width:160px;height:160px' src='{{ Storage::disk('s3')->url($image_visa->path) }}' />",
                @endforeach
            ],
            initialPreviewConfig: [
                @foreach($visit->images_visa as $image_visa)
                    { caption: "{{ $image_visa->orig_name }}", size: "{{ $image_visa->size }}", url: "{{ route('VisitDeleteImages') }}", key: "{{ $image_visa->id }}", extra: { path: "{{ $image_visa->path }}", id: "{{ $visit->id }}", type: "Visit" } },
                @endforeach
            ],
            uploadUrl: "{{ route('VisitAddImages') }}",
            uploadExtraData: {
                visit_id: '{{ $visit->id }}',
                repo_id: '',
                type: "Visit",
                subClass: "Visa/"
            }
        });

        $("#forecast").fileinput({
            initialPreview: [
                @foreach($visit->images_forecast as $image_forecast)
                    "<img style='width:160px;height:160px' src='{{ Storage::disk('s3')->url($image_forecast->path) }}' />",
                @endforeach
            ],
            initialPreviewConfig: [
                @foreach($visit->images_forecast as $image_forecast)
                    { caption: "{{ $image_forecast->orig_name }}", size: "{{ $image_forecast->size }}", url: "{{ route('VisitDeleteImages') }}", key: "{{ $image_forecast->id }}", extra: { path: "{{ $image_forecast->path }}", id: "{{ $visit->id }}", type: "Visit" } },
                @endforeach
            ],
            uploadUrl: "{{ route('VisitAddImages') }}",
            uploadExtraData: {
                visit_id: '{{ $visit->id }}',
                repo_id: '',
                type: "Visit",
                subClass: "Forecast/"
            }
        });

        $("#insurrance").fileinput({
            initialPreview: [
                @foreach($visit->images_insurrance as $image_insurrance)
                    "<img style='width:160px;height:160px' src='{{ Storage::disk('s3')->url($image_insurrance->path) }}' />",
                @endforeach
            ],
            initialPreviewConfig: [
                @foreach($visit->images_insurrance as $image_insurrance)
                    { caption: "{{ $image_insurrance->orig_name }}", size: "{{ $image_insurrance->size }}", url: "{{ route('VisitDeleteImages') }}", key: "{{ $image_insurrance->id }}", extra: { path: "{{ $image_insurrance->path }}", id: "{{ $visit->id }}", type: "Visit" } },
                @endforeach
            ],
            uploadUrl: "{{ route('VisitAddImages') }}",
            uploadExtraData: {
                visit_id: '{{ $visit->id }}',
                repo_id: '',
                type: "Visit",
                subClass: "Insurrance/"
            }
        });

        $("#induction").fileinput({
            initialPreview: [
                @foreach($visit->images_induction as $image_induction)
                    "<img style='width:160px;height:160px' src='{{ Storage::disk('s3')->url($image_induction->path) }}' />",
                @endforeach
            ],
            initialPreviewConfig: [
                @foreach($visit->images_induction as $image_induction)
                    { caption: "{{ $image_induction->orig_name }}", size: "{{ $image_induction->size }}", url: "{{ route('VisitDeleteImages') }}", key: "{{ $image_induction->id }}", extra: { path: "{{ $image_induction->path }}", id: "{{ $visit->id }}", type: "Visit" } },
                @endforeach
            ],
            uploadUrl: "{{ route('VisitAddImages') }}",
            uploadExtraData: {
                visit_id: '{{ $visit->id }}',
                repo_id: '',
                type: "Visit",
                subClass: "Induction/"
            }
        });
    });
</script>

@include('layout.messages.success')
@include('layout.messages.error')

</body>
</html>