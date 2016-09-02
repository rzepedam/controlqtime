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
            <div class="navbar-brand navbar-brand-center">
                <a href="{{ route('home') }}">
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