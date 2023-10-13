@extends('layouts.backend.app',[
    'title' =>'Keuangan'
])

@push('css')
@endpush

@section('content')
  <div class="container mx-auto">
    <nav class="breadcrumb flex-col">
      <div class="row">
        <div class="col-md-8">
          <ol class="flex">
            <li class="breadcrumb-item "><a class="text-blue-500"href="#">Home</a></li>
            <li class="breadcrumb-item" aria-current="page"><a class="text-blue-500"href="{{ route('year-data') }}">Data Tahun</a></li>
            <li class="breadcrumb-item active text-blue-500" aria-current="page"><span class="">Keuangan<span></li>
          </ol>
          <h4 class="uppercase font-semibold tracking-normal text-2xl text-blue-500 font-sans">Data Keuangan Tahun {{ $year_name }}</h4>
        </div>
        <div class="col-md-4 d-flex justify-content-end">
          <a href="{{ route('get-data-incomes',['id' => $year]) }}" class="btn btn-breadcrumb m-2 d-flex justify-content-center align-items-center bg-pink-600 text-white hover:bg-pink-800"><small>Pemasukkan Tahun {{ $year_name }}</small></a>
          <a href="{{ route('get-data-expenditures',['id' => $year]) }}" class="btn btn-breadcrumb m-2 d-flex justify-content-center align-items-center bg-red-600 text-white hover:bg-red-800"><small>Pengeluaran Tahun {{ $year_name }}</small></a>
        </div>
      </div>
    </nav>

    <div class="row">
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