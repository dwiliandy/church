@extends('layouts.backend.app',[
    'title' =>'Kolom'
])

@push('css')
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
@endpush

@section('content')
  <div class="container mx-auto">
    <nav class="breadcrumb flex-col">
      <ol class="flex">
        <li class="breadcrumb-item "><a class="text-blue-500"href="#">Dashboard</a></li>
        <li class="breadcrumb-item active text-blue-500" aria-current="page"><span class="">Kolom<span></li>
      </ol>
      <h4 class="uppercase font-semibold tracking-normal text-2xl text-blue-500 font-sans">Data Kolom</h4>
    </nav>

    <div class="row">
      <div class="col-md-12">
        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#createModal">
          Ubah Data
        </button>
      </div>
    </div>
    <div class="py-3">
      <livewire:groups-table/>
    </div>
    

    {{-- Create Modal --}}
    <div class="modal fade" id="createModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title text-success" id="createModalLabel">Tambah/Hapus Kolom</h1>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="create">
              <div class="row">
                <div class="col-md-6 mt-3">
                  <div class="form-floating">
                  <label for="total">Jumlah</label>
                    <input type="number" min='1' name="total" class="form-control" id="total" placeholder="Jumlah">
                  </div>
                </div>
                <div class="col-md-6 mt-3">
                  <label for="type">Aksi</label>
                  <select  class="form-control"  name="type" id="type">
                    <option selected>Pilih : </option>
                    <option value="add">Tambah</option>
                    <option value="remove">Hapus</option>
                  </select>
                </div>
              </div>

              <div class="row justify-content-end mt-4">
                  <button type="button" class="btn btn-secondary px-4 m-2" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success px-4 m-2">Ubah</button>
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
      $('.toast').toast('show')
      $("#create").on("submit", function (e) {
        let formData = new FormData(this);
        e.preventDefault();
        $('.preloader').show();
        $.ajax({
          url: "{{ route('groups.store') }}",
          method: "POST",
          enctype: 'multipart/form-data',
          contentType: false,
          processData: false,
          data: formData,
          success: (response) => {
            $('#create').trigger("reset");
            $("#createModal").modal("hide");
            Livewire.emit('refreshLivewireDatatable');
            flash("success", "Data successfully added");
          }
        });
      });
    </script>
  @endpush
@endsection