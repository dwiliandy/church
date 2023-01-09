@extends('layouts.frontend.app',[
    'title' =>'Kontak'
])

@section('content')

<div class="my-4" style="min-height: 100vh">
  <div class="container">
    <div class="row">
      <div class="col-md-6 justify-content-center align-self-center my-4">
        <h2 class="text-md-start text-center">GMIM Rut Sendangan</h2>
        <p class="text-md-start text-center">
          Jl. Raya Kawangkoan-Langowan, <br>
          Dekat Patung Tuhan Yesus Memberkati Kawangkoan <br>
          Sendangan Selatan, Kec. Kawangkoan, Kab. Minahasa <br>
          Kawangkoan 95692, Indonesia
          <br>
        </p>
        <div class="text-md-start text-center">
          <a class="px-2 text-muted" data-toggle="tooltip" title="Facebook" href="{{  URL::to('https://www.facebook.com/youthsionsentrum')  }}" target="_blank"><img width="40" height="40" src="{{ asset('images') }}/logo/fb.png" alt=""></a>
          <a class="px-2 text-muted" data-toggle="tooltip" title="Instagram" href="{{  URL::to('https://www.instagram.com/youthsionsentrum')  }}" target="_blank"><img width="40" height="40" src="{{ asset('images') }}/logo/ig.png" alt=""></a>
          <a class="px-2 text-muted" data-toggle="tooltip" title="Whatsapp" href="https://wa.me/6285825315899" target="_blank"><img width="40" height="40" src="{{ asset('images') }}/logo/wa.png" alt=""></a>
          <a class="px-2 text-muted" data-toggle="tooltip" title="Email" href="mailto:gmimrut@gmim.or.id" target="_blank"><img width="40" height="40" src="{{ asset('images') }}/logo/email.png" alt=""></a>
        </div>
      </div>
      <div class="col-md-6 justify-content-center align-self-center my-4">
        <iframe class="border border-white border-4" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3354.2923164986905!2d124.79055434509856!3d1.196565609711258!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3287413cb25e4b69%3A0x4faafd3954813234!2sGMIM%20Sion%20Sentrum%20Sendangan!5e0!3m2!1sid!2sid!4v1672802387306!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
@endpush