<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Lost and Found</title>
        <link rel="stylesheet" href="{{ asset('web/vendors/feather/feather.css') }}">
        <link rel="stylesheet" href="{{ asset('web/vendors/ti-icons/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('web/vendors/css/vendor.bundle.base.css') }}">
        <link rel="stylesheet" href="{{ asset('web/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
        <link rel="stylesheet" href="{{ asset('web/vendors/ti-icons/css/themify-icons.css') }}">
        <link rel="stylesheet" type="{{ asset('web/text/css" href="js/select.dataTables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('web/css/vertical-layout-light/style.css') }}">
		<link href="{{ asset('web/css/toastr.min.css?v=1.0') }}" rel="stylesheet">
        <link rel="icon" href="{{ asset('images/logo.png') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://kit.fontawesome.com/8a42449199.js" crossorigin="anonymous"></script>
        @yield('styles')
    </head>
    <body>
        <div class="container-scroller">
        @include('user.layouts.header')
            <div class="container-fluid page-body-wrapper">
                @include('user.layouts.sidebar')
                <div class="main-panel">
                    @yield('content')
                    <!-- Footer-->
                    <footer class="py-5" style="background-color: #fefefe;">
                        <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; <script>document.write(new Date().getFullYear())</script> -Lost & Found</div></div>
                    </footer>
                </div>
            </div>
        </div>


        <x-sweet-alert/>

        <script src="{{ asset('web/vendors/js/vendor.bundle.base.js') }}"></script>
        <script src="{{ asset('web/vendors/chart.js/Chart.min.js') }}"></script>
        <script src="{{ asset('web/js/off-canvas.js') }}"></script>
        <script src="{{ asset('web/js/hoverable-collapse.js') }}"></script>
        <script src="{{ asset('web/js/template.js') }}"></script>
        <script src="{{ asset('web/js/settings.js') }}"></script>
	    <script src="{{ asset('web/js/toastr.min.js') }}"></script>
        <script src="{{ asset('web/js/todolist.js') }}"></script>
        <script src="{{ asset('web/js/Chart.roundedBarCharts.js') }}"></script>
        <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
        @if ($errors->any())
            <script>
                @foreach ($errors->all() as $error)
                    toastr.error("{{ $error }}");
                @endforeach
            </script>
        @endif
        @stack('scripts')
        <script>
            window.alert = function() {
                // This empty function will suppress all alerts
            };
            new DataTable('#attendee-table', {
                dom: 'Bfrtip',
                buttons: [
                ]
            });
        </script>
    </body>
</html>
