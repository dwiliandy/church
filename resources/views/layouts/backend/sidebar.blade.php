<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a id="web_logo" class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin_dashboard') }}">
        <img  src="{{ asset('storage/' . DB::table('web_settings')->first()->logo) }}" alt="" style="max-height: 60px">
      <div class="sidebar-brand-text mx-3">{{ DB::table('web_settings')->first()->website_name }}</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item {{ Request::routeIs('dashboard') ? 'active' : '' }}">
    
      <a class="nav-link" href="{{ route('admin_dashboard') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard </span>
      </a>
         
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <div class="sidebar-heading mt-2">
    <span class=" text-md font-bold uppercase">
      Master Data
    </span>
  </div>
  <!-- Nav Item - Dashboard -->
  <li class="nav-item {{ Request::routeIs('users.index') ? 'active' : '' }}">
    
      <a class="nav-link" href="{{ route('users.index') }}">
          <i class="fas fa-fw fa-users"></i>
          <span>Admin </span>
      </a>
         
  </li>
  <div class="sidebar-heading mt-2">
    <span class="text-md font-bold uppercase">
      Master Data Keuangan
    </span>
  </div>
  <li class="nav-item {{ Request::routeIs('incomes.index') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('incomes.index') }}">
        <i class="fas fa-money-bill-wave-alt"></i>
          <span>Pemasukkan </span>
      </a>
  </li>
  <li class="nav-item {{ Request::routeIs('expenditures.index') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('expenditures.index') }}">
        <i class="fas fa-money-bill-wave-alt"></i>
          <span>Pengeluaran </span>
      </a>
  </li>
  <li class="nav-item {{ Request::routeIs('years.index') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('years.index') }}">
        <i class="far fa-calendar"></i>
          <span>Tahun </span>
      </a>
  </li>
  <div class="sidebar-heading mt-2">
    <span class="text-md font-bold uppercase">
      Data Keuangan
    </span>
  </div>
  <li class="nav-item {{ Request::routeIs('submissions') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('submissions') }}">
      <i class="bi bi-file-earmark-plus"></i>
        <span>Pengajuan </span> 
    </a>
  </li>
  <li class="nav-item {{ Request::routeIs('approvals.index') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('approvals.index') }}">
      <i class="bi bi-card-checklist"></i>
        <span>Persetujuan </span><span class="badge badge-danger">{{ DB::table('approvals')->where('approver',Auth::user()->id)->where('status','Menunggu')->count() }}</span> 
    </a>
  </li>
  <li class="nav-item {{ Request::routeIs('year-data') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('year-data') }}">
      <i class="far fa-calendar"></i>
        <span>Tahun </span>
    </a>
  </li>
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline pt-4">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
  
</ul>