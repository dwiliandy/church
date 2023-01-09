@extends('layouts.frontend.app',[
    'title' =>'Beranda'
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
{{-- Article dan Renungan --}}
<div id="content" class="py-4" style="min-height: 100vh;">
  <h1 class="text-center p-3 reveal fade-bottom" style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;font-weight:500">RENUNGAN DAN ARTIKEL</h1>
  <div class="container">
    <div class="row">
      <div class="col-md-6 px-5 border-end border-5 reveal fade-left">
          <h3 class="text-white text-center"><p class="d-inline p-2" style="background-color:#552075">ARTIKEL<p></h3>
          <img src="https://source.unsplash.com/WLUHO9A_xik/1600x900" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="py-2 text-center">Visi yang Baru</h5>
            <p class="text-center">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <p class="text-center"><a href="#">Read More ></a></p>
          </div>
          <div class="row border-top py-2">
            <div class="col-4">
              <img class="" src="https://source.unsplash.com/WLUHO9A_xik/1600x900" width="90px" height="90px" alt="">
            </div>
            <div class="col-8">
              <h5>Misi Penyelamatan</h5>
              <small>Some quick example text to build on the card title and make up the bulk of the card's cont...</small>
              <p><a href="#">Read More ></a></p>
            </div>
          </div>
          <div class="row border-top py-2">
            <div class="col-4">
              <img class="" src="https://source.unsplash.com/WLUHO9A_xik/1600x900" width="90px" height="90px" alt="">
            </div>
            <div class="col-8">
              <h5>Misi Penyelamatan</h5>
              <small>Some quick example text to build on the card title and make up the bulk of the card's cont...</small>
              <p><a href="#">Read More ></a></p>
            </div>
          </div>
          <div class="row border-top py-2">
            <div class="col-4">
              <img class="" src="https://source.unsplash.com/WLUHO9A_xik/1600x900" width="90px" height="90px" alt="">
            </div>
            <div class="col-8">
              <h5>Misi Penyelamatan</h5>
              <small>Some quick example text to build on the card title and make up the bulk of the card's cont...</small>
              <p><a href="#">Read More ></a></p>
            </div>
          </div>
          <div class="row border-top py-2">
            <div class="col-4">
              <img class="" src="https://source.unsplash.com/WLUHO9A_xik/1600x900" width="90px" height="90px" alt="">
            </div>
            <div class="col-8">
              <h5>Misi Penyelamatan</h5>
              <small>Some quick example text to build on the card title and make up the bulk of the card's cont...</small>
              <p><a href="#">Read More ></a></p>
            </div>
          </div>
      </div>
      <div class="col-md-6 px-5 border-start border-5 reveal fade-right">
        <h3 class="text-white text-center"><p class="d-inline p-2" style="background-color:#552075">RENUNGAN<p></h3>
          <img src="https://source.unsplash.com/WLUHO9A_xik/1600x900" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="py-2 text-center">Visi yang Baru</h5>
            <p class="text-center">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <p class="text-center"><a href="#">Read More ></a></p>
          </div>
          {{-- <div class="row border-top py-2">
            <div class="col-4">
              <img class="" src="https://source.unsplash.com/WLUHO9A_xik/1600x900" width="90px" height="90px" alt="">
            </div>
            <div class="col-8">
              <h5>Misi Penyelamatan</h5>
              <small>Some quick example text to build on the card title and make up the bulk of the card's cont...</small>
              <p><a href="#">Read More ></a></p>
            </div>
          </div> --}}
          <div class="row border-top py-2">
            <div class="col-4">
              <img class="" src="https://source.unsplash.com/WLUHO9A_xik/1600x900" width="90px" height="90px" alt="">
            </div>
            <div class="col-8">
              <h5>Misi Penyelamatan</h5>
              <small>Some quick example text to build on the card title and make up the bulk of the card's cont...</small>
              <p><a href="#">Read More ></a></p>
            </div>
          </div>
          <div class="row border-top py-2">
            <div class="col-4">
              <img class="" src="https://source.unsplash.com/WLUHO9A_xik/1600x900" width="90px" height="90px" alt="">
            </div>
            <div class="col-8">
              <h5>Misi Penyelamatan</h5>
              <small>Some quick example text to build on the card title and make up the bulk of the card's cont...</small>
              <p><a href="#">Read More ></a></p>
            </div>
          </div>
          <div class="row border-top py-2">
            <div class="col-4">
              <img class="" src="https://source.unsplash.com/WLUHO9A_xik/1600x900" width="90px" height="90px" alt="">
            </div>
            <div class="col-8">
              <h5>Misi Penyelamatan</h5>
              <small>Some quick example text to build on the card title and make up the bulk of the card's cont...</small>
              <p><a href="#">Read More ></a></p>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
{{-- End Article dan Renungan --}}

{{-- Pelayan --}}
<div id="pelayan" class="py-4" style="min-height: 100vh;background-color:#c298db">
  <div class="reveal fade-bottom">
    <h1 class="text-center pt-5 mb-0 pb-0" style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;font-weight:500">PENDETA & BPMJ</h1>
    <p class="text-center pt-0">Periode Pelayanan 2022-2027</p>
      <div id="ketua-jemaat reveal fade-bottom" class="row">
        <div class="col-md-12 text-center">
          <img class="rounded-circle border border-5" src="https://source.unsplash.com/WLUHO9A_xik/1600x900" width="150px" height="150px" alt="">
          <h3 class=" mb-0"> Pdt. Sapa wona, S.Th.</h3>
          <p>Ketua Jemaat GMIM RUT SENDANGAN</p>
        </div>
      </div>
      <div class="w-75 p-3 mx-auto" style="border-top:2px solid #552075"></div>
      <div id="pendeta-pelayan" class="row py-3 reveal fade-left">
        <div class="col-md-4 text-center">
          <img class="rounded-circle border border-5" src="https://source.unsplash.com/WLUHO9A_xik/1600x900" width="150px" height="150px" alt="">
          <h3 class=" mb-0"> Pdt. Sapa wona, S.Th.</h3>
          <p>Pendeta Pelayan GMIM RUT SENDANGAN</p>
        </div>
        <div class="col-md-4 text-center">
          <img class="rounded-circle border border-5" src="https://source.unsplash.com/WLUHO9A_xik/1600x900" width="150px" height="150px" alt="">
          <h3 class=" mb-0"> Pdt. Sapa wona, S.Th.</h3>
          <p>Pendeta Pelayan GMIM RUT SENDANGAN</p>
        </div>
        <div class="col-md-4 text-center">
          <img class="rounded-circle border border-5" src="https://source.unsplash.com/WLUHO9A_xik/1600x900" width="150px" height="150px" alt="">
          <h3 class=" mb-0"> Pdt. Sapa wona, S.Th.</h3>
          <p>Guru Agama GMIM RUT SENDANGAN</p>
        </div>
      </div>
      <div class="w-75 p-3 mx-auto" style="border-top:2px solid #76528b"></div>
      <div id="bpmj" class="row py-3 reveal fade-right">
        <div class="col-md-4 text-center mx-auto">
          <img class="rounded-circle border border-5" src="https://source.unsplash.com/WLUHO9A_xik/1600x900" width="150px" height="150px" alt="">
          <h3 class=" mb-0"> Pnt. Sapa sapa,S.Pd.</h3>
          <p>Sekretaris</p>
        </div>
        <div class="col-md-4 text-center mx-auto">
          <img class="rounded-circle border border-5" src="https://source.unsplash.com/WLUHO9A_xik/1600x900" width="150px" height="150px" alt="">
          <h3 class=" mb-0"> Dkn. Sapa sapa,S.Ak.</h3>
          <p>Bendahara</p>
        </div>
        <div class="col-md-4 text-center mx-auto">
          <img class="rounded-circle border border-5" src="https://source.unsplash.com/WLUHO9A_xik/1600x900" width="150px" height="150px" alt="">
          <h3 class=" mb-0"> Pnt. Sapa wona</h3>
          <p>Penatua P/KB</p>
        </div>
        <div class="col-md-4 text-center mx-auto">
          <img class="rounded-circle border border-5" src="https://source.unsplash.com/WLUHO9A_xik/1600x900" width="150px" height="150px" alt="">
          <h3 class=" mb-0"> Pnt. Sapa wona</h3>
          <p>Penatua W/KI</p>
        </div>
        <div class="col-md-4 text-center mx-auto">
          <img class="rounded-circle border border-5" src="https://source.unsplash.com/WLUHO9A_xik/1600x900" width="150px" height="150px" alt="">
          <h3 class=" mb-0"> Pnt. Sapa wona</h3>
          <p>Penatua Pemuda</p>
        </div>
        <div class="col-md-4 text-center mx-auto">
          <img class="rounded-circle border border-5" src="https://source.unsplash.com/WLUHO9A_xik/1600x900" width="150px" height="150px" alt="">
          <h3 class=" mb-0"> Pnt. Sapa wona</h3>
          <p>Penatua Remaja</p>
        </div>
        <div class="col-md-4 text-center mx-auto">
          <img class="rounded-circle border border-5" src="https://source.unsplash.com/WLUHO9A_xik/1600x900" width="150px" height="150px" alt="">
          <h3 class=" mb-0"> Pnt. Sapa wona</h3>
          <p>Penatua ASM</p>
        </div>
      </div>
  </div>
</div>
{{-- End Pelayan --}}
<div id="contact_us" class="my-4" style="min-height: 100vh">
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