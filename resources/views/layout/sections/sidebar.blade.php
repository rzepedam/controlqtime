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

                    {{-- Home --}}
                    <li class="site-menu-item active">
                        <a class="animsition-link" href="{{ route('home') }}">
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