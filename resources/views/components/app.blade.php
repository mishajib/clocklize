<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $pageTitle ?? '' }} | {{ config('app.name') ?? 'RLab Attendance System' }}</title>

    <x-partials.styles>
        <x-slot name="slot">
            {{ $styles ?? '' }}
        </x-slot>
        <x-slot name="slot2">
            {{ $bottomStyles ?? '' }}
        </x-slot>
    </x-partials.styles>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper" id="app">
    <div class="loader loader-bar is-active" id="overlay-loader"></div>


    <!-- Navbar -->
    <x-partials.navbar></x-partials.navbar>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <x-partials.sidebar></x-partials.sidebar>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @if(isset($breadcrumbFromTitle))
            <!-- Content Header (Page header) -->
            <x-partials.header>
                <x-slot name="title">
                    {{ $pageTitle ?? '' }}
                </x-slot>

                <x-slot name="url">
                    {{ $breadcrumbFromUrl ?? '' }}
                </x-slot>

                <x-slot name="fromTitle">
                    {{ $breadcrumbFromTitle ?? '' }}
                </x-slot>
            </x-partials.header>
            <!-- /.content-header -->
        @endif

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                {{ $slot ?? '' }}
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <x-partials.footer></x-partials.footer>

</div>
<!-- ./wrapper -->

<x-partials.scripts>
    <x-slot name="slot">
        {{ $scripts ?? '' }}
    </x-slot>
    <x-slot name="slot2">
        {{ $bottomScripts ?? '' }}
    </x-slot>
</x-partials.scripts>
</body>
</html>
