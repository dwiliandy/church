@extends('layouts.backend.app',[
    'title' =>'Keuangan'
])

@push('css')
@endpush

@section('content')
  <div class="container mx-auto">
    <nav class="breadcrumb flex-col">
      <ol class="flex">
        <li class="breadcrumb-item "><a class="text-blue-500"href="#">Home</a></li>
        <li class="breadcrumb-item" aria-current="page"><a class="text-blue-500"href="{{ route('year-data') }}">Data Tahun</a></li>
        <li class="breadcrumb-item active text-blue-500" aria-current="page"><span class="">Keuangan<span></li>
      </ol>
      <h4 class="uppercase font-semibold tracking-normal text-2xl text-blue-500 font-sans">Data Keuangan Tahun {{ $year_name }}</h4>
    </nav>

    <div class="row">
      <div class="col-md-12">
        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#createModal" onclick="resetCreate()">
          Tambah Data
        </button>
      </div>
    </div>
    <div class="py-3">
      <livewire:financials-table :year="$year"/>
    </div>
  </div>

  @push('js')
  <script>
  </script>
  @endpush
@endsection