<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="{{ route('dashboard.index') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Master Data
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link" href="{{ url('admin/produk') }}">
      <i class="fas fa-fw fa-cog"></i>
      <span>Data Produk</span>
    </a>

    {{-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cog"></i>
      <span>Master Data</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Kumpulan Data:</h6>
        <a class="collapse-item" href="{{ url('admin/produk') }}">Data Produk</a>
        <a class="collapse-item" href="{{ route('pelanggan.index') }}">Data Pelanggan</a>
        <a class="collapse-item" href="/admin/jenis-produk">Data Jenis Produk</a>
        <a class="collapse-item" href="{{ route('kartu.index') }}">Data Kartu</a>
      </div>
    </div> --}}
  </li>

  <!-- Nav Item - Utilities Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('pelanggan.index') }}">
      <i class="fas fa-fw fa-wrench"></i>
      <span>Data Pelanggan</span>
    </a>
  </li>

  <!-- Nav Item - Utilities Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link" href="/admin/jenis-produk">
      <i class="fas fa-fw fa-folder"></i>
      <span>Data Jenis Produk</span>
    </a>
  </li>

  <!-- Nav Item - Utilities Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('kartu.index') }}">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Data Kartu</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
