<div class="site-menubar site-menubar-dark site-menubar-dark">
    <div class="site-menubar-header">
        <div class="cover overlay">
            <img class="cover-image" src="{{ asset('assets/images/dashboard-header.jpg') }}" alt="...">
            <div class="overlay-panel vertical-align overlay-background">
                <div class="vertical-align-middle">
                    <a class="avatar avatar-lg" href="javascript:void(0)">
                        <img src="{{ asset('assets/images/1.jpg') }}" alt="">
                    </a>
                    <div class="site-menubar-info">
                        <h5 class="site-menubar-user">Machi</h5>
                        <p class="site-menubar-email">machidesign@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="site-menubar-body">
        <div>
            <div>
                <ul class="site-menu">

                    <!-- Home -->
                    <li class="site-menu-item active">
                        <a class="animsition-link" href="{{ route('home') }}">
                            <i class="site-menu-icon fa fa-home" aria-hidden="true"></i>
                            <span class="site-menu-title">Inicio</span>
                        </a>
                    </li>


                    <!-- Recursos Humanos -->
                    <li class="site-menu-item has-sub">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon fa fa-street-view" aria-hidden="true"></i>
                            <span class="site-menu-title">Recursos Humanos</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('human-resources.manpowers.index')}}">
                                    <span class="site-menu-title"><i class="icon fa fa-users site-menu-icon"></i> Trabajadores</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Mantenedores -->
                    <li class="site-menu-item has-sub">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon fa fa-cogs" aria-hidden="true"></i>
                            <span class="site-menu-title">Mantenedores</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item">
                                <a href="{{ route('maintainers.areas.index') }}">
                                    <span class="site-menu-title"><i class="site-menu-icon fa fa-sitemap" aria-hidden="true"></i> Áreas</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="javascript:void(0)">
                                    <span class="site-menu-title"><i class="site-menu-icon fa fa-archive" aria-hidden="true"></i> Bodegas</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('maintainers.ratings.index') }}">
                                    <span class="site-menu-title"><i class="site-menu-icon md-seat font-size-18" aria-hidden="true"></i>Cargos</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('maintainers.type-certifications.index') }}">
                                    <span class="site-menu-title"><i class="site-menu-icon md-badge-check" aria-hidden="true" ></i> Certificaciones</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('maintainers.cities.index') }}">
                                    <span class="site-menu-title"><i class="site-menu-icon fa fa-flag-o" aria-hidden="true"></i> Ciudades</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('maintainers.type-disabilities.index') }}">
                                    <span class="site-menu-title"><i class="site-menu-icon fa fa-wheelchair" aria-hidden="true"></i> Discapacidades</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="javascript:void(0)">
                                    <span class="site-menu-title"><i class="site-menu-icon fa fa-files-o" aria-hidden="true"></i> Documentos</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('maintainers.companies.index') }}">
                                    <span class="site-menu-title"><i class="site-menu-icon fa fa-building-o" aria-hidden="true"></i> Empresas</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('maintainers.type-diseases.index') }}">
                                    <span class="site-menu-title"><i class="site-menu-icon fa fa-bed" aria-hidden="true"></i> Enfermedades</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="javadcript:void(0)">
                                    <span class="site-menu-title"><i class="site-menu-icon fa fa-shield" aria-hidden="true"></i> EPP's</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('maintainers.type-specialities.index') }}">
                                    <span class="site-menu-title"><i class="site-menu-icon fa fa-wrench" aria-hidden="true"></i> Especialidades</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('maintainers.type-exams.index') }}">
                                    <span class="site-menu-title"><i class="site-menu-icon fa fa-stethoscope" aria-hidden="true"></i> Ex. Preocupacionales</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('maintainers.pensions.index') }}">
                                    <span class="site-menu-title"><i class="site-menu-icon fa fa-tags" aria-hidden="true"></i> Fondos de Pensión</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('maintainers.degrees.index') }}">
                                    <span class="site-menu-title"><i class="site-menu-icon fa fa-star-half-o" aria-hidden="true"></i> Grados Académicos</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('maintainers.institutions.index') }}">
                                    <span class="site-menu-title"><i class="site-menu-icon fa fa-graduation-cap" aria-hidden="true"></i> Instituciones</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('maintainers.type-professional-licenses.index') }}">
                                    <span class="site-menu-title"><i class="site-menu-icon fa fa-bookmark"></i> Lic. Profesionales</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('maintainers.trademarks.index') }}">
                                    <span class="site-menu-title"><i class="site-menu-icon fa fa-trademark" aria-hidden="true"></i> Marca Vehículos</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('maintainers.model-vehicles.index') }}">
                                    <span class="site-menu-title"><i class="site-menu-icon fa fa-car" aria-hidden="true"></i> Modelo Vehículos</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="javascript:void(0)">
                                    <span class="site-menu-title"><i class="site-menu-icon fa fa-money" aria-hidden="true"></i> Monedas</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('maintainers.mutualities.index') }}">
                                    <span class="site-menu-title"><i class="site-menu-icon fa fa-ambulance" aria-hidden="true"></i> Mutualidades</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('maintainers.countries.index') }}">
                                    <span class="site-menu-title"><i class="site-menu-icon fa fa-flag" aria-hidden="true"></i> Países</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('maintainers.relationships.index') }}">
                                    <span class="site-menu-title"><i class="site-menu-icon md-male-female font-size-18" aria-hidden="true"></i>Relaciones Fam.</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('maintainers.forecasts.index') }}">
                                    <span class="site-menu-title"><i class="site-menu-icon fa fa-heart" aria-hidden="true"></i> Previsiones</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="javascript:void(0)">
                                    <span class="site-menu-title"><i class="site-menu-icon fa fa-cubes" aria-hidden="true"></i> Productos</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('maintainers.professions.index') }}">
                                    <span class="site-menu-title"><i class="site-menu-icon fa fa-briefcase" aria-hidden="true"></i> Profesiones</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="javascript:void(0)">
                                    <span class="site-menu-title"><i class="site-menu-icon fa fa-steam" aria-hidden="true"></i> Talleres</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('maintainers.terminals.index') }}">
                                    <span class="site-menu-title"><i class="site-menu-icon fa fa-road" aria-hidden="true"></i> Terminales</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('maintainers.type-institutions.index') }}">
                                    <span class="site-menu-title"><i class="site-menu-icon fa fa-university" aria-hidden="true"></i> Tipos de Instituciones</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('maintainers.type-vehicles.index') }}">
                                    <span class="site-menu-title"><i class="site-menu-icon fa fa-subway" aria-hidden="true"></i> Tipos de Vehículos</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('maintainers.vehicles.index') }}">
                                    <span class="site-menu-title"><i class="site-menu-icon fa fa-bus" aria-hidden="true"></i> Vehículos</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>