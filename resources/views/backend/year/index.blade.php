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
        <li class="breadcrumb-item active text-blue-500" aria-current="page"><span class="">Master Data Tahun<span></li>
      </ol>
      <h4 class="uppercase font-semibold tracking-normal text-2xl text-blue-500 font-sans">Data Tahun</h4>
    </nav>

    <div class="row">
      <div class="col-md-12">
        <div id="add">
          @if ($years == 0)
            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#createModal">
              Tambah Data
            </button>
          @else
            <button class="btn btn-success btn-sm add-existing"data-toggle="modal" data-target="#createModalExisting">
              Tambah Data
            </button>
          @endif
        </div>
      </div>
    </div>
    <div class="py-3">
      <livewire:years-table/>
    </div>
    

    {{-- Create Modal --}}
    <div class="modal fade" id="createModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title text-success" id="createModalLabel">Tambah Data Admin</h1>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="create">
              <div class="row">
                <div class="col-md-12 mt-3">
                  <div class="form-floating">
                    <select class="form-select form-control" aria-label="Default select example" name="name">
                      <option selected>Pilih Tahun</option>
                      @foreach ($year_data as $year)
                        <option value="{{ $year }}">{{ $year }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>

              <div class="row justify-content-end mt-4">
                  <button type="button" class="btn btn-secondary px-4 m-2" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success px-4 m-2">Buat</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    {{-- End Create Modal --}}

    {{-- Create Modal --}}
    <div class="modal fade" id="createModalExisting" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title text-success" id="createModalLabel">Tambah Data Admin</h1>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="create-existing">
              <div class="row">
                <div class="col-md-12 mt-3">
                  <div class="form-floating">
                    <div class="d-flex justify-content-center align-items-center">
                      <h2 style="color: green">Apakah anda yakin menambahkan data Tahun ?</h2>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row justify-content-end mt-4">
                  <button type="button" class="btn btn-secondary px-4 m-2" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success px-4 m-2">Buat</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    {{-- End Create Modal --}}
  </div>

  @push('js')
    <script>
      $("#create").on("submit", function (e) {
        let formData = new FormData(this);
        e.preventDefault();
        $('.preloader').show();
        $.ajax({
          url: "{{ route('years.store') }}",
          method: "POST",
          enctype: 'multipart/form-data',
          contentType: false,
          processData: false,
          data: formData,
          success: (response) => {
            $('#create').trigger("reset");
            $("#createModal").modal("hide");
            $('#add').load(location.href + " #add > *");
            Livewire.emit('refreshLivewireDatatable');
            toastr.success(response.success);
          }
        });
      });

      $("#create-existing").on("submit", function (e) {
        let formData = new FormData(this);
        e.preventDefault();
        $('.preloader').show();
        $.ajax({
          url: "{{ route('years.store') }}",
          method: "POST",
          enctype: 'multipart/form-data',
          contentType: false,
          processData: false,
          data: formData,
          success: (response) => {
            
            $("#createModalExisting").modal("hide");
            Livewire.emit('refreshLivewireDatatable');
            toastr.success(response.success);
          }
        });
      });

      
    </script>
  @endpush
@endsection