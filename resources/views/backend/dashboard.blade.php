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
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>
  <div class="row">
    <div class="col-md-12">
      <h2 class="text-center border-bottom">MASTER DATA</h2>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 py-2">
      <a href="\">
        <div class="card" style="border-radius: 20px">
          <div class="card-body text-center">
            <i class="fas fa-users fa-2x"></i>
            <h5 class="m-0 p-0">Users</h5>
          </div>
        </div>
      </a>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 py-2">
      <a href="\">
        <div class="card" style="border-radius: 20px">
          <div class="card-body text-center">
            <i class="fas fa-users fa-2x"></i>
            <h5 class="m-0 p-0">Users</h5>
          </div>
        </div>
      </a>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 py-2">
      <a href="\">
        <div class="card" style="border-radius: 20px">
          <div class="card-body text-center">
            <i class="fas fa-users fa-2x"></i>
            <h5 class="m-0 p-0">Users</h5>
          </div>
        </div>
      </a>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 py-2">
      <a href="\">
        <div class="card" style="border-radius: 20px">
          <div class="card-body text-center">
            <i class="fas fa-users fa-2x"></i>
            <h5 class="m-0 p-0">Users</h5>
          </div>
        </div>
      </a>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 py-2">
      <a href="\">
        <div class="card" style="border-radius: 20px">
          <div class="card-body text-center">
            <i class="fas fa-users fa-2x"></i>
            <h5 class="m-0 p-0">Users</h5>
          </div>
        </div>
      </a>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 py-2">
      <a href="\">
        <div class="card" style="border-radius: 20px">
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
