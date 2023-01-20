<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        {{ env('APP_NAME') }} | {{ $title }}
    </title>

    <link rel="icon" href="{{ asset('images') }}/icon.png">

    {{-- SB-admin --}}
    <link href="{{ asset('template/backend') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('template/backend') }}/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="{{ asset('template/backend') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="{{ asset('template/backend') }}/css/style.css" rel="stylesheet">

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @livewireStyles
    {{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('backend/datatable.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/style.css') }}">
    @stack('css')
</head>

<body id="page-top">

    <div id="wrapper">
        @include('layouts.backend.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('layouts.backend.topbar')
                @include('components.flash-message')
                @yield('content')
            </div>
            @include('layouts.backend.footer')
        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>
<script src="{{ asset('template/backend') }}/vendor/jquery/jquery.min.js"></script>
<script src="{{ asset('template/backend') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script defer src="https://unpkg.com/alpinejs@3.10.5/dist/cdn.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="{{ asset('template/backend') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('template/backend') }}/js/sb-admin-2.min.js"></script>

<script src="{{ asset('template/backend') }}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('template/backend') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('template/backend') }}/js/demo/datatables-demo.js"></script>
<script src="{{ asset('template/backend') }}/js/demo/datatables-language.js"></script>
@livewireScripts
<script>
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
</script>
@stack('js')

</html>
