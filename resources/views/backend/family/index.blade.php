@extends('layouts.backend.app', [
    'title' => 'Master Data Keluarga',
])

@push('css')
@endpush

@section('content')
	<div class="container mx-auto">
		<nav class="breadcrumb flex-col">
			<ol class="flex">
				<li class="breadcrumb-item "><a class="text-blue-500"href="#">Home</a></li>
				<li class="breadcrumb-item active text-blue-500" aria-current="page"><span class="">Master Daftar Keluarga<span>
				</li>
			</ol>
			<h4 class="uppercase font-semibold tracking-normal text-2xl text-blue-500 font-sans">Daftar Keluarga</h4>
		</nav>

		<div class="row">
			<div class="col-md-12">
				<button class="btn btn-success" data-toggle="modal" data-target="#createModal" onclick="resetCreate()">
					<i class="fas fa-plus"></i> Tambah Data
				</button>
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
						<h1 class="modal-title text-success" id="createModalLabel">Tambah Data Keluarga</h1>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="create">
							<div class="row">
								<div class="col-md-12 mt-3">
									<div class="form-floating">
										<label>Nama Keluarga</label>
										<input type="text" name="name" class="form-control" placeholder="Nama Keluarga">
									</div>
								</div>
								<div class="col-md-12 mt-3">
									<div class="form-floating">
										<label>Kolom (Kepel)</label>
										<select name="group_id" class="form-control">
											@foreach (DB::table('groups_data')->get() as $group)
												<option value="{{ $group->id }}">{{ $group->name }}</option>
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
	</div>

	@push('js')
		{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
		<script>
			$("#create").on("submit", function(e) {
				let formData = new FormData(this);
				e.preventDefault();
				$('.preloader').show();
				$.ajax({
					url: "{{ route('families.store') }}",
					method: "POST",
					enctype: 'multipart/form-data',
					contentType: false,
					processData: false,
					data: formData,
					success: (response) => {
						$('#create').trigger("reset");
						$("#createModal").modal("hide");
						$('#families-table').DataTable().ajax.reload();
						toastr.success("Data Keluarga berhasil ditambahkan");
					}
				});
			});

			function resetCreate() {
				$('#create').trigger("reset");
			}
		</script>
	@endpush
@endsection
