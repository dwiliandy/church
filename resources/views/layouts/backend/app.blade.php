<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
      @if (DB::table('web_settings')->first()->website_name == NULL)
        {{ env('APP_NAME') }} | {{ $title }}
      @else
        {{ DB::table('web_settings')->first()->website_name }} | {{ $title }}
      @endif
    </title>

    <link rel="icon" href="{{ asset('storage/' . DB::table('web_settings')->first()->logo) }}">

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
    {{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    @livewireStyles
    <link rel="stylesheet" href="{{ asset('backend/datatable.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/style.css') }}">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Select2-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @stack('css')
</head>

<body id="page-top">

    <div id="wrapper">
        @include('layouts.backend.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('layouts.backend.topbar')
                @yield('content')
            </div>
            @include('layouts.backend.footer')
        </div>
    </div>


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
<!-- Select2-->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('template/backend') }}/js/sb-admin-2.min.js"></script>

<script src="{{ asset('template/backend') }}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('template/backend') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('template/backend') }}/js/demo/datatables-demo.js"></script>
<script src="{{ asset('template/backend') }}/js/demo/datatables-language.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
  $(document).ready(function(){
    toastr.options = {
      "newestOnTop": true,
      "progressBar": true,
      "positionClass": "toast-bottom-right",
      "hideDuration": "2000",
    }
  });
</script>
@livewireScripts
<script>
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  // Enable Bootstrap tooltips on page load
  $('[data-toggle="tooltip"]').tooltip();

  // Ensure Livewire updates re-instantiate tooltips
  if (typeof window.Livewire !== 'undefined') {
    window.Livewire.hook('message.processed', (message, component) => {
        $('[data-toggle="tooltip"]').tooltip('dispose').tooltip();
    });
  }

</script>
<script>
  $(document).ready(function() {
    $(".amount").on("keyup", function(event ) {                  
      // When user select text in the document, also abort.
      var selection = window.getSelection().toString(); 
      if (selection !== '') {
          return; 
      }       
      // When the arrow keys are pressed, abort.
      if ($.inArray(event.keyCode, [38, 40, 37, 39]) !== -1) {
          return; 
      }       
      var $this = $(this);            
      // Get the value.
      var input = $this.val();            
      input = input.replace(/[\D\s\._\-]+/g, ""); 
      input = input?parseInt(input, 10):0; 
      $this.val(function () {
          return (input === 0)?"0":input.toLocaleString("id-ID"); 
      }); 
    });
  });
</script>
@stack('js')

</html>
