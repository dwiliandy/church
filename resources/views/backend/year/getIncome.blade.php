@extends('layouts.backend.app',[
    'title' =>'Data Rencana Pemasukkan'
])

@push('css')
@endpush

@section('content')
  <div class="container mx-auto">
    <nav class="breadcrumb flex-col">
      <ol class="flex">
        <li class="breadcrumb-item "><a class="text-blue-500"href="#">Home</a></li>
        <li class="breadcrumb-item" aria-current="page"><a class="text-blue-500"href="{{ route('years.index') }}">Master Data Tahun</a></li>
        <li class="breadcrumb-item active text-blue-500" aria-current="page"><span class="">Rencana Pemasukkan Tahunan<span></li>
      </ol>
      <h4 class="uppercase font-semibold tracking-normal text-2xl text-blue-500 font-sans">Rencana Pemasukkan Tahunan</h4>
    </nav>
    
    <div class="row">
      <div class="container">
        <form id="update" class="mb-5">
          @foreach ( $year->income_years as $income_year)
          <div class="form-group">
            <div class="row">
              <div class="col-md-4 col-6">
                <input type="text" class="form-control" readonly value="{{ $income_year->income->unique_id }} - {{ $income_year->income->name }}">
              </div>
              <div class="col-md-8 col-6">
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text">Rp.</div>
                  </div>
                  <input type="text" class="form-control amount" name="data[{{ base64_encode($income_year->id) }}]" value="{{ Str::currency($income_year->target) }}">
                </div>
              </div>
            </div>
          </div>
          @endforeach
          <button type="submit" class="floating-button"><i class="fas fa-save"></i></button>
        </form>
      </div>
    </div>

  </div>

  @push('js')
  <script>
    $("#update").on("submit", function (e) {
        let formData = new FormData(this);
        e.preventDefault();
        $.ajax({
          url: "{{ route('update-incomes') }}",
          method: "POST",
          enctype: 'multipart/form-data',
          contentType: false,
          processData: false,
          data: formData,
          success: (response) => {
            $('#add').load(location.href + " #create > *");
            toastr.success(response.success);
          }
        });
      });
  </script>
  @endpush
@endsection