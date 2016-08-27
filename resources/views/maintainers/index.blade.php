@extends('layout.index')

@section('title_header') Listado de Mantenedores @stop

@section('content')

    <div class="row">
        <div class="col-md-2">
            <div id="redirect-areas" class="counter counter-lg counter-inverse bg-red-200 vertical-align height-150 margin-bottom-5 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="fa fa-sitemap" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Áreas</span>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div id="redirect-positions" class="counter counter-lg counter-inverse bg-pink-200 vertical-align height-150 margin-bottom-5 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="icon md-seat" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Cargos</span>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div id="redirect-type-certifications" class="counter counter-lg counter-inverse bg-purple-200 vertical-align height-150 margin-bottom-5 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="icon md-badge-check" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Certificaciones</span>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div id="redirect-cities" class="counter counter-lg counter-inverse bg-deep-purple-200 vertical-align height-150 margin-bottom-5 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="fa fa-flag-o" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Ciudades</span>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div id="redirect-terms-and-obligatories" class="counter counter-lg counter-inverse bg-brown-200 vertical-align height-150 margin-bottom-5 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="icon md-lock-open" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Cláusulas y Obligaciones</span>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div id="redirect-fuels" class="counter counter-lg counter-inverse bg-indigo-200 vertical-align height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="icon md-gas-station" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Combustibles</span>
                </div>
            </div>
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-md-2">
            <div id="redirect-type-disabilities" class="counter counter-lg counter-inverse bg-blue-200 vertical-align height-150 margin-bottom-5 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="fa fa-wheelchair" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Discapacidades</span>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div id="redirect-type-diseases" class="counter counter-lg counter-inverse bg-grey-400 vertical-align height-150 margin-bottom-5 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="fa fa-bed" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Enfermedades</span>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div id="redirect-type-specialities" class="counter counter-lg counter-inverse bg-cyan-200 vertical-align height-150 margin-bottom-5 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="fa fa-wrench" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Especialidades</span>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div id="redirect-marital-statuses" class="counter counter-lg counter-inverse bg-blue-grey-200 vertical-align height-150 margin-bottom-5 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="fa fa-venus-mars" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Estados Civiles</span>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div id="redirect-type-exams" class="counter counter-lg counter-inverse bg-teal-200 vertical-align height-150 margin-bottom-5 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="fa fa-stethoscope" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Exámenes Preocupacionales</span>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div id="redirect-pensions" class="counter counter-lg counter-inverse bg-green-200 vertical-align height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="fa fa-tags" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Fondos de Pensión</span>
                </div>
            </div>
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-md-2">
            <div id="redirect-degrees" class="counter counter-lg counter-inverse bg-light-green-200 vertical-align height-150 margin-bottom-5 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="fa fa-star-half-o" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Grados Académicos</span>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div id="redirect-gratifications" class="counter counter-lg counter-inverse bg-purple-200 vertical-align height-150 margin-bottom-5 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="fa fa-diamond" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Gratificaciones</span>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div id="redirect-institutions" class="counter counter-lg counter-inverse bg-amber-200 vertical-align height-150 margin-bottom-5 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Instituciones</span>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div id="redirect-day-trips" class="counter counter-lg counter-inverse bg-pink-200 vertical-align height-150 margin-bottom-5 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="fa fa-tasks" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Jornadas Laborales</span>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div id="redirect-type-professional-licenses" class="counter counter-lg counter-inverse bg-orange-200 vertical-align height-150 margin-bottom-5 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="fa fa-bookmark" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Licencias Profesionales</span>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div id="redirect-trademarks" class="counter counter-lg counter-inverse bg-brown-200 vertical-align height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="fa fa-trademark" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Marca Vehículos</span>
                </div>
            </div>
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-md-2">
            <div id="redirect-model-vehicles" class="counter counter-lg counter-inverse bg-grey-400 vertical-align height-150 margin-bottom-5 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="fa fa-car" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Modelo Vehículos</span>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div id="redirect-mutualities" class="counter counter-lg counter-inverse bg-blue-grey-200 vertical-align height-150 margin-bottom-5 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="fa fa-ambulance" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Mutualidades</span>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div id="redirect-num-hours" class="counter counter-lg counter-inverse bg-teal-200 vertical-align height-150 margin-bottom-5 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Nº de Horas</span>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div id="redirect-countries" class="counter counter-lg counter-inverse bg-deep-purple-200 vertical-align height-150 margin-bottom-5 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="fa fa-flag" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Países</span>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div id="redirect-periodicities" class="counter counter-lg counter-inverse bg-blue-200 vertical-align height-150 margin-bottom-5 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="fa fa-repeat" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Periocidades</span>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div id="redirect-forecasts" class="counter counter-lg counter-inverse bg-cyan-200 vertical-align height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="fa fa-heart" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Previsiones</span>
                </div>
            </div>
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-md-2">
            <div id="redirect-professions" class="counter counter-lg counter-inverse bg-deep-orange-200 vertical-align height-150 margin-bottom-5 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="fa fa-briefcase" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Profesiones</span>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div id="redirect-routes" class="counter counter-lg counter-inverse bg-purple-200 vertical-align height-150 margin-bottom-5 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="fa fa-map" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Recorridos</span>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div id="redirect-relationships" class="counter counter-lg counter-inverse bg-light-green-200 vertical-align height-150 margin-bottom-5 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="icon md-male-female" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Relaciones</span>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div id="redirect-terminals" class="counter counter-lg counter-inverse bg-blue-grey-200 vertical-align height-150 margin-bottom-5 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="fa fa-road" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Terminales</span>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div id="redirect-type-contracts" class="counter counter-lg counter-inverse bg-teal-200 vertical-align height-150 margin-bottom-5 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="fa fa-file-text" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Tipos de Contratos</span>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div id="redirect-type-companies" class="counter counter-lg counter-inverse bg-pink-200 vertical-align height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="icon md-city-alt" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Tipos de Empresas</span>
                </div>
            </div>
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-md-2">
            <div id="redirect-type-institutions" class="counter counter-lg counter-inverse bg-blue-200 vertical-align height-150 margin-bottom-5 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="fa fa-university" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Tipos de Instituciones</span>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div id="redirect-type-vehicles" class="counter counter-lg counter-inverse bg-green-200 vertical-align height-150 margin-bottom-5 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="fa fa-subway" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Tipos de Vehículos</span>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div id="redirect-measuring-units" class="counter counter-lg counter-inverse bg-amber-200 vertical-align height-150 margin-bottom-5 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="fa fa-sort-amount-asc" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Unidad de Medida</span>
                </div>
            </div>
        </div>
    </div>
    <br />
    <br />

@stop

@section('scripts')

    <script src="{{ elixir('js/maintainers/index.js') }}"></script>

@stop