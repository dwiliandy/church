{{-- <nav class="navbar navbar-expand-lg pb-3 p-lg-0 sticky-top" data-bs-theme="dark" style="background-color:#552075"> --}}
<nav id="navbar" class="navbar navbar-expand-lg pb-3 p-lg-0 sticky-top bg-purple" data-bs-theme="dark" >
  <div class="container">
    <a class="navbar-brand" id="logo" href="#">
      <img  src="{{ asset('images') }}/navbar-icon.png" alt="" style="max-height: 60px">
      {{-- <h3 class="text-center">KGPM PNIEL <br>KAWANGKOAN</h3> --}}
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse py-3" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item mx-auto">
          <a class="nav-link {{ Request::routeIs('homepage') ? 'active' : '' }}" aria-current="page" href="{{ route('homepage') }}">Beranda</a>
        </li>
        <li class="nav-item mx-auto">
          <a class="nav-link" href="#">Struktur Organisasi</a>
        </li>
        <li class="nav-item mx-auto dropdown">
          <a class="nav-link dropdown-toggle text-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span >Konten</span>
          </a>
          <ul class="dropdown-menu w-100">
            <li><a class="dropdown-item" href="#">Renungan</a></li>
            <li><a class="dropdown-item active" href="#">Artikel</a></li>
          </ul>
        </li>
        <li class="nav-item mx-auto">
          <a class="nav-link {{ Request::routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Kontak</a>
        </li>
        <li class="nav-item mx-auto">
          <a class="nav-link" href="#contact_us">Tentang</a>
        </li>
      </ul>
    </div>
  </div>
</nav>