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

  
    {{-- Create Modal --}}
    <div class="modal fade" id="createModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title text-success" id="createModalLabel">Tambah Data Transaksi</h1>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="create">
              <div class="row">
                <div class="col-12">
                  <label for="date" class="form-label">Tanggal Transaksi<span class="required"> *</span></label>
                  <input type="date" name="date" class="form-control" id="date" min='{{ $year_name }}-01-01' max='{{ $year_name }}-12-31'>
                  <span id="dateCreate" class="error-validation"></span>
                </div>
                <div class="col-12">
                  <label for="name" class="form-label">Tipe<span class="required"> *</span></label>
                  <select class="custom-select" name="type" id="type" onchange="chooseType(this.value)">
                    <option disabled selected>--Pilih--</option>  
                    <option value="Pemasukkan">Pemasukkan</option>
                    <option value="Pengeluaran">Pengeluaran</option>
                  </select>
                  <span id="typeCreate" class="error-validation"></span>
                </div>
              </div>
              <div class="row" id="paste_data"></div>

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
  @push('js')
  <script>
    function chooseType(data){
      year = '{{ $year }}';
      $.ajax({
        url: "/admin/get-finance-data/"+data+"/"+year,
        method: "GET",
        success: (response) => {
          $("#paste_data").html(response);

          $(".amount").on("keyup", function(event ) {                  
          // When user select text in the document, also abort.
          var selection = window.getSelection().toString(); 
          if (selection !== '') {
              return; 
          }       
          // When the arrow keys are pressed, abort.
          if ($.inArray(event.keyCode, [38, 40, 37, 39]) !== -1) {
              return; 
          }       
          var $this = $(this);            
          // Get the value.
          var input = $this.val();            
          input = input.replace(/[\D\s\._\-]+/g, ""); 
          input = input?parseInt(input, 10):0; 
          $this.val(function () {
              return (input === 0)?"0":input.toLocaleString("id-ID"); 
          }); 
        });
        }
      });
    }

    function resetCreate(){
      $('#create').trigger("reset");
      $('#dateCreate').css("visibility", "hidden");
      $('#date').removeClass("is-invalid");
      $('#typeCreate').css("visibility", "hidden");
      $('#type').removeClass("is-invalid");
      $('#finance_data_create').css("visibility", "hidden");
      $('#finance_data').removeClass("is-invalid");
      $('#totalCreate').css("visibility", "hidden");
      $('#total_data').removeClass("is-invalid");
    }

    $("#create").on("submit", function (e) {
      let formData = new FormData(this);
      year = '{{ $year }}';
      e.preventDefault();
      $('.preloader').show();
      $.ajax({
        url: "/admin/data-year/" + year + "/financials",
        method: "POST",
        enctype: 'multipart/form-data',
        contentType: false,
        processData: false,
        data: formData,
        success: (response) => {
          $("#createModal").modal("hide");
          Livewire.emit('refreshLivewireDatatable');
          toastr.success(response.success);
        },
        error: function (request, status, error) {
          if(request.responseJSON.errors.date != null){
            $('#dateCreate').css("visibility", "visible");
            $('#dateCreate').text(request.responseJSON.errors.date);
            $('#date').addClass("is-invalid");
          }else{
            $('#dateCreate').css("visibility", "hidden");
            $('#date').removeClass("is-invalid");
          }
          if(request.responseJSON.errors.type != null){
            $('#typeCreate').css("visibility", "visible");
            $('#typeCreate').text(request.responseJSON.errors.type);
            $('#type').addClass("is-invalid");
          }else{
            $('#typeCreate').css("visibility", "hidden");
            $('#type').removeClass("is-invalid");
          }
          if(request.responseJSON.errors.finance_data != null){
            $('#finance_data_create').css("visibility", "visible");
            $('#finance_data_create').text(request.responseJSON.errors.finance_data);
            $('#finance_data').addClass("is-invalid");
          }else{
            $('#finance_data_create').css("visibility", "hidden");
            $('#finance_data').removeClass("is-invalid");
          }
          if(request.responseJSON.errors.total_data != null){
            $('#totalCreate').css("visibility", "visible");
            $('#totalCreate').text(request.responseJSON.errors.total_data);
            $('#total_data').addClass("is-invalid");
          }else{
            $('#totalCreate').css("visibility", "hidden");
            $('#total_data').removeClass("is-invalid");
          }
        },
      });
    });
  </script>
  @endpush
@endsection