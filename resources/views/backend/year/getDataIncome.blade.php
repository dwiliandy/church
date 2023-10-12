@extends('layouts.backend.app',[
    'title' =>'Data Pemasukkan'
])

@push('css')
@endpush

@section('content')
  <div class="container mx-auto">
    <nav class="breadcrumb flex-col">
      <div class="row">
        <div class="col-8">
          <ol class="flex">
            <li class="breadcrumb-item "><a class="text-blue-500"href="#">Home</a></li>
            <li class="breadcrumb-item" aria-current="page"><a class="text-blue-500"href="{{ route('year-data') }}">Data Tahun</a></li>
            <li class="breadcrumb-item active text-blue-500" aria-current="page"><span class="">Data Pemasukkan Tahunan<span></li>
          </ol>
          <h4 class="uppercase font-semibold tracking-normal text-2xl text-blue-500 font-sans">Pemasukkan Tahunan Tahun {{ $year->name }}</h4>
        </div>
        <div class="col-4 d-flex justify-content-end">
          <a href="{{ route('financials.index',['year' => base64_encode($year->id)]) }}" class="btn btn-breadcrumb m-2 d-flex justify-content-center align-items-center bg-green-600 text-white hover:bg-green-800"><small>Data Keuangan Tahun {{ $year->name }}</small></a>
          <a href="{{ route('get-data-expenditures',['id' => base64_encode($year->id)]) }}" class="btn btn-breadcrumb m-2 d-flex justify-content-center align-items-center bg-red-600 text-white hover:bg-red-800"><small>Data Pengeluaran Tahun {{ $year->name }}</small></a>
        </div>
      </div>
    </nav>
    
    <div class="py-3">
      <livewire:incomes-data-table :year="$year"/>
    </div>

  </div>

  @push('js')
  @endpush
@endsection