<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> E-BAG-Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('public/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}" />
    <link rel="stylesheet" href="{{asset('public/assets/vendors/iconfonts/ionicons/css/ionicons.css')}}" />
    <link rel="stylesheet" href="{{asset('public/assets/vendors/iconfonts/typicons/src/font/typicons.css')}}" />
    <link rel="stylesheet" href="{{asset('public/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css')}}" />
    <link rel="stylesheet" href="{{asset('public/assets/vendors/css/vendor.bundle.base.css')}}" />
    <link rel="stylesheet" href="{{asset('public/assets/vendors/css/vendor.bundle.addons.css')}}" />
    <!--===============================================================================================-->


    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('public/assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('public/assets/css/jquery.dataTables.min.css')}}" />

    <link rel="stylesheet" href="{{asset('public/assets/css/shared/style.css')}}" />
    <!-- endinject -->
    <!-- Layout styles -->

    <link rel="stylesheet" href="{{asset('public/assets/css/demo_1/style.css')}}" />
    <link rel="stylesheet" href="{{asset('public/css/main.css')}}" />

    <!-- End Layout styles -->
    <link rel="shortcut icon" href="{{asset('public/assets/images/favicon.png')}}" />

</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('backend.partials.nav')

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            @include('backend.partials.left_sidebar')

            @yield('content')

        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->


    <!--===============================================================================================-->



    <script src="{{asset('public/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('public/assets/vendors/js/vendor.bundle.addons.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{asset('public/assets/js/shared/off-canvas.js')}}"></script>
    <script src="{{asset('public/assets/js/shared/misc.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{asset('public/assets/js/demo_1/dashboard.js')}}"></script>
    <!-- End custom js for this page-->



    <!-- sweetalert scripts for this template -->
    <script src="{{ asset('public/js/sweetalert.min.js')}}"></script>

    <script>
    $(document).on('click', '#delete', function(e) {
        e.preventDefault();
        var link = $(this).attr("href");
        swal({
                title: "Are you sure?",
                text: "Once deleted, Data will be able permanently Delete!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = link;
                } else {
                    swal("Your Data file is safe!");
                }
            });
    });
    </script>
    <!-- DataTable JS -->
    <script type="text/javascript" src="{{ asset('public/js/jquery-3.3.1.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public/js/jquery.dataTables.min.js')}}"></script>
    <script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    });
    </script>
</body>

</html>