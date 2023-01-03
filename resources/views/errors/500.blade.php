@extends('layouts.error',[
'title' =>'Halaman Tidak Ditemukan'
])

@section('content')
  <div class="error" data-text="500">500</div>
  <p class="lead text-gray-800 mb-5 text-center">Website Error</p>
  
  @auth
    <a href="{{ route('dashboard') }}">&larr; Kembali ke Admin Dashboard</a>
  @else
    <a href="{{ route('root') }}">&larr; Kembali ke Halaman Utama</a>
  @endauth
@endsection
