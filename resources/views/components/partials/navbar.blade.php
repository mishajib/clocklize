<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>


        {{--<li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('home') }}" class="nav-link">
                <i class="fas fa-home"></i>
                Home
            </a>
        </li>--}}
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="{{ storagelink(auth()->user()->image, 'user') }}"
                     class="user-image img-circle elevation-2"
                     alt="User Image">
                <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-primary">
                    <img src="{{ storagelink(auth()->user()->image, 'user') }}" class="img-circle elevation-2"
                         alt="User Image">

                    <p>
                        {{ auth()->user()->name }}
                        <small>
                            Member since {{ \Carbon\Carbon::parse(auth()->user()->created_at)->format('M. Y') }}
                        </small>
                    </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <a href="{{ route('profile.index') }}" class="btn btn-default btn-flat">
                        {{ __('default.profile') }}
                    </a>
                    <a href="{{ route('logout') }}"
                       class="btn btn-default btn-flat float-right" onclick="event.preventDefault();logoutFunction();">
                        {{ __("default.logout") }}
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>

    </ul>
</nav>
