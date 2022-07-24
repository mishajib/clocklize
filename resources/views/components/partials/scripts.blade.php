<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

{{ $slot ?? '' }}

<!-- AdminLTE App -->
<script src="{{ asset('assets/js/adminlte.js') }}"></script>
<script></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
@include('errors.sweetalert')


{{ $slot2 ?? '' }}
