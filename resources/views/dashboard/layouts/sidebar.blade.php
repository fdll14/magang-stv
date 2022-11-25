<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard*') ? 'active' : '' }}" href="/dashboard">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      @can('isAdmin')
      <li class="nav-item">
        <a class="nav-link {{ Request::is('laporan*') ? 'active' : '' }}" href="/users">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">List Member</span>
        </a>
      </li>
      @endcan
      <li class="nav-item">
        <a class="nav-link {{ Request::is('laporan*') ? 'active' : '' }}" href="/laporan">
          <i class="icon-paper menu-icon"></i>
          <span class="menu-title">Laporan harian</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('nilai*') ? 'active' : '' }}" href="/nilai">
          <i class="icon-paper menu-icon"></i>
          <span class="menu-title">Nilai Akhir</span>
        </a>
      </li>
    </ul>
  </nav>