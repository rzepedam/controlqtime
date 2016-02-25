<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('/') }}"><i class="fa fa-home"></i> <span>Inicio</span></a></li>
            <li><a href="{{ url('human-resources') }}"><i class="fa fa-users"></i> <span>RRHH</span></a></li>
            <li><a href="#"><i class="fa fa-life-ring"></i> <span>Seguridad</span></a></li>
            <li><a href="#"><i class="fa fa-rss"></i> <span>Operaciones</span></a></li>
            <li><a href="#"><i class="fa fa-gavel"></i> <span>Contratos</span></a></li>
            <li class="treeview">
                <a href="{{ url('maintainers.index') }}"><i class="fa fa-cogs"></i> <span>Mantenedores</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('maintainers.areas.index') }}"><i class="fa fa-sitemap"></i> Áreas</a></li>
                    <li><a href="#"><i class="fa fa-archive"></i> Bodegas</a></li>
                    <li><a href="{{ route('maintainers.ratings.index') }}"><i class="fa fa-male"></i> Cargos</a></li>
                    <li><a href="{{ route('maintainers.cities.index') }}"><i class="fa fa-flag-o"></i> Ciudades</a></li>
                    <li><a href="{{ route('maintainers.certifications.index') }}"><i class="fa fa-certificate"></i> Certificaciones</a></li>
                    <li><a href="{{ route('maintainers.disabilities.index') }}"><i class="fa fa-wheelchair"></i> Discapacidades</a></li>
                    <li><a href="#"><i class="fa fa-file-text"></i> Documentos</a></li>
                    <li><a href="{{ route('maintainers.companies.index') }}"><i class="fa fa-building-o"></i> Empresas</a></li>
                    <li><a href="{{ route('maintainers.diseases.index') }}"><i class="fa fa-bed"></i> Enfermedades</a></li>
                    <li><a href="#"><i class="fa fa-shield"></i> EPP's</a></li>
                    <li><a href="{{ route('maintainers.specialities.index') }}"><i class="fa fa-wrench"></i> Especialidades</a></li>
                    <li><a href="{{ route('maintainers.exams.index') }}"><i class="fa fa-stethoscope"></i> Exámenes Preocupacionales</a></li>
                    <li><a href="{{ route('maintainers.pensions.index') }}"><i class="fa fa-tags"></i> Fondos de Pensión</a></li>
                    <li><a href="{{ route('maintainers.degrees.index') }}"><i class="fa fa-star-half-o"></i> Grados Académicos</a></li>
                    <li><a href="{{ route('maintainers.institutions.index') }}"><i class="fa fa-graduation-cap"></i> Instituciones</a></li>
                    <li><a href="{{ route('maintainers.licenses.index') }}"><i class="fa fa-star"></i> Licencias Profesionales</a></li>
                    <li><a href="#"><i class="fa fa-money"></i> Monedas</a></li>
                    <li><a href="{{ route('maintainers.mutualities.index') }}"><i class="fa fa-ambulance"></i> Mutualidades</a></li>
                    <li><a href="{{ route('maintainers.countries.index') }}"><i class="fa fa-flag"></i> Países</a></li>
                    <li><a href="{{ route('maintainers.kins.index') }}"><i class="fa fa-child"></i> Parentescos Familiares</a></li>
                    <li><a href="{{ route('maintainers.forecasts.index') }}"><i class="fa fa-heart"></i> Previsiones</a></li>
                    <li><a href="#"><i class="fa fa-cubes"></i> Productos</a></li>
                    <li><a href="{{ route('maintainers.professions.index') }}"><i class="fa fa-briefcase"></i> Profesiones</a></li>
                    <li><a href="#"><i class="fa fa-steam"></i> Talleres</a></li>
                    <li><a href="#"><i class="fa fa-road"></i> Terminales</a></li>
                    <li><a href="{{ route('maintainers.type-institutions.index') }}"><i class="fa fa-university"></i> Tipos de Institución</a></li>
                </ul>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
