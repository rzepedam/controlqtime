<div class="site-menubar site-menubar-dark site-menubar-dark">
    <div class="site-menubar-body">
        <div>
            <div>
                <ul class="site-menu">
                    {{-- Home --}}
                    <li class="site-menu-item active">
                        <a class="animsition-link" href="{{ url('home') }}">
                            <i class="site-menu-icon fa fa-home" aria-hidden="true"></i>
                            <span class="site-menu-title">Inicio</span>
                        </a>
                    </li>

                    {{-- Administración --}}
                    <li class="site-menu-item has-sub">
                        <a class="animsition-link" href="{{ route('administration') }}">
                            <i class="site-menu-icon fa fa-th-large" aria-hidden="true"></i>
                            <span class="site-menu-title">Administración</span>
                        </a>
                    </li>

                    {{-- Recursos Humanos --}}
                    <li class="site-menu-item has-sub">
                        <a class="animsition-link" href="{{ route('human-resources') }}">
                            <i class="site-menu-icon fa fa-street-view" aria-hidden="true"></i>
                            <span class="site-menu-title">Recursos Humanos</span>
                        </a>
                    </li>

                    {{-- Operaciones --}}
                    <li class="site-menu-item has-sub">
                        <a class="animsition-link" href="{{ route('operations') }}">
                            <i class="site-menu-icon fa fa-map-pin" aria-hidden="true"></i>
                            <span class="site-menu-title">Operaciones</span>
                        </a>
                    </li>

                    {{-- Mantenedores --}}
                    <li class="site-menu-item">
                        <a class="animsition-link" href="{{ route('maintainers') }}">
                            <i class="site-menu-icon fa fa-cogs" aria-hidden="true"></i>
                            <span class="site-menu-title">Mantenedores</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>