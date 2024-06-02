@extends('Frontend.layouts.app')

@section('title', 'Dashboard')

@section('main-content')
    <div class="container-fluid">
        @if (Auth::user()->role == 'Admin')
            <h3 class="font-weight-bold text-dark">Welcome Back to Dashboard <span
                    class="text-danger">{{ Auth::user()->name }}</span></h3>
            <!-- Content Row -->
            <div class="row">
                <!-- Data Siswa Prakerin -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Data Siswa Prakerin</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">3</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Data Alumni -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Data Alumni</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">5</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Data Insdustri -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Industri
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">2</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-12">
                    <!-- Approach -->
                    <div class="card shadow mb-4">
                        <div class="card-body text-center">
                            <h5 class="text-dark">Selamat datang di Sistem Informasi Praktek Kerja Industri dan Trucer Study
                                <span class="text-danger">SMK
                                    N 1 Tilatang
                                    Kamang</span>
                            </h5>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Content Row -->
            <div class="row">
                <!-- Area Chart -->
                <div class="col-xl-8 col-lg-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                    aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Dropdown Header:</div>
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-area">
                                <canvas id="myAreaChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pie Chart -->
                <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                    aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Dropdown Header:</div>
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-pie pt-4 pb-2">
                                <canvas id="myPieChart"></canvas>
                            </div>
                            <div class="mt-4 text-center small">
                                <span class="mr-2">
                                    <i class="fas fa-circle text-primary"></i> Direct
                                </span>
                                <span class="mr-2">
                                    <i class="fas fa-circle text-success"></i> Social
                                </span>
                                <span class="mr-2">
                                    <i class="fas fa-circle text-info"></i> Referral
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif (Auth::user()->role == 'Pamong')
            <h3 class="font-weight-bold text-dark text-center">Sistem Informasi Praktek Kerja Lapangan dan Tracer Study
                Pamong</h3>
        @elseif (Auth::user()->role == 'Mentor')
            <h3 class="font-weight-bold text-dark text-center">Sistem Informasi Praktek Kerja Lapangan dan Tracer Study
                Mentor</h3>
        @elseif (Auth::user()->role == 'Siswa')
            @php
                $mentor = App\Models\Mentor::where('id_siswa', Auth::user()->id_siswa)->first();
                if ($mentor === null) {
                    $mentor = '';
                    $industri = '';
                    $dataMentor = '';
                    $pamong = '';
                } else {
                    $industri = App\Models\Industri::where('id_industri', $mentor->id_industri)->first();
                    $dataMentor = App\Models\User::find($mentor->id_mentor);
                    $pamong = App\Models\Pamong::where('id_siswa', Auth::user()->id_siswa)->first();
                }
                $fotoSiswa = App\Models\Siswa::where('email', Auth::user()->email)->first();
            @endphp
            <h3 class="font-weight-bold text-dark text-center">Sistem Informasi Praktek Kerja Lapangan dan Tracer Study
                Siswa</h3>
            <div class="row container mx-auto mt-5">
                {{-- data siswa --}}
                <div class="col col-12 col-lg-6">
                    <h5 class="font-weight-bold text-dark">Data Pribadi</h5>
                    <div class="card">
                        <div class="card-header bg-danger text-white" style="max-height: 6rem">
                            <div class="row">
                                <div class="col col-6 col-lg-4">
                                    <h4 class="font-weight-bold">{{ Auth::user()->name }}</h4>
                                    <p>{{ Auth::user()->role }}</p>
                                </div>
                                <div class="col col-6 col-lg-4 text-center pt-4">
                                    <div class="rounded-pill shadow border mx-auto"
                                        style="width: 6rem; height: 6rem; overflow: hidden;">
                                        <img src="{{ $fotoSiswa == null ? asset('dist/img/undraw_profile_1.svg') : asset('uploads/foto/' . $fotoSiswa->foto) }}"
                                            alt="" class="img-fluid"
                                            style="width: 100%; height: 100%; object-fit: cover; object-position: center;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body mt-5 text-dark">
                            <h6 class="card-title text-center">Berikut data informasi akun anda saat ini :</h6>
                            <div class="ml-2 pl-2 ml-lg-5 pl-lg-5">
                                <p>
                                <div class="row">
                                    <div class="col col-3">
                                        Nama </div>
                                    <div class="col-col-6 px-3">
                                        {{ $fotoSiswa->nama }}
                                    </div>
                                </div>
                                </p>
                                <p>
                                <div class="row">
                                    <div class="col col-3">
                                        NIS
                                    </div>
                                    <div class="col col-6">{{ $fotoSiswa->nis ?? '' }}
                                    </div>
                                </div>
                                </p>
                                <p>
                                <div class="row">
                                    <div class="col col-3">
                                        Email
                                    </div>
                                    <div class="col col-6">{{ $fotoSiswa->email }}
                                    </div>
                                </div>
                                <p>
                                <div class="row">
                                    <div class="col col-3">
                                        No HP
                                    </div>
                                    <div class="col col-6">{{ $fotoSiswa->no_hp }}
                                    </div>
                                </div>
                                </p>
                            </div>
                            <a href="{{ route('update-profile-siswa') }}"
                                class="btn btn-danger rounded-pill form-control">Profile</a>
                        </div>
                    </div>
                </div>

                {{-- data magang siswa --}}
                <div class="col col-12 col-lg-6">
                    <h5 class="font-weight-bold text-dark">Data Industri</h5>
                    <div class="card">
                        <div class="card-header bg-danger text-white" style="max-height: 6rem">
                            <div class="row">
                                <div class="col col-6 col-lg-4">
                                    <h4 class="font-weight-bold">{{ $industri->nama_perusahaan ?? '' }}</h4>
                                    <p>Industri</p>
                                </div>
                                {{-- <div class="col col-6 col-lg-4 text-center pt-4">
                                    <img src="{{ asset('dist/img/undraw_profile_3.svg') }}" alt=""
                                        class="img-fluid rounded-pill shadow" style="width: 6rem;">
                                </div> --}}
                            </div>
                        </div>
                        <div class="card-body mt-5 text-dark">
                            <h6 class="card-title text-center">Berikut data informasi industri anda saat ini :</h6>
                            <div class="ml-2 pl-2 ml-lg-5 pl-lg-5">
                                <p>
                                <div class="row">
                                    <div class="col col-6 col-lg-4">
                                        Nama Perusahaan </div>
                                    <div class="col-col-6 px-3">
                                        {{ $industri->nama_perusahaan ?? '' }}
                                    </div>
                                </div>
                                </p>
                                <p>
                                <div class="row">
                                    <div class="col col-6 col-lg-4">
                                        Alamat
                                    </div>
                                    <div class="col col-6">{{ $industri->alamat ?? '' }}
                                    </div>
                                </div>
                                </p>
                                <p>
                                <div class="row">
                                    <div class="col col-6 col-lg-4">
                                        Mentor
                                    </div>
                                    <div class="col col-6">{{ $dataMentor->name ?? '' }}
                                    </div>
                                </div>
                                <p>
                                <div class="row">
                                    <div class="col col-6 col-lg-4">
                                        No HP Mentor
                                    </div>
                                    <div class="col col-6">{{ $dataMentor->hp ?? '' }}
                                    </div>
                                </div>
                                </p>
                                <p>
                                <div class="row">
                                    <div class="col col-6 col-lg-4">
                                        Pamong
                                    </div>
                                    <div class="col col-6">{{ $pamong->user->name ?? '' }}
                                    </div>
                                </div>
                                </p>
                                <p>
                                <div class="row">
                                    <div class="col col-6 col-lg-4">
                                        No HP Pamong
                                    </div>
                                    <div class="col col-6">{{ $pamong->user->hp ?? '' }}
                                    </div>
                                </div>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif (Auth::user()->role == 'Alumni')
            @php
                $siswa = App\Models\Siswa::where('email', Auth::user()->email)->first();
            @endphp
            <h3 class="font-weight-bold text-dark text-center">Sistem Informasi Praktek Kerja Lapangan dan Tracer Study
            </h3>
            <div class="row container mx-auto mt-5 justify-content-center">
                {{-- data siswa --}}
                <div class="col col-6">
                    <h5 class="font-weight-bold text-dark">Data Pribadi</h5>
                    <div class="card">
                        <div class="card-header bg-danger text-white" style="max-height: 6rem">
                            <div class="row">
                                <div class="col col-4">
                                    <h4 class="font-weight-bold">{{ Auth::user()->name }}</h4>
                                    <p>{{ Auth::user()->role }}</p>
                                </div>
                                <div class="col col-4 text-center pt-4">
                                    <img src="{{ asset('dist/img/undraw_profile_1.svg') }}" alt=""
                                        class="img-fluid rounded-pill shadow" style="width: 6rem;">
                                </div>
                            </div>
                        </div>
                        <div class="card-body mt-5 text-dark">
                            <h6 class="card-title text-center">Berikut data informasi akun anda saat ini :</h6>
                            <div class="ml-5 pl-5">
                                <p>
                                <div class="row">
                                    <div class="col col-3">
                                        Nama </div>
                                    <div class="col-col-6 px-3">
                                        {{$siswa->nama }}
                                    </div>
                                </div>
                                </p>
                                <p>
                                <div class="row">
                                    <div class="col col-3">
                                        NIS
                                    </div>
                                    <div class="col col-6">{{ $siswa->nis ?? '' }}
                                    </div>
                                </div>
                                </p>
                                <p>
                                <div class="row">
                                    <div class="col col-3">
                                        Email
                                    </div>
                                    <div class="col col-6">{{$siswa->email }}
                                    </div>
                                </div>
                                <p>
                                <div class="row">
                                    <div class="col col-3">
                                        No HP
                                    </div>
                                    <div class="col col-6">{{$siswa->no_hp }}
                                    </div>
                                </div>
                                </p>
                            </div>
                            <a href="{{ route('edit-profile-alumni') }}"
                                class="btn btn-danger rounded-pill form-control">Update Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        @elseif (Auth::user()->role == 'Industri')
            <h3 class="font-weight-bold text-dark text-center">Sistem Informasi Praktek Kerja Lapangan dan Tracer Study
                Admin Industri</h3>
        @endif
    </div>

@endsection
