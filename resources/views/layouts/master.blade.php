<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    {{--
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
    <title>{{ config('app.name') }}</title>
    <!-- Plugin css for this page -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css')}}">
     <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css')}}">
</head>

<body>




    
        <div class="main-wrapper">
        <!-- partial:partials/_navbar.html -->
            @include('layouts.navbar')
        <!-- partial -->
                @include('layouts.sidebar')
            <!-- partial -->
                <div class="page-wrapper">
                    @yield('content')
                </div>

                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
     
                <!-- partial -->
            <!-- main-panel ends -->
        </div>


        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('assets/js/feather.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/select2/js/custom-select.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/moment.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/fileupload/fileupload.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/sweetalert/sweetalert2.all.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/sweetalert/sweetalerts.min.js') }}"></script>
        <script src="{{ asset('assets/js/script.js') }}"></script>



        <!-- Plugin js for this page -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
                    $(document).on("click", ".btn_logout", function (e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You want to Logout from here!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('logout') }}',
                            type: 'GET',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function (response) {
                                history.pushState(null, null, '{{ route('login') }}');
                                window.location.href = '{{ route('login') }}';
                            },
                            error: function (xhr, status, error) {
                                console.error(xhr.responseText);
                                Swal.fire(
                                    'Error!',
                                    'Failed to logout. Please try again.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });
                $('.selectall').click(function() {
        if ($(this).is(':checked')) {
            $('input:checkbox').prop('checked', true);
        } else {
            $('input:checkbox').prop('checked', false);
        }
    });
    $(".add, .edit, .delete").click(function() {
        if ($(this).is(':checked')) {
            $(this).parent().parent().find('.list').prop('checked', true);
        } else {
            $(".add, .edit, .delete").parent().parent().prop('checked', false);
        }
    });
    </script>
</body>
</html>