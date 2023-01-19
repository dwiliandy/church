<ul class="navbar-nav bg-gradient-purple sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin_dashboard') }}">
      <div class="sidebar-brand-icon">
        <i class="fas fa-church"></i>
      </div>
      <div class="sidebar-brand-text mx-3">GMIM RUT SENDANGAN</div>
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
  <li class="nav-item {{ Request::routeIs('dashboard') ? 'active' : '' }}">
    
      <a class="nav-link" href="{{ route('users.index') }}">
          <i class="fas fa-fw fa-users"></i>
          <span>Admin </span>
      </a>
         
  </li>
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>