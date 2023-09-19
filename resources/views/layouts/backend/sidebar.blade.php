<ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

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
        <i class="far fa-calendar"></i>
          <span>Income </span>
      </a>
  </li>
  <li class="nav-item {{ Request::routeIs('years.index') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('years.index') }}">
        <i class="far fa-calendar"></i>
          <span>Tahun </span>
      </a>
  </li>
  <div id="accordion" class="accordion">
    <div class="card mb-0">
        <div class="card-header collapsed" data-toggle="collapse" href="#collapseOne">
            <a class="card-title">
                Item 1
            </a>
        </div>
        <div id="collapseOne" class="card-body collapse" data-parent="#accordion" >
            <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt
                aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat
                craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            </p>
        </div>
        <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
            <a class="card-title">
              Item 2
            </a>
        </div>
        <div id="collapseTwo" class="card-body collapse" data-parent="#accordion" >
            <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt
                aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat
                craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            </p>
        </div>
        <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
            <a class="card-title">
              Item 3
            </a>
        </div>
        <div id="collapseThree" class="collapse" data-parent="#accordion" >
            <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt
                aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. samus labore sustainable VHS.
            </div>
        </div>
    </div>
</div>
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline pt-4">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>