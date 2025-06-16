<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    {{--
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
    <title>{{ config('app.name') }}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">

    <link rel="stylesheet" href="{{ asset('/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendors/mdi/css/materialdesignicons.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('/js/select.dataTables.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('/css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('/images/w3care_favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
</head>

<body>




    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            @include('layouts.navbar')
        </nav>
        <!-- partial -->


        <div class="container-fluid page-body-wrapper" id="maincontent">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                @include('layouts.sidebar')
            </nav>
            <!-- partial -->

            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>

                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer hidden_footer">
                    @include('layouts.footer')
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>


        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->


    <!-- plugins:js -->
    <script src="{{ asset('/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('/js/dataTables.select.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->

    <!--  html2pdf -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>


    <script src="{{ asset('/js/off-canvas.js') }}"></script>
    <script src="{{ asset('/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('/js/template.js') }}"></script>
    <script src="{{ asset('/js/settings.js') }}"></script>
    <script src="{{ asset('/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('/js/dashboard.js') }}"></script>
    <script src="{{ asset('/js/Chart.roundedBarCharts.js') }}"></script>
    <!-- End custom js for this page-->
    <script src="{{ asset('/vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset("/js/select2.js") }}"></script>

    <script>
        $(document).ready(function() {
            // Initialize Select2 for multiple selection
            $('.js-example-basic-multiple').select2({
                placeholder: "Select multiple options"
                , allowClear: true
            });
        });

    </script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                //  paging: false,
                // info: false,
                "columnDefs": [{
                    "targets": -1, // Last column
                    // "targets": -2, // Last column
                    "orderable": false
                }]
            });
        });

    </script>


    
    <script>
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

    </script>


</body>

</html>
