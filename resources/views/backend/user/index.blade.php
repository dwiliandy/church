@extends('layouts.backend.app',[
    'title' =>'Admin Dashboard'
])

@push('css')
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
@endpush

@section('content')
  <div class="container mx-auto">
      <nav class="breadcrumb flex-col">
        <ol class="flex">
          <li class="breadcrumb-item "><a class="text-blue-500"href="#">Home</a></li>
          <li class="breadcrumb-item active text-blue-500" aria-current="page"><span class="">Library<span></li>
        </ol>
        <h4 class="uppercase font-semibold tracking-normal text-2xl text-blue-500 font-sans">User Data</h4>
      </nav>
    <div class="py-3">
      <livewire:users-table/>
    </div>
  </div>
@endsection