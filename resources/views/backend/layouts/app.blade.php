<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin Panel</title>
    <!-- Custom fonts for this template-->
    <link href="{{ URL::asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <!-- Custom styles for this template-->
    <link href="{{ URL::asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('admin/css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
    <div id="wrapper">
        <!-- Sidebar -->
        @include('backend.layouts.sidebar')
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                @include('backend.layouts.header')
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                @yield('content')
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ URL::asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ URL::asset('admin/js/sb-admin-2.min.js') }}"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ URL::asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ URL::asset('admin/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ URL::asset('admin/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ URL::asset('admin/js/demo/chart-pie-demo.js') }}"></script>

    <script>
        toastr.options = {
            closeButton: true,
            debug: false,
            newestOnTop: true,
            progressBar: false,
            positionClass: "toast-top-right",
            preventDuplicates: false,
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            timeOut: "5000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
        };
        // ------------toastr End here------------
        $('#findusername').keyup(function() {
            if (this.value.length > 2) {
                var typ_name = $(this).val();
                $.ajax({
                    url: "{{ route('check_username') }}",
                    method: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "username": typ_name
                    },
                    success: function(data) {
                        if (data.status == 1) {
                            $('#findusername').removeClass('icon-wrong')
                            $('#findusername').addClass('icon-right')
                        } else if (data.status == 0) {
                            $('#findusername').removeClass('icon-right')
                            $('#findusername').addClass('icon-wrong')
                        }
                    }
                })
            }
        });
        // ------------------------jquery end here------------------------
        $('#register_btn').click(function() {
            var formdata = $('#register_form').serializeArray();
            $.ajax({
                url: "{{ route('register_me') }}",
                method: "POST",
                data: formdata,
                success: function(data) {
                    if (data.status == 0) {
                        toastr["error"](data.message);
                    } else {
                        toastr["success"](data.message);

                    }
                }
            })

        });
    </script>
</body>

</html>
