<script>
    const Toast = Swal.mixin({
        toast            : true,
        position         : 'top-end',
        showConfirmButton: false,
        timer            : 3000,
        timerProgressBar : true,
        didOpen          : (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });
</script>
@if(Session::has('success'))
    <script>
        Swal.fire(
            'Success!',
            "{{ Session::get('success') }}",
            'success'
        )
    </script>
@endif

@if(Session::has('error'))
    <script>
        Swal.fire(
            'Error!',
            "{{ Session::get('error') }}",
            'error'
        )
    </script>
@endif

@if(Session::has('info'))
    <script>
        Swal.fire(
            'Info!',
            "{{ Session::get('info') }}",
            'info'
        )
    </script>
@endif

@if(Session::has('warning'))
    <script>
        Swal.fire(
            'Warning!',
            "{{ Session::get('warning') }}",
            'warning'
        )
    </script>
@endif

@if($errors->any())
    @foreach($errors->all() as $error)
        <script>
            Toast.fire({
                icon : 'error',
                title: "{{ $error }}"
            });
        </script>
    @endforeach
@endif

{{--Toastr--}}
@if(Session::has('toast_success'))
    <script>
        Toast.fire({
            icon : 'success',
            title: "{{ Session::get('toast_success') }}"
        });
    </script>
@endif

@if(Session::has('toast_error'))
    <script>
        Toast.fire({
            icon : 'error',
            title: "{{ Session::get('toast_error') }}"
        });
    </script>
@endif

@if(Session::has('toast_info'))
    <script>
        Toast.fire({
            icon : 'info',
            title: "{{ Session::get('toast_info') }}"
        });
    </script>
@endif

@if(Session::has('toast_warning'))
    <script>
        Toast.fire({
            icon : 'warning',
            title: "{{ Session::get('toast_warning') }}"
        });
    </script>
@endif

@if(Session::has('status'))
    <script>
        Toast.fire({
            icon : 'info',
            title: '{!! Session::get('status') !!}'
        });
    </script>
@endif
