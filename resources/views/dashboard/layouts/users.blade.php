<!doctype html>
<html lang="en">

<head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Buaya Cuan</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="{{asset('template')}}/vendors/feather/feather.css">
        <link rel="stylesheet" href="{{asset('template')}}/vendors/ti-icons/css/themify-icons.css">
        <link rel="stylesheet" href="{{asset('template')}}/vendors/css/vendor.bundle.base.css">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="{{asset('template')}}/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
        <link rel="stylesheet" href="{{asset('template')}}/vendors/ti-icons/css/themify-icons.css">
        <link rel="stylesheet" type="text/css" href="{{asset('template')}}/js/select.dataTables.min.css">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="{{asset('template')}}/css/vertical-layout-light/style.css">
        <!-- endinject -->
        <link rel="shortcut icon" href="{{asset('template')}}/images/favicon.png" />
      </head>

<body>
    <div class="container-scroller">
        @include('dashboard.layouts.header')
        <div class="container-fluid page-body-wrapper">
        @include('dashboard.layouts.sidebar')
        <div class="main-panel">
            @yield('container')
            @include('dashboard.layouts.footer')
        </div>
        
        </div>
        </div>
        
             
      

  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{asset('template')}}/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{asset('template')}}/vendors/chart.js/Chart.min.js"></script>
  <script src="{{asset('template')}}/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="{{asset('template')}}/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="{{asset('template')}}/js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{asset('template')}}/js/off-canvas.js"></script>
  <script src="{{asset('template')}}/js/hoverable-collapse.js"></script>
  <script src="{{asset('template')}}/js/template.js"></script>
  <script src="{{asset('template')}}/js/settings.js"></script>
  <script src="{{asset('template')}}/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('template')}}/js/dashboard.js"></script>
  <script src="{{asset('template')}}/js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
  <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    @if ($message = Session::get('error'))
        <script>
            toastr.options = {
                "preventDuplicates": true,
                "preventOpenDuplicates": true
            };
            toastr["error"]("{{ $message }}", "Error")
        </script>
    @endif
    @if ($message = Session::get('success'))
        <script>
            toastr.options = {
                "preventDuplicates": true,
                "preventOpenDuplicates": true
            };
            toastr["success"]("{{ $message }}", "Success")
        </script>
    @endif
    @if ($message = Session::get('warning'))
        <script>
            toastr.options = {
                "preventDuplicates": true,
                "preventOpenDuplicates": true
            };
            toastr["warning"]("{{ $message }}", "Warning")
        </script>
    @endif
    @if ($message = Session::get('info'))
        <script>
            toastr.options = {
                "preventDuplicates": true,
                "preventOpenDuplicates": true
            };
            toastr["info"]("{{ $message }}", "Info")
        </script>
    @endif
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                toastr.options = {
                    "preventDuplicates": true,
                    "preventOpenDuplicates": true
                };
                toastr["error"]("{{ $error }}", "Error")
            </script>
        @endforeach
    @endif

</body>

</html>
