@extends('layouts.backend.app',[
    'title' =>'Data Pengeluaran'
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
            <li class="breadcrumb-item active text-blue-500" aria-current="page"><span class="">Data Pengeluaran Tahunan<span></li>
          </ol>
          <h4 class="uppercase font-semibold tracking-normal text-2xl text-blue-500 font-sans">Pengeluaran Tahun {{ $year->name }}</h4>
        </div>
        <div class="col-md-4 d-flex justify-content-end">
          <a href="{{ route('financials.index',['year' => base64_encode($year->id)]) }}" class="btn btn-breadcrumb m-2 d-flex justify-content-center align-items-center bg-green-600 text-white hover:bg-green-800"><small>Detail Keuangan Tahun {{ $year->name }}</small></a>
          <a href="{{ route('get-data-incomes',['id' => base64_encode($year->id)]) }}" class="btn btn-breadcrumb m-2 d-flex justify-content-center align-items-center bg-pink-600 text-white hover:bg-pink-800"><small>Pemasukkan Tahun {{ $year->name }}</small></a>
        </div>
      </div>
    </nav>
    
    <div class="py-3">
      <livewire:expenditures-data-table :year="$year"/>
    </div>

  </div>

  @push('js')
  @endpush
@endsection