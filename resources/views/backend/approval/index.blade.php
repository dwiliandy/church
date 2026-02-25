@extends('layouts.backend.app', [
    'title' => 'Persetujuan',
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
		<div class="py-4">
			<div class="card shadow-sm border-0">
				<div class="card-body">
					{{ $dataTable->table(['class' => 'table table-hover table-bordered w-100']) }}
				</div>
			</div>
		</div>
	</div>

	@push('js')
		{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
	@endpush
@endsection
