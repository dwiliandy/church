<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        {{ env('APP_NAME') }} | {{ $title }}
    </title>
    <link rel="icon" href="{{ asset('storage/' . DB::table('web_settings')->first()->logo) }}">
  {{-- Bootstrap --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link href="{{ asset('template/frontend') }}/css/navbar.css" rel="stylesheet">
  <link href="{{ asset('template/frontend') }}/css/style.css" rel="stylesheet">
  <link href="{{ asset('template/frontend') }}/css/animation.css" rel="stylesheet">
      @stack('css')
</head>
<body id="page-top">
  @include('layouts.frontend.navbar')
  @yield('content')
  @include('layouts.frontend.footer')
  {{-- Bootstrap --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  {{-- Ajax --}}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })

  $(window).scroll(function () {
    var navbar = document.getElementById("navbar");
    if ($(this).scrollTop() > 60) {
      navbar.classList.remove("bg-purple");
      navbar.classList.add("bg-trans");
    } else {
      navbar.classList.add("bg-purple");
      navbar.classList.remove("bg-trans");
    }
  });
  
  function reveal() {
  var reveals = document.querySelectorAll(".reveal");

  for (var i = 0; i < reveals.length; i++) {
    var windowHeight = window.innerHeight;
    var elementTop = reveals[i].getBoundingClientRect().top;
    var elementVisible = 150;

    if (elementTop < windowHeight - elementVisible) {
      reveals[i].classList.add("active");
    } else {
      reveals[i].classList.remove("active");
    }
  }
}

window.addEventListener("scroll", reveal);

</script>

@stack('js')
</body>
</html>