<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{route('dashboard')}}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        @can('penduduk')
        <li class="nav-item">
            <a class="nav-link" href="{{route('penduduk.pengajuanSurat.index')}}">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Pengajuan Surat</span>
            </a>
        </li>
        @endcan  
        @can('kades')
        <li class="nav-item">
            <a class="nav-link" href="{{route('kades.persetujuanSurat.index')}}">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Persetujuan Surat</span>
            </a>
        </li>  
        @endcan
        @can('admin')
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.desa.index')}}">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Desa</span>
            </a>
        </li> 
        @endcan
    </ul>
</nav>