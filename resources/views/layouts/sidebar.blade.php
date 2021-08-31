<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{('/')}}">{{ Auth::user()->nama }}</a>
    
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{('/')}}">St</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="nav-item dropdown active">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="index-0.html">General Dashboard</a></li>
        </ul>
      </li>
      <li class="menu-header">Data Master</li>
      <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Data Master</span></a>
        <ul class="dropdown-menu">
          @role('bendahara')
          <li><a class="nav-link" href="{{('semester')}}">Kelola Semester</a></li>
          <li><a class="nav-link" href="{{('tagihan')}}">Kelola Tagihan</a></li>
          @endrole
          @role('pimpinan')
          <li><a class="nav-link" href="layout-transparent.html">Data Mahasiswa</a></li>
          @endrole
          @role('mahasiswa|bendahara')
          <li><a class="nav-link" href="{{('mahasiswa')}}">Mahasiswa</a></li>
          @endrole
        </ul>
      </li>

      
  </aside>
</div>
