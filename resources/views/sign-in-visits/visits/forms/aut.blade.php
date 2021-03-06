<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="CQTime - Where questions find answers">
    <meta name="author" content="Raúl Elías Meza Mora">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="icon" href="{{ asset('img/logo.png') }}">
    <title>Controlqtime</title>
    <link rel="stylesheet" href="{{ mix('css/core.css') }}">
    <link rel="stylesheet" href="{{ mix('css/plugins.css') }}">
    <link rel="stylesheet" href="{{ mix('css/fonts.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/upload-common.css') }}">
    <style>
        body {
            padding-top: 0px;
        }
    </style>
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <script src="{{ mix('js/breakpoints.js') }}"></script>
    <script>Breakpoints();</script>
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

<script src="{{ mix('js/core.js') }}"></script>
<script src="{{ mix('js/plugins.js') }}"></script>
<script src="{{ mix('js/components.js') }}"></script>
<script src="{{ mix('js/upload-common.js') }}"></script>
<script type="text/javascript" src="{{ mix('js/sign-in-visits/form-visits/create-edit.js') }}"></script>

<script type="text/javascript">

    $(document).ready(function () {
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