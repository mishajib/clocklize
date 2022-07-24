<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

{{--<script>--}}
{{--    window._settings = @json(config('settings'));--}}
{{--    window._authcheck = @json(Auth::check());--}}
{{--    window.APP_URL = "{{ url('/') }}";--}}
{{--    window.ASSET_PATH_PREFIX = "{{ asset('/') }}";--}}
{{--    @auth--}}
{{--        window._authuser = @json(Auth::user());--}}
{{--    @endauth--}}
{{--</script>--}}

{{ $slot ?? '' }}

{{--<script src="{{ asset('js/app.js') }}"></script>--}}
<!-- AdminLTE App -->
<script src="{{ asset('assets/js/adminlte.js') }}"></script>
<script></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
@include('errors.sweetalert')


{{ $slot2 ?? '' }}
