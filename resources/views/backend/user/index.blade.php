@extends('layouts.backend.app',[
    'title' =>'Admin Dashboard'
])

@push('css')
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
@endpush

@section('content')
  <div class="container mx-auto">
    <h1>Users</h1>
    <div class="py-3">
      <livewire:users-table/>
    </div>
  </div>
@endsection