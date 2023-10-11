@extends('layouts.backend.app',[
    'title' =>'Detail Pengajuan'
])

@push('css')
@endpush

@section('content')
  <div class="container mx-auto">
    <nav class="breadcrumb flex-col">
      <ol class="flex">
        <li class="breadcrumb-item "><a class="text-blue-500"href="#">Home</a></li>
        <li class="breadcrumb-item" aria-current="page"><a class="text-blue-500"href="{{ route('submissions') }}">Pengajuan</a></li>
        <li class="breadcrumb-item active text-blue-500" aria-current="page"><span class="">Detail Pengajuan<span></li>
      </ol>
      <h4 class="uppercase font-semibold tracking-normal text-2xl text-blue-500 font-sans">Detail Pengajuan</h4>
    </nav>
  </div>

  <div class="container mx-auto">
    @if ($financial->type == 'Pemasukkan')
      <div class="row m-4">
        <div class="col-md-6 p-1">
          <label for="date" class="form-label">Tipe Pengajuan</label>
          <p class="form-control">{{ $financial->type }}</p>
        </div>
        <div class="col-md-6 p-1">
          <label for="date" class="form-label">Tanggal Pengajuan</label>
          <p class="form-control">{{ Carbon\Carbon::parse($financial->date)->translatedFormat('d F Y'); }}</p>
        </div>
        <div class="col-md-6 p-1">
          <label for="date" class="form-label">Kode Pemasukkan</label>
          <p class="form-control">{{ $financial->income_year->income->unique_id }}</p>
        </div>
        <div class="col-md-6 p-1">
          <label for="date" class="form-label">Uraian Pemasukkan</label>
          <p class="form-control">{{ $financial->income_year->income->name }}</p>
        </div>
        <div class="col-md-6 p-1">
          <label for="date" class="form-label">Tahun Anggaran</label>
          <p class="form-control">{{ $financial->income_year->year->name }}</p>
        </div>
        <div class="col-md-6 p-1">
          <label for="date" class="form-label">Total Pengajuan</label>
          <p class="form-control">{{ Str::currency((int)$financial->total_income) }}</p>
        </div>
        <div class="col-md-6 p-1">
          <label for="date" class="form-label">Pengaju</label>
          <p class="form-control">{{ $financial->user->name }}</p>
        </div>
        <div class="col-md-6 p-1">
          <label for="date" class="form-label">Tanggal Pengajuan</label>
          <p class="form-control">{{ Carbon\Carbon::parse($financial->created_at)->translatedFormat('d F Y'); }}</p>
        </div>
        <div class="col-12 p-1">
          <label for="description" class="form-label">Deskripsi</label>
          <textarea class="form-control" name="description" rows="3">{{ $financial->description }}</textarea>
        </div>
      </div>
    @else
      <div class="row m-4">
        <div class="col-md-6 p-1">
          <label for="date" class="form-label">Tipe Pengajuan</label>
          <p class="form-control">{{ $financial->type }}</p>
        </div>
        <div class="col-md-6 p-1">
          <label for="date" class="form-label">Tanggal Pengajuan</label>
          <p class="form-control">{{ Carbon\Carbon::parse($financial->date)->translatedFormat('d F Y'); }}</p>
        </div>
        <div class="col-md-6 p-1">
          <label for="date" class="form-label">Kode Pemasukkan</label>
          <p class="form-control">{{ $financial->expenditure_year->expenditure->unique_id }}</p>
        </div>
        <div class="col-md-6 p-1">
          <label for="date" class="form-label">Pembebanan Anggara</label>
          <p class="form-control">{{ $financial->expenditure_year->expenditure->name }}</p>
        </div>
        <div class="col-md-6 p-1">
          <label for="date" class="form-label">Tahun Anggaran</label>
          <p class="form-control">{{ $financial->expenditure_year->year->name }}</p>
        </div>
        <div class="col-md-6 p-1">
          <label for="date" class="form-label">Total Pengajuan</label>
          <p class="form-control">{{ Str::currency((int)$financial->total_expenditure) }}</p>
        </div>
        <div class="col-md-6 p-1">
          <label for="date" class="form-label">Pengaju</label>
          <p class="form-control">{{ $financial->user->name }}</p>
        </div>
        <div class="col-md-6 p-1">
          <label for="date" class="form-label">Tanggal Pengajuan</label>
          <p class="form-control">{{ Carbon\Carbon::parse($financial->created_at)->translatedFormat('d F Y'); }}</p>
        </div>
        <div class="col-12 p-1">
          <label for="description" class="form-label">Deskripsi</label>
          <textarea class="form-control" name="description" rows="3">{{ $financial->description }}</textarea>
        </div>
      </div>
    @endif

    <div class="row datatable m-4" id="datatable">
      <div class="col-12">
        <livewire:approval-details-table :financial_id="$financial->id"  hide-pagination />
      </div>
    </div>
  </div>

  @push('js')
  <script>
  </script>
  @endpush
@endsection