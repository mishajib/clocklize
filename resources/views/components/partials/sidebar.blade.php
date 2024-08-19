<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
        <img src="{{ asset('assets/img/logo.webp') }}" alt="{{ config('app.name') }}"
             class="brand-image img-circle"
             style="opacity: 0.8">
        <span class="brand-text font-weight-light">{{ __('default.clocklize') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ storagelink(auth()->user()->image, 'user') }}" class="img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('profile.index') }}" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                       aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                       class="nav-link {{ routeIs('dashboard') ?  'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{ __('default.dashboard') }}
                        </p>
                    </a>
                </li>

                @if(auth()->user()->hasRole('member'))
                    <li class="nav-item">
                        <a href="{{ route('attendances.records') }}"
                           class="nav-link {{ routeIs('attendances.records') ?  'active' : '' }}">
                            <i class="nav-icon fas fa-paperclip"></i>
                            <p>
                                {{ __('default.attendance_records') }}
                            </p>
                        </a>
                    </li>
                @endif

                @if(auth()->user()->hasRole('admin'))
                    <li class="nav-item {{ routeIs('users.*') ? 'menu-is-opening menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-shield-alt"></i>
                            <p>
                                {{ __('default.user_management') }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('users.create') }}"
                                   class="nav-link {{ routeIs('users.create') ? 'active' : '' }}">
                                    <i class="fas fa-plus nav-icon"></i>
                                    <p>{{ __('default.add_new_module', ['module' => __('default.user')]) }}</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('users.index') }}"
                                   class="nav-link {{ (routeIs('users.index')) ? 'active' : '' }}">
                                    <i class="fas fa-list nav-icon"></i>
                                    <p>{{ __('default.users') }}</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('reports.monthly') }}"
                           class="nav-link {{ routeIs('reports.monthly') ?  'active' : '' }}">
                            <i class="nav-icon fas fa-chart-bar"></i>
                            <p>
                                {{ __('default.monthly_report') }}
                            </p>
                        </a>
                    </li>
                @endif

                <li class="nav-header">{{ __('default.profile') }}</li>

                <li class="nav-item">
                    <a href="{{ route('profile.index') }}"
                       class="nav-link {{ routeIs('profile.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            {{ __('default.profile') }}
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('profile.reset-password') }}"
                       class="nav-link {{ routeIs('profile.reset-password') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-lock"></i>
                        <p>
                            {{ __('default.security') }}
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link"
                       onclick="event.preventDefault();logoutFunction();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            {{ __('Logout') }}
                        </p>
                        <form id="logout-form" action="{{ route('logout') }}"
                              method="POST">
                            @csrf
                        </form>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
