@extends('layouts.auth.app',[
  'title' =>'Login'
])

@push('css')
<style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }

  .b-example-divider {
    height: 3rem;
    background-color: rgba(0, 0, 0, .1);
    border: solid rgba(0, 0, 0, .15);
    border-width: 1px 0;
    box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
  }

  .b-example-vr {
    flex-shrink: 0;
    width: 1.5rem;
    height: 100vh;
  }

  .bi {
    vertical-align: -.125em;
    fill: currentColor;
  }

  .nav-scroller {
    position: relative;
    z-index: 2;
    height: 2.75rem;
    overflow-y: hidden;
  }

  .nav-scroller .nav {
    display: flex;
    flex-wrap: nowrap;
    padding-bottom: 1rem;
    margin-top: -1px;
    overflow-x: auto;
    text-align: center;
    white-space: nowrap;
    -webkit-overflow-scrolling: touch;
  }
</style>
@endpush


@section('content')
  <main class="form-signin w-100 m-auto">
    <form method="POST" action="{{ route('login') }}">
    @csrf
       <img class="mb-4 img-fluid  mx-auto d-block" src="{{ asset('storage/' . DB::table('web_settings')->first()->logo) }}" alt="" width="200" height="200">
    @if ($errors->any())
      <div class="alert alert-danger border-left-danger" role="alert">
          {{ $errors->first() }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
      {{-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
      <h1 class="h3 mb-3 fw-normal">Selamat Datang</h1>

      <div class="row">
        <div class="col-md-12">
          <div class="form-floating">
            <input type="text" name="login" class="form-control " style="border-radius: 10px 10px 0 0" id="floatingInput" placeholder="Email/Username">
            <label for="floatingInput">Email/Username</label>
          </div>
          <div class="form-floating">
            <input type="password" name="password" class="form-control border-top-0" style="border-radius: 0 0 10px 10px" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
          </div>
        </div>
      </div>

      <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    </form>
  </main>
@endsection