@extends('layouts.backend.app',[
    'title' =>'Users'
])

@push('css')
@endpush

@section('content')
  <div class="container mx-auto">
    <nav class="breadcrumb flex-col">
      <ol class="flex">
        <li class="breadcrumb-item "><a class="text-blue-500"href="#">Home</a></li>
        <li class="breadcrumb-item active text-blue-500" aria-current="page"><span class="">Users<span></li>
      </ol>
      <h4 class="uppercase font-semibold tracking-normal text-2xl text-blue-500 font-sans">Users</h4>
    </nav>

    <div class="row">
      <div class="col-md-12">
        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#createModal" onclick="resetCreate()">
          Tambah Data
        </button>
      </div>
    </div>
    <div class="py-3">
      <livewire:users-table/>
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
                    <label for="name" class="form-label">Nama<span class="required"> *</span></label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Nama">
                    <span id="nameCreate" class="error-validation"></span>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <label for="name" class="form-label">Username<span class="required"> *</span></label>
                    <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                    <span id="usernameCreate" class="error-validation"></span>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <label for="name" class="form-label">Email<span class="required"> *</span></label>
                    <input type="text" name="email" class="form-control" id="email" placeholder="Email">
                    <span id="emailCreate" class="error-validation"></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <label for="name" class="form-label">Kata Sandi<span class="required"> *</span></label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <label for="name" class="form-label">Konfirmasi Kata Sandi<span class="required"> *</span></label>
                    <input type="password" name="password_confirmation" class="form-control" id="password" placeholder="Password">
                  </div>
                </div>
                <div class="col-md-12">
                  <span id="passwordCreate" class="error-validation"></span>
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
          url: "{{ route('users.store') }}",
          method: "POST",
          enctype: 'multipart/form-data',
          contentType: false,
          processData: false,
          data: formData,
          success: (response) => {
            $('#create').trigger("reset");
            $("#createModal").modal("hide");
            Livewire.emit('refreshLivewireDatatable');
            toastr.success(response.success);
          },
          error: function (request, status, error) {
            if(request.responseJSON.errors.name != null){
              $('#nameCreate').css("visibility", "visible");
              $('#nameCreate').text(request.responseJSON.errors.name);
              $('#name').addClass("is-invalid");
            }else{
              $('#nameCreate').css("visibility", "hidden");
              $('#name').removeClass("is-invalid");
            }
            if(request.responseJSON.errors.username != null){
              $('#usernameCreate').css("visibility", "visible");
              $('#usernameCreate').text(request.responseJSON.errors.username);
              $('#username').addClass("is-invalid");
            }else{
              $('#usernameCreate').css("visibility", "hidden");
              $('#username').removeClass("is-invalid");
            }
            if(request.responseJSON.errors.email != null){
              $('#emailCreate').css("visibility", "visible");
              $('#emailCreate').text(request.responseJSON.errors.email);
              $('#email').addClass("is-invalid");
            }else{
              $('#emailCreate').css("visibility", "hidden");
              $('#email').removeClass("is-invalid");
            }
            if(request.responseJSON.errors.password != null){
              $('#passwordCreate').css("visibility", "visible");
              $('#passwordCreate').text(request.responseJSON.errors.password);
              $('#password').addClass("is-invalid");
            }else{
              $('#passwordCreate').css("visibility", "hidden");
              $('#password').removeClass("is-invalid");
            }
          },
         
        });
      });

      function resetCreate(){
      $('#create').trigger("reset");
      $('#nameCreate').css("visibility", "hidden");
      $('#name').removeClass("is-invalid");
      $('#usernameCreate').css("visibility", "hidden");
      $('#username').removeClass("is-invalid");
      $('#emailCreate').css("visibility", "hidden");
      $('#email').removeClass("is-invalid");
      $('#passwordCreate').css("visibility", "hidden");
      $('#password').removeClass("is-invalid");
    }
    </script>
  @endpush
@endsection