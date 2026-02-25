@extends('layouts.backend.app', [
    'title' => 'Master Data Tahun',
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
					@if ($yearsCount == 0)
						<button class="btn btn-success" data-toggle="modal" data-target="#createModal">
							<i class="fas fa-plus"></i> Tambah Data
						</button>
					@else
						<button class="btn btn-success add-existing" data-toggle="modal" data-target="#createModalExisting">
							<i class="fas fa-plus"></i> Tambah Data
						</button>
					@endif
				</div>
			</div>
		</div>
		<div class="py-4">
			<div class="card shadow-sm border-0">
				<div class="card-body">
					{{ $dataTable->table(['class' => 'table table-hover table-bordered w-100']) }}
				</div>
			</div>
		</div>


		{{-- Create Modal --}}
		<div class="modal fade" id="createModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
			aria-labelledby="createModalLabel" aria-hidden="true">
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
		<div class="modal fade" id="createModalExisting" data-backdrop="static" data-keyboard="false" tabindex="-1"
			aria-labelledby="createModalLabel" aria-hidden="true">
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
		{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
		<script>
			$("#create").on("submit", function(e) {
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
						$('#years-table').DataTable().ajax.reload();
						toastr.success(response.success);
					}
				});
			});

			$("#create-existing").on("submit", function(e) {
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
						$('#years-table').DataTable().ajax.reload();
						toastr.success(response.success);
					}
				});
			});
		</script>
	@endpush
@endsection
