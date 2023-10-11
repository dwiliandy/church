@extends('layouts.backend.app',[
    'title' =>'Persetujuan'
])

@push('css')
@endpush

@section('content')
  <div class="container mx-auto">
    <nav class="breadcrumb flex-col">
      <ol class="flex">
        <li class="breadcrumb-item "><a class="text-blue-500"href="#">Home</a></li>
        <li class="breadcrumb-item active text-blue-500" aria-current="page"><span class="">Persetujuan<span></li>
      </ol>
      <h4 class="uppercase font-semibold tracking-normal text-2xl text-blue-500 font-sans">Persetujuan</h4>
    </nav>

    <div class="row">
    </div>
    <div class="py-3">
      <livewire:approvals-table />
    </div>
    
  </div>

  @push('js')
  <script>
  </script>
    <script>

      // Create New Data
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
              $("#createModal").modal("hide");
              $('#add').load(location.href + " #add > *");
              Livewire.emit('refreshLivewireDatatable');
              toastr.success(response.success);
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
        
      // Edit Data
        $('body').on("click", ".btn-edit", function () {
          var id = $(this).attr("data-id");
          $('.preloader').show();
          $.ajax({
            url: "/admin/expenditures/" + id + "/edit",
            method: "GET",
            success: function (response) {
              $("#id").val(id);
              $("#edit_unique_id").val(response.unique_id);
              $("#edit_name").val(response.name);
              $("#editModal").modal("show");
              resetUpdate();
            }
          });
        });

        $("#edit").on("submit", function (e) {
          e.preventDefault();
          var id = $("#id").val();
          $('.preloader').show();
          $.ajax({
            url: "/admin/expenditures/" + id,
            method: "PATCH",
            data: $(this).serialize(),
            success: function (data) {
              $("#editModal").modal("hide");
              Livewire.emit('refreshLivewireDatatable');
              toastr.success(data.success);
            },
            error: function (request, status, error) {
              if(request.responseJSON.errors.unique_id != null){
                $('#uniqueIdEdit').css("visibility", "visible");
                $('#uniqueIdEdit').text(request.responseJSON.errors.unique_id);
                $('#edit_unique_id').addClass("is-invalid");
              }else{
                $('#uniqueIdEdit').css("visibility", "hidden");
                $('#edit_unique_id').removeClass("is-invalid");
              }
              if(request.responseJSON.errors.name != null){
                $('#nameEdit').css("visibility", "visible");
                $('#nameEdit').text(request.responseJSON.errors.name);
                $('#edit_name').addClass("is-invalid");
              }else{
                $('#nameEdit').css("visibility", "hidden");
                $('#edit_name').removeClass("is-invalid");
              }
            },
          });
        });

        function resetUpdate(){
          $('#update').trigger("reset");
          $('#uniqueIdEdit').css("visibility", "hidden");
          $('#edit_unique_id').removeClass("is-invalid");
          $('#nameEdit').css("visibility", "hidden");
          $('#edit_name').removeClass("is-invalid");
          
        }

      // Delete Data
        $('body').on("click", ".btn-delete", function () {
          $("#deleteModal").modal("show");
          var id = $(this).attr('data-id');
          $('.btn-destroy').attr("data-id",id);
        });

        $('body').on("click", ".btn-destroy", function () {
          var id = $(this).attr('data-id');
          $.ajax({
            url: "/admin/expenditures/" + id,
            method: "DELETE",
            success: function (response) {
              $("#deleteModal").modal("hide");
              Livewire.emit('refreshLivewireDatatable');
              toastr.error(response.success);
            }
          });
        }); 

    </script>
  @endpush
@endsection