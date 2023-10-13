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
    <div id="data">
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
            <label for="date" class="form-label">Kode Pengeluaran</label>
            <p class="form-control">{{ $financial->expenditure_year->expenditure->unique_id }}</p>
          </div>
          <div class="col-md-6 p-1">
            <label for="date" class="form-label">Pembebanan Anggaran</label>
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
      <div class="row mx-4">
        <div class="col-md-6 p-1">
          @if ($financial->status == 'Menunggu')
            <p>Status : <span class='p-2 bg-white rounded-md'>{{ $financial->status }}</span></p>
          @elseif ($financial->status == 'Ditolak')
            <p>Status : <span class='p-2 bg-red-600 text-white rounded-md'>{{ $financial->status }}</span></p>
            @else
            <p>Status : <span class='p-2 bg-green-500 text-white rounded-md'>{{ $financial->status }}</span></p>
          @endif
        </div>
      </div>
    </div>

    <div class="row datatable m-4" id="datatable">
      <div class="col-12">
        <livewire:approval-details-table :financial_id="$financial->id"  hide-pagination />
      </div>
    </div>
  </div>

  @if ($can_action == true)
  <div id="floating-button" class="floating d-flex justify-content-center align-items-center">
    <button type="submit" data-toggle="modal" data-target="#approve" class="button-floating-approve m-2" data-toggle="tooltip" data-placement="top" title="Setujui"><i class="fas fa-check"></i></button>
    <button type="submit" data-toggle="modal" data-target="#disapprove" class="button-floating-disapprove m-2" data-toggle="tooltip" data-placement="top" title="Tolak" onclick="(resetDelete())"><i class="fas fa-times"></i></button>
  </div>
  @endif

  {{-- Approve Modal --}}
  <div class="modal fade" id="approve" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form id="create">
        <div class="modal-content text-green-600">
          <div class="modal-body">
            <div class="p-5">
              <h2 class="text-center text-green-600 text-lg">Apakah anda yakin menyetujui transaksi ini?</h2>
              <h2 class="text-center text-gray-700 text-xs font-bold">(Anda tidak dapat mengubah aksi setelah menekan tombol OK)</h2>
              <input type="hidden" name="finance" id="finance" value={{ base64_encode($financial->id) }}>
            </div>
          </div>
          <div class="modal-footer d-block">
            <div class="row d-flex justify-content-center">
              <div class="col-4">
                <button type="button" class="btn bg-red-500 hover:bg-red-700 text-white w-full" data-dismiss="modal">Tutup</button>
              </div>
              <div class="col-4">
                <button type="button" class="btn bg-green-500 hover:bg-green-700 text-white w-full btn-approve">OK</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  {{-- End Modal --}}

  {{-- Disapprove Modal --}}
  <div class="modal fade" id="disapprove" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content text-red-600">
        <div class="modal-body">
          <form id="delete">
            <div class="p-5">
              <h2 class="text-center text-red-600 text-lg">Apakah anda yakin menolak transaksi ini?</h2>
              <h2 class="text-center text-gray-700 text-xs font-bold">(Anda tidak dapat mengubah aksi setelah menekan tombol OK)</h2>
              <div class="row">
                <div class="col-md-12 mt-5 mx-auto">
                  <h2 class="text-center text-red-600 text-md p-3">Alasan Ditolak<span class="required"> *</span></h2>
                  <textarea class="form-control" name="comment"  id="comment" rows="3"></textarea>
                  <span id="commentValidation" class="error-validation"></span>
                </div>
              </div>
              <input type="hidden" name="finance_disapprove" id="finance_disapprove" value={{ base64_encode($financial->id) }}>
            </div>
            <div class="row d-flex justify-content-center">
              <div class="col-4">
                <button type="button" class="btn bg-red-500 hover:bg-red-700 text-white w-full" data-dismiss="modal">Tutup</button>
              </div>
              <div class="col-4">
                <button type="button" class="btn bg-green-500 hover:bg-green-700 text-white w-full btn-disapprove">OK</button>
              </div>
            </div>
          </form>
        </div>
        </div>
    </div>
  </div>
  {{-- End Modal --}}

  @push('js')
  <script>
    $(".btn-approve").on("click", function (e) {
      var formData = new FormData(document.querySelector('#create'))
      $.ajax({
        url: "/admin/financial/approve",
        method: "POST",
        enctype: 'multipart/form-data',
        contentType: false,
        processData: false,
        data: formData,
        success: (response) => {
          $("#approve").modal("hide");
          $('#accordionSidebar').load(location.href + " #accordionSidebar > *");
          $('#floating-button').load(location.href + " #floating-button > *");
          $('#data').load(location.href + " #data > *");
          Livewire.emit('refreshLivewireDatatable');
          toastr.success(response.success);
        }
      });
    });

    function resetDelete(){
      $('#delete').trigger("reset");
      $('#commentValidation').css("visibility", "hidden");
      $('#comment').removeClass("is-invalid");
    }

    $(".btn-disapprove").on("click", function (e) {
      var formData = new FormData(document.querySelector('#delete'))
      e.preventDefault();
      $.ajax({
        url: "/admin/financial/disapprove",
        method: "POST",
        enctype: 'multipart/form-data',
        contentType: false,
        processData: false,
        data: formData,
        success: (response) => {
          $("#disapprove").modal("hide");
          $('#accordionSidebar').load(location.href + " #accordionSidebar > *");
          $('#floating-button').load(location.href + " #floating-button > *");
          $('#data').load(location.href + " #data > *");
          Livewire.emit('refreshLivewireDatatable');
          toastr.success(response.success);
        },
        error: function (request, status, error) {
          $('#commentValidation').css("visibility", "visible");
          $('#commentValidation').text(request.responseJSON.errors.comment);
          $('#comment').addClass("is-invalid");
        }
      });
    });
  </script>
  @endpush
@endsection