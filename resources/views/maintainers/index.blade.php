@extends('layout.index')

@section('title_header') Listado de Mantenedores @stop

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-2">
            <div id="redirect-areas" class="counter counter-lg counter-inverse bg-red-200 vertical-align waves-effect waves-block waves-light height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon">
                        <i class="fa fa-sitemap" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Áreas</span>
                </div>
            </div>
        </div>
        <div class="clearfix visible-xs margin-bottom-20"></div>
        <div class="col-xs-12 col-sm-4 col-md-2">
            <div id="redirect-positions" class="counter counter-lg counter-inverse bg-pink-200 vertical-align waves-effect waves-block waves-light height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon">
                        <i class="icon md-seat" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Cargos</span>
                </div>
            </div>
        </div>
        <div class="clearfix visible-xs margin-bottom-20"></div>
        <div class="col-xs-12 col-sm-4 col-md-2">
            <div id="redirect-type-certifications" class="counter counter-lg counter-inverse bg-purple-200 vertical-align waves-effect waves-block waves-light height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon">
                        <i class="icon md-badge-check" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Certificaciones</span>
                </div>
            </div>
        </div>
        <div class="clearfix hidden-lg hidden-md margin-bottom-20"></div>
        <div class="col-xs-12 col-sm-4 col-md-2">
            <div id="redirect-cities" class="counter counter-lg counter-inverse bg-deep-purple-200 vertical-align waves-effect waves-block waves-light height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon">
                        <i class="fa fa-flag-o" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Ciudades</span>
                </div>
            </div>
        </div>
        <div class="clearfix visible-xs margin-bottom-20"></div>
        <div class="col-xs-12 col-sm-4 col-md-2">
            <div id="redirect-fuels" class="counter counter-lg counter-inverse bg-indigo-200 vertical-align waves-effect waves-block wave-light height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon">
                        <i class="icon md-gas-station" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Combustibles</span>
                </div>
            </div>
        </div>
        <div class="clearfix visible-xs margin-bottom-20"></div>
        <div class="col-xs-12 col-sm-4 col-md-2">
            <div id="redirect-type-disabilities" class="counter counter-lg counter-inverse bg-blue-200 vertical-align waves-effect waves-block waves-light height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon">
                        <i class="fa fa-wheelchair" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Discapacidades</span>
                </div>
            </div>
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-2">
            <div id="redirect-type-diseases" class="counter counter-lg counter-inverse bg-grey-400 vertical-align waves-effect waves-block waves-light height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon">
                        <i class="fa fa-bed" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Enfermedades</span>
                </div>
            </div>
        </div>
        <div class="clearfix visible-xs margin-bottom-20"></div>
        <div class="col-xs-12 col-sm-4 col-md-2">
            <div id="redirect-type-specialities" class="counter counter-lg counter-inverse bg-cyan-200 vertical-align waves-effect waves-block waves-light height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon">
                        <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Especialidades</span>
                </div>
            </div>
        </div>
        <div class="clearfix visible-xs margin-bottom-20"></div>
        <div class="col-xs-12 col-sm-4 col-md-2">
            <div id="redirect-state-piece-vehicles" class="counter counter-lg counter-inverse bg-red-200 vertical-align waves-effect waves-block waves-light height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon">
                        <i class="fa fa-circle-o-notch" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Estado Pieza Vehículos</span>
                </div>
            </div>
        </div>
        <div class="clearfix hidden-lg hidden-md margin-bottom-20"></div>
        <div class="col-xs-12 col-sm-4 col-md-2">
            <div id="redirect-marital-statuses" class="counter counter-lg counter-inverse bg-blue-grey-200 vertical-align waves-effect waves-block waves-light height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon">
                        <i class="fa fa-venus-mars" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Estados Civiles</span>
                </div>
            </div>
        </div>
        <div class="clearfix visible-xs margin-bottom-20"></div>
        <div class="col-xs-12 col-sm-4 col-md-2">
            <div id="redirect-type-exams" class="counter counter-lg counter-inverse bg-teal-200 vertical-align waves-effect waves-block wave-light height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon">
                        <i class="fa fa-stethoscope" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Exámenes Preocupacionales</span>
                </div>
            </div>
        </div>
        <div class="clearfix visible-xs margin-bottom-20"></div>

    </div>
    <br />
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-2">
            <div id="redirect-institutions" class="counter counter-lg counter-inverse bg-amber-200 vertical-align waves-effect waves-block waves-light height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Instituciones</span>
                </div>
            </div>
        </div>
        <div class="clearfix visible-xs margin-bottom-20"></div>
        <div class="col-xs-12 col-sm-4 col-md-2">
            <div id="redirect-day-trips" class="counter counter-lg counter-inverse bg-pink-200 vertical-align waves-effect waves-block waves-light height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon">
                        <i class="fa fa-tasks" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Jornadas Laborales</span>
                </div>
            </div>
        </div>
        <div class="clearfix visible-xs margin-bottom-20"></div>
        <div class="col-xs-12 col-sm-4 col-md-2">
            <div id="redirect-type-professional-licenses" class="counter counter-lg counter-inverse bg-orange-200 vertical-align waves-effect waves-block wave-light height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon">
                        <i class="fa fa-bookmark" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Licencias Profesionales</span>
                </div>
            </div>
        </div>
        <div class="clearfix hidden-lg hidden-md margin-bottom-20"></div>
        <div class="col-xs-12 col-sm-4 col-md-2">
            <div id="redirect-trademarks" class="counter counter-lg counter-inverse bg-brown-200 vertical-align waves-effect waves-block waves-light height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon">
                        <i class="fa fa-trademark" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Marca Vehículos</span>
                </div>
            </div>
        </div>
        <div class="clearfix visible-xs margin-bottom-20"></div>
        <div class="col-xs-12 col-sm-4 col-md-2">
            <div id="redirect-model-vehicles" class="counter counter-lg counter-inverse bg-grey-400 vertical-align waves-effect waves-block waves-light height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon">
                        <i class="fa fa-car" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Modelo Vehículos</span>
                </div>
            </div>
        </div>
        <div class="clearfix visible-xs margin-bottom-20"></div>
    </div>
    <br />
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-2">
            <div id="redirect-mutualities" class="counter counter-lg counter-inverse bg-blue-grey-200 vertical-align waves-effect waves-block waves-light height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon">
                        <i class="fa fa-ambulance" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Mutualidades</span>
                </div>
            </div>
        </div>
        <div class="clearfix visible-xs margin-bottom-20"></div>
        <div class="col-xs-12 col-sm-4 col-md-2">
            <div id="redirect-terms-and-obligatories" class="counter counter-lg counter-inverse bg-brown-200 vertical-align waves-effect waves-block waves-light height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon">
                        <i class="icon md-lock-open" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Obligaciones y Prohibiciones</span>
                </div>
            </div>
        </div>
        <div class="clearfix hidden-lg hidden-md margin-bottom-20"></div>
        <div class="col-xs-12 col-sm-4 col-md-2">
            <div id="redirect-countries" class="counter counter-lg counter-inverse bg-deep-purple-200 vertical-align waves-effect waves-block waves-light height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon">
                        <i class="fa fa-flag" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Países</span>
                </div>
            </div>
        </div>
        <div class="clearfix visible-xs margin-bottom-20"></div>
        <div class="col-xs-12 col-sm-4 col-md-2">
            <div id="redirect-piece-vehicles" class="counter counter-lg counter-inverse bg-red-200 vertical-align waves-effect waves-block waves-light height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon">
                        <i class="fa fa-wrench" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Piezas de Vehículos</span>
                </div>
            </div>
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-2">
            <div id="redirect-forecasts" class="counter counter-lg counter-inverse bg-cyan-200 vertical-align waves-effect waves-block waves-light height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon">
                        <i class="fa fa-heart" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Previsiones</span>
                </div>
            </div>
        </div>
        <div class="clearfix visible-xs margin-bottom-20"></div>
        <div class="col-xs-12 col-sm-4 col-md-2">
            <div id="redirect-professions" class="counter counter-lg counter-inverse bg-deep-orange-200 vertical-align waves-effect waves-block waves-light height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon">
                        <i class="fa fa-briefcase" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Profesiones</span>
                </div>
            </div>
        </div>
        <div class="clearfix visible-xs margin-bottom-20"></div>
        <div class="col-xs-12 col-sm-4 col-md-2">
            <div id="redirect-routes" class="counter counter-lg counter-inverse bg-purple-200 vertical-align waves-effect waves-block waves-light height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon">
                        <i class="fa fa-map" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Recorridos</span>
                </div>
            </div>
        </div>
        <div class="clearfix hidden-lg hidden-md margin-bottom-20"></div>
        <div class="col-xs-12 col-sm-4 col-md-2">
            <div id="redirect-relationships" class="counter counter-lg counter-inverse bg-light-green-200 vertical-align waves-effect waves-block waves-light height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon">
                        <i class="icon md-male-female" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Relaciones Familiares</span>
                </div>
            </div>
        </div>
        <div class="clearfix visible-xs margin-bottom-20"></div>
        <div class="col-xs-12 col-sm-4 col-md-2">
            <div id="redirect-labor-unions" class="counter counter-lg counter-inverse bg-brown-200 vertical-align waves-effect waves-block wave-light height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon">
                        <i class="fa fa-users" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Sindicato de Trabajadores</span>
                </div>
            </div>
        </div>
        <div class="clearfix visible-xs margin-bottom-20"></div>
        <div class="col-xs-12 col-sm-4 col-md-2">
            <div id="redirect-terminals" class="counter counter-lg counter-inverse bg-blue-grey-200 vertical-align waves-effect waves-block waves-light height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon">
                        <i class="fa fa-road" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Terminales</span>
                </div>
            </div>
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-2">
            <div id="redirect-type-contracts" class="counter counter-lg counter-inverse bg-teal-200 vertical-align waves-effect waves-block waves-light height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon">
                        <i class="fa fa-file-text" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Tipos de Contratos</span>
                </div>
            </div>
        </div>
        <div class="clearfix visible-xs margin-bottom-20"></div>
        <div class="col-xs-12 col-sm-4 col-md-2">
            <div id="redirect-type-companies" class="counter counter-lg counter-inverse bg-pink-200 vertical-align waves-effect waves-block waves-light height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon">
                        <i class="icon md-city-alt" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Tipos de Empresas</span>
                </div>
            </div>
        </div>
        <div class="clearfix visible-xs margin-bottom-20"></div>
        <div class="col-xs-12 col-sm-4 col-md-2">
            <div id="redirect-type-institutions" class="counter counter-lg counter-inverse bg-blue-200 vertical-align waves-effect waves-block waves-light height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon">
                        <i class="fa fa-university" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Tipos de Instituciones</span>
                </div>
            </div>
        </div>
        <div class="clearfix hidden-lg hidden-md margin-bottom-20"></div>
        <div class="col-xs-12 col-sm-4 col-md-2">
            <div id="redirect-type-vehicles" class="counter counter-lg counter-inverse bg-green-200 vertical-align waves-effect waves-block waves-light height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon">
                        <i class="fa fa-subway" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Tipos de Vehículos</span>
                </div>
            </div>
        </div>
        <div class="clearfix visible-xs margin-bottom-20"></div>
        <div class="col-xs-12 col-sm-4 col-md-2">
            <div id="redirect-measuring-units" class="counter counter-lg counter-inverse bg-amber-200 vertical-align waves-effect waves-block waves-light height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon">
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

    <script src="{{ mix('js/maintainers/index.js') }}"></script>

@stop