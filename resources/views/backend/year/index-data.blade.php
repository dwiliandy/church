@extends('layouts.backend.app',[
    'title' =>'Data Tahun'
])

@push('css')
@endpush

@section('content')
  <div class="container mx-auto">
    <nav class="breadcrumb flex-col">
      <ol class="flex">
        <li class="breadcrumb-item "><a class="text-blue-500"href="#">Home</a></li>
        <li class="breadcrumb-item active text-blue-500" aria-current="page"><span class="">Data Tahun<span></li>
      </ol>
      <h4 class="uppercase font-semibold tracking-normal text-2xl text-blue-500 font-sans">Data Tahun</h4>
    </nav>

    <div class="row">
      <div class="col-md-12">
      </div>
    </div>
    <div class="py-3">
      <livewire:years-data-table />
    </div>
  </div>

  @push('js')
  @endpush
@endsection