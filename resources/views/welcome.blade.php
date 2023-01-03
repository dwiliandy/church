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

<div id="contact_us" style="min-height: 100vh; background-color: rgba(255, 255, 255, 0.2)">
  <h1 class="text-center p-3 bold">HUBUNGI KAMI</h1>
  <div class="container">
    <div class="row">
      <div class="col-md-6 justify-content-center align-self-center">
        <h2 >GMIM Rut Sendangan</h2>
        Jl. Arjuna Utara No.35, RT.8/RW.1, <br>
        Duri Kepa, Kec. Kb. Jeruk, Kota Jakarta Barat <br>
        DKI Jakarta 11530, Indonesia
        <br>
        +62 813 2900 1097
      </div>
      <div class="col-md-6 justify-content-center align-self-center">
        <div class="map" style="height:400px;width:100%;background-color:blue"></div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
  
@endpush