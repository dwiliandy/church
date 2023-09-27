@extends('layouts.backend.app',[
    'title' =>'Master Data Pengeluaran'
])

@push('css')
@endpush

@section('content')
  <div class="container mx-auto">
    <nav class="breadcrumb flex-col">
      <ol class="flex">
        <li class="breadcrumb-item "><a class="text-blue-500"href="#">Home</a></li>
        <li class="breadcrumb-item" aria-current="page"><span class="">Master Data<span></li>
        <li class="breadcrumb-item active text-blue-500" aria-current="page"><span class="">Pengeluaran<span></li>
      </ol>
      <h4 class="uppercase font-semibold tracking-normal text-2xl text-blue-500 font-sans">Data Pengeluaran</h4>
    </nav>

    <div class="row">
      <div class="col-md-12">
        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#createModal" onclick="resetCreate()">
          Tambah Data
        </button>
      </div>
    </div>
    <div class="py-3">
      <livewire:expenditures-table/>
    </div>
    

    {{-- Create Modal --}}
    <div class="modal fade" id="createModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title text-success" id="createModalLabel">Tambah Data Pengeluaran</h1>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="create">
              <div class="row">
                <div class="col-12">
                  <label for="unique_id" class="form-label">Kode Unik (Max:10 Karakter)<span class="required"> *</span></label>
                  <input type="text" name="unique_id" class="form-control" id="unique_id">
                  <span id="uniqueIdCreate" class="error-validation">asd</span>
                </div>
                <div class="col-12">
                  <label for="name" class="form-label">Nama<span class="required"> *</span></label>
                  <input type="text" name="name" class="form-control" id="name">
                  <span id="nameCreate" class="error-validation">asd</span>
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
          url: "{{ route('expenditures.store') }}",
          method: "POST",
          enctype: 'multipart/form-data',
          contentType: false,
          processData: false,
          data: formData,
          success: (response) => {
            console.log(response);
            $("#createModal").modal("hide");
            $('#add').load(location.href + " #add > *");
            Livewire.emit('refreshLivewireDatatable');
            flash("success", "Data successfully added");
          },
          error: function (request, status, error) {
            if(request.responseJSON.errors.unique_id != null){
              $('#uniqueIdCreate').css("visibility", "visible");
              $('#uniqueIdCreate').text(request.responseJSON.errors.unique_id);
              $('#unique_id').addClass("is-invalid");
            }else{
              $('#uniqueIdCreate').css("visibility", "hidden");
              $('#unique_id').removeClass("is-invalid");
            }
            if(request.responseJSON.errors.name != null){
              $('#nameCreate').css("visibility", "visible");
              $('#nameCreate').text(request.responseJSON.errors.name);
              $('#name').addClass("is-invalid");
            }else{
              $('#nameCreate').css("visibility", "hidden");
              $('#name').removeClass("is-invalid");
            }
          },
        });
      });

      function resetCreate(){
        $('#create').trigger("reset");
        $('#uniqueIdCreate').css("visibility", "hidden");
        $('#unique_id').removeClass("is-invalid");
        $('#nameCreate').css("visibility", "hidden");
        $('#name').removeClass("is-invalid");
        
      }

    </script>
  @endpush
@endsection