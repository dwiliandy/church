@extends('layouts.backend.app',[
    'title' =>'Pengaturan'
])

@push('css')
@endpush

@section('content')
  <div class="container mx-auto">
    <nav class="breadcrumb flex-col">
      <ol class="flex">
        <li class="breadcrumb-item "><a class="text-blue-500"href="#">Home</a></li>
        <li class="breadcrumb-item active text-blue-500" aria-current="page"><span class="">Pengaturan<span></li>
      </ol>
      <h4 class="uppercase font-semibold tracking-normal text-2xl text-blue-500 font-sans">Pengaturan</h4>
    </nav>
  </div>
  <h1 class="text-center uppercase font-semibold tracking-normal text-2xl text-blue-500 font-sans mt-4  ">Pengaturan Website</h1>
  <div class="p-2">
    <div class="card-body">
      <form role="form text-left" id="editForm">
        <button type="submit" class="floating-button"><i class="fas fa-save"></i></button>
        <div class="row border-data mb-4 pt-3 bg-white">
          <div class="form-group col-md-4">
            <label>Website Name <span class="required"> *</span></label>
            <div class="input-group mb-3">
              <input type="text" required class="form-control" name="web_name" 
              @if($setting != NULL)
                value="{{ $setting->website_name }}"
              @endif
              >
            </div>
          </div>
          <div class="form-group col-md-4">
            <label>Logo <span class="required"> *</span></label>
            <div class="input-group mb-3">
              <input type="file" id="logo" name="logo" class="custom-file-input">
              <label class="custom-file-label" for="logo" aria-describedby="inputGroupFileAddon02">Pilih file</label>
            </div>
          </div>
          <div class="col-md-4 pb-3 d-flex align-items-center">
            @if($setting->logo != NULL)
              <img src="{{ asset('storage/' . $setting->logo) }}" id="updatePreview" style="max-height: 100px;"  class="img-fluid rounded mx-auto d-block"/>
            @else
              <img id="updatePreview" style="max-height: 100px;"  class="img-fluid rounded mx-auto d-block"/>
            @endif
          </div>
          <div class="form-group col-md-4">
            <label>Approval Pemasukkan <span class="required">*</span></label>
            <select class="form-control select2" style="width: 100%" name="income_approver[]" multiple="multiple" id="income_approver">
              @foreach ($users as $user)
              <option value="{{base64_encode($user->id) }}">{{ $user->name }}</option>                    
              @endforeach
            </select>
          </div>
          <div class="form-group col-md-4">
            <label>Approval Pengeluaran <span class="required">*</span></label>
            <select class="form-control select2" style="width: 100%" name="expenditure_approver[]" multiple="multiple" id="expenditure_approver">
              @foreach ($users as $user)
              <option value="{{base64_encode($user->id) }}">{{ $user->name }}</option>                    
              @endforeach
            </select>
          </div>
        </div>
      </form>
    </div>
  </div>
  @push('js')
  <script>

    $(document).ready(function(){
      $.ajax({
        url: "/admin/get-selected-value/income_approver",
        method: "GET",
        success: function (data) {
          $("#income_approver").select2().val(data).trigger('change');
        }
      });

      $.ajax({
        url: "/admin/get-selected-value/expenditure_approver",
        method: "GET",
        success: function (data) {
          $("#expenditure_approver").select2().val(data).trigger('change');
        }
      });
    });

    logo.onchange = evt => {
      const [file] = logo.files
      if (file) {
        updatePreview.src = URL.createObjectURL(file)
      }
    }

    $("#editForm").on("submit", function (e) {
      e.preventDefault();
      let formData = new FormData(this);
      $.ajax({
        url: "/admin/update-setting",
        method: "POST",
        enctype: 'multipart/form-data',
        contentType: false,
        processData: false,
        data: formData,
        success: function (response) {
          toastr.success(response.success);
          window.setTimeout(function(){
            location.reload();
          }, 3000);
        }
      });
    });

    $(".select2").select2({
      placeholder: 'Select Data',
      defaultView: 'dropdown',
      allowClear: true  
    });
  </script>
  @endpush
@endsection