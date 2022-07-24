<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>


        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('home') }}" class="nav-link">
                <i class="fas fa-home"></i>
                Home
            </a>
        </li>
    </ul>


    <!-- Right navbar links -->
    {{--<ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="{{ storagelink(Auth::user()->profile_image, 'user') }}"
                     class="user-image img-circle elevation-2"
                     alt="User Image">
                <span class="d-none d-md-inline">{{ authname() }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-primary">
                    <img src="{{ storagelink(Auth::user()->profile_image, 'user') }}" class="img-circle elevation-2"
                         alt="User Image">

                    <p>
                        {{ authname() }}
                        <small>
                            Member since {{ \Carbon\Carbon::parse(auth()->user()->created_at)->format('M. Y') }}
                        </small>
                    </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <a href="{{ route('admin.profile.index') }}" class="btn btn-default btn-flat">Profile</a>
                    <a href="{{ route('admin.logout') }}"
                       class="btn btn-default btn-flat float-right" onclick="event.preventDefault();logoutFunction();">
                        Sign out
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>

    </ul>--}}
</nav>
