@extends('layouts.frontend.app',[
    'title' =>'Home'
])

@section('content')
{{-- Slider --}}
<div id="slider" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#slider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#slider" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#slider" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner" >
    <div class="carousel-item active">
      <img src="https://source.unsplash.com/WLUHO9A_xik/1600x900" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://source.unsplash.com/WLUHO9A_xik/1600x900" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://source.unsplash.com/WLUHO9A_xik/1600x900" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#slider" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#slider" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
{{-- End Slider --}}

<div id="contact_us" class="my-2" style="min-height: 100vh; background-color: rgba(255, 255, 255, 0.2)">
  <h1 class="text-center p-3 reveal fade-bottom" style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;font-weight:500">HUBUNGI KAMI</h1>
  <div class="container">
    <div class="row">
      <div class="col-md-6 justify-content-center align-self-center my-4 reveal fade-left">
        <h2 class="text-md-start text-center">GMIM Rut Sendangan</h2>
        <p class="text-md-start text-center">
          Jl. Raya Kawangkoan-Langowan, <br>
          Dekat Patung Tuhan Yesus Memberkati Kawangkoan <br>
          Sendangan Selatan, Kec. Kawangkoan, Kab. Minahasa <br>
          Kawangkoan 95692, Indonesia
          <br>
          Telepon : +62 813 2900 1097
          <br>
          Email : <a href="mailto:gmimrut@gmim.or.id">gmimrut@gmim.or.id</a>
        </p>
      </div>
      <div class="col-md-6 justify-content-center align-self-center my-4 reveal fade-right">
        <iframe class="border border-white border-4" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3354.2923164986905!2d124.79055434509856!3d1.196565609711258!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3287413cb25e4b69%3A0x4faafd3954813234!2sGMIM%20Sion%20Sentrum%20Sendangan!5e0!3m2!1sid!2sid!4v1672802387306!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
@endpush