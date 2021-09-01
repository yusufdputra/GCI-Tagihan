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
          <li><a class="nav-link" href="{{('/')}}">General Dashboard</a></li>
        </ul>
      </li>
      <li class="menu-header">Data Master</li>
      <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Data Master</span></a>
        <ul class="dropdown-menu">
          @role('bendahara')
          <li><a class="nav-link" href="{{route('semester')}}">Kelola Semester</a></li>
          <li><a class="nav-link" href="{{route('tagihan')}}">Kelola Tagihan</a></li>
          <li><a class="nav-link" href="{{route('mahasiswa')}}">Mahasiswa</a></li>
          @endrole
          @role('pimpinan')
          <li><a class="nav-link" href="{{route('tagihan')}}">Tagihan Pembayaran</a></li>
          @endrole
          @role('mahasiswa')
          <li><a class="nav-link" href="{{route('pembayaran')}}">Pembayaran</a></li>
          @endrole
        </ul>
      </li>

      
  </aside>
</div>
