@extends('layouts.backend.app',[
    'title' =>'Admin Dashboard'
])

@push('css')
    <link rel="stylesheet" href="{{ asset('template/backend/css/dashboard-card.css') }}">
@endpush

@section('content')
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  </div>
  <div class="row">
    <div class="col-md-12">
      <h2 class="text-center border-bottom">MASTER DATA</h2>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6 py-2">
      <a href="{{ route('users.index') }}">
        <div class="card card-dashboard" >
          <div class="card-body text-center">
            <i class="fas fa-user-cog fa-2x"></i>
            <h5 class="m-0 p-0">Admin</h5>
          </div>
        </div>
      </a>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6 py-2">
      <a href="\">
        <div class="card card-dashboard" >
          <div class="card-body text-center">
            <i class="fas fa-users fa-2x"></i>
            <h5 class="m-0 p-0">Users</h5>
          </div>
        </div>
      </a>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6 py-2">
      <a href="\">
        <div class="card card-dashboard" >
          <div class="card-body text-center">
            <i class="fas fa-users fa-2x"></i>
            <h5 class="m-0 p-0 ">Users</h5>
          </div>
        </div>
      </a>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6 py-2">
      <a href="\">
        <div class="card card-dashboard" >
          <div class="card-body text-center">
            <i class="fas fa-users fa-2x"></i>
            <h5 class="m-0 p-0">Users</h5>
          </div>
        </div>
      </a>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6 py-2">
      <a href="\">
        <div class="card card-dashboard" >
          <div class="card-body text-center">
            <i class="fas fa-users fa-2x"></i>
            <h5 class="m-0 p-0">Users</h5>
          </div>
        </div>
      </a>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6 py-2">
      <a href="\">
        <div class="card card-dashboard" >
          <div class="card-body text-center">
            <i class="fas fa-users fa-2x"></i>
            <h5 class="m-0 p-0">Users</h5>
          </div>
        </div>
      </a>
    </div>
  </div>
</div>
@endsection
