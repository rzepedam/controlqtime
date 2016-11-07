<nav class="site-navbar navbar navbar-inverse navbar-fixed-top navbar-mega bg-blue-600" role="navigation">
    <div class="navbar-container container-fluid">
        <div class="navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
            <ul class="nav navbar-toolbar">
                <li id="toggleMenubar">
                    <a data-toggle="menubar" href="#" role="button">
                        <i class="icon hamburger hamburger-arrow-left">
                            <span class="sr-only">Toggle menubar</span>
                            <span class="hamburger-bar"></span>
                        </i>
                    </a>
                </li>
                <li>
                    <a class="icon md-search" data-toggle="collapse" href="#site-navbar-search" role="button">
                        <span class="sr-only">Toggle Search</span>
                    </a>
                </li>
            </ul>

            <!-- Navbar Toolbar Right -->
            <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                <li class="dropdown">
                    <a data-toggle="dropdown" href="javascript:void(0)" title="Notifications" aria-expanded="false" data-animation="scale-up" role="button">
                        <i class="fa fa-bullhorn" aria-hidden="true"></i>
                        <span class="badge {{ auth()->user()->num_notifications_unread > 0 ? 'badge-danger' : 'badge-info' }} up">
                            {{ auth()->user()->num_notifications_unread }}
                        </span>
                    </a>
                    @if (auth()->user()->num_notifications > 0)
                        <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
                            <li class="dropdown-menu-header" role="presentation">
                                <h5>Notificaciones</h5>
                                @if (auth()->user()->num_notifications_unread > 0)
                                    <span class="label label-round label-danger padding-5">
                                        No Leídas {{ auth()->user()->num_notifications_unread }}
                                    </span>
                                @endif
                            </li>
                            <li class="list-group" role="presentation">
                                <div data-role="container">
                                    <div data-role="content">
                                        @foreach(auth()->user()->notifications as $notification)
                                            <a href="{{ url("notifications/{$notification->id}") }}" class="list-group-item" role="menuitem">
                                                <div class="media">
                                                    <div class="media-body">
                                                        @if ($notification->read_at == null)
                                                            <h6 class="media-heading">
                                                                {{ trans('notifications.' . class_basename($notification->type), $notification->data) }}
                                                            </h6>
                                                        @else
                                                            <span class="media-heading">
                                                                {{ trans('notifications.' . class_basename($notification->type), $notification->data) }}
                                                            </span>
                                                        @endif
                                                        <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">
                                                            hace {{ $notification->created_at->diffForHumans() }}
                                                        </time>
                                                    </div>
                                                </div>
                                            </a>
                                            @if ($loop->index == 3)
                                                @break
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown-menu-footer padding-top-10" role="presentation">
                                @if (auth()->user()->num_notifications_unread > 0)
                                    <a href="{{ url('notifications/mark-all-read') }}" class="dropdown-menu-footer-btn" role="button">
                                        <i class="icon md-check-all" aria-hidden="true"></i> Leídas
                                    </a>
                                @endif
                                <a href="javascript:void(0)" role="menuitem">
                                    <i class="icon md-alarm" aria-hidden="true"></i> Ver Historial
                                </a>
                            </li>
                        </ul>
                    @else
                        <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
                            <li class="dropdown-menu-header text-center" role="presentation">
                                <span>
                                    <i class="md-mood text-warning font-size-24" aria-hidden="true"></i>
                                </span>
                                <span class="vertical-align-middle">
                                    No posee notificaciones
                                </span>
                            </li>
                        </ul>
                    @endif
                </li>
                <li class="dropdown">
                    <a class="navbar-avatar dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false" data-animation="scale-up" role="button">
                        <span class="avatar">
                            <img src="{{ auth()->user()->employee->url }}">
                        </span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li role="presentation">
                            <a href="javascript:void(0)" role="menuitem"><i class="icon md-account" aria-hidden="true"></i> Editar Perfil</a>
                        </li>
                        <li class="divider" role="presentation"></li>
                        <li role="presentation">
                            <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="icon md-power" aria-hidden="true"></i> Logout
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- End Navbar Toolbar Right -->
            <div class="navbar-brand navbar-brand-center">
                <a href="{{ url('home') }}">
                    <img class="navbar-brand-logo" src="{{ asset('img/remark.png') }}" title="ControlQTime">
                </a>
            </div>
        </div>

        <div class="collapse navbar-search-overlap" id="site-navbar-search">
            <form role="search">
                <div class="form-group">
                    <div class="input-search">
                        <i class="input-search-icon md-search" aria-hidden="true"></i>
                        <input type="text" class="form-control" name="site-search" placeholder="Search...">
                        <button type="button" class="input-search-close icon md-close" data-target="#site-navbar-search"
                        data-toggle="collapse" aria-label="Close"></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</nav>