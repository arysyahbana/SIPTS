<ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('dist/img/Tilkam.png') }}" alt="" class="img-fluid" style="max-width: 3rem">
        </div>
        <div class="sidebar-brand-text mx-3">SIPTS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    {{-- Admin --}}
    @if (Auth::guard()->user()->role == 'Admin')
        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ $page == 'home' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <li class="nav-item {{ $page == 'data-siswa' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('show-siswa') }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Data Siswa Prakerin</span></a>
        </li>

        <li class="nav-item {{ $page == 'data-pamong' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('show-pamong') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Data Pamong</span></a>
        </li>
        <li class="nav-item {{ $page == 'data-industri' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('show-industri') }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Data Industri</span></a>
        </li>

        <li class="nav-item {{ $page == 'data-alumni' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('show-alumni') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Data Alumni</span></a>
        </li>

        <li class="nav-item {{ $page == 'data-user' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('show-user') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Data User</span></a>
        </li>
        {{-- end Admin --}}
        {{-- Siswa --}}
    @elseif (Auth::guard()->user()->role == 'Siswa')
        <li class="nav-item {{ $page == 'home' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <li class="nav-item {{ $page == 'kegiatan' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('show-kegiatan') }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Kegiatan</span></a>
        </li>

        <li class="nav-item {{ $page == 'penilaian' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('show-penilaian') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Penilaian</span></a>
        </li>
        {{-- end Siswa --}}
        {{-- Pamong --}}
    @elseif (Auth::guard()->user()->role == 'Pamong')
        <div class="">
            <li class="nav-item {{ $page == 'home' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item {{ $page == 'cek-kegiatan' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('show-cek-kegiatan') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Cek Kegiatan Siswa</span></a>
            </li>

            <li class="nav-item {{ $page == 'input-nilai' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('show-input-nilai') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Input Nilai</span></a>
            </li>
        </div>
        {{-- end Pamong --}}
        {{-- Mentor --}}
    @elseif (Auth::guard()->user()->role == 'Mentor')
        <div class="">
            <li class="nav-item {{ $page == 'home' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item {{ $page == 'cek-kegiatan' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('mentor-show-cek-kegiatan') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Cek Kegiatan Siswa</span></a>
            </li>

            <li class="nav-item {{ $page == 'input-nilai' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('mentor-show-input-nilai') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Input Nilai</span></a>
            </li>
        </div>
        {{-- end Mentor --}}

        {{-- Alumni --}}
    @elseif (Auth::guard()->user()->role == 'Alumni')
        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ $page == 'home' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        {{-- end Alumni --}}
        {{-- Industri --}}
    @elseif (Auth::guard()->user()->role == 'Industri')
        <div class="">
            <li class="nav-item {{ $page == 'home' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item {{ $page == 'perusahaan' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('industri-data-perusahaan') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Data Perusahaan</span></a>
            </li>

            <li class="nav-item {{ $page == 'mentor' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('industri-data-mentor') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Mentor</span></a>
            </li>
        </div>
        {{-- end Industri --}}
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
