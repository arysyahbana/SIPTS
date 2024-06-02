@extends('Frontend.layouts.app')

@section('title', 'Penilaian')

@section('main-content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Penilaian</h6>
            </div>
            <div class="card-body text-dark">
                <div class="row">
                    <div class="col col-1 mb-3">Nama Siswa</div>
                    <div class="col col-11 mb-3">{{ Auth::user()->name }}</div>
                    <div class="col col-1 mb-3">Mentor</div>
                    <div class="col col-11 mb-3">{{ $mentor->user->name }}</div>
                    <div class="col col-1 mb-3">Pamong</div>
                    <div class="col col-11 mb-3">{{ $pamong->user->name }}</div>
                    <div class="col col-1 mb-3">Alamat</div>
                    <div class="col col-11 mb-3">{{ Auth::user()->industriSiswa->industri->alamat }}</div>
                    <div class="col col-1 mb-3">Penilaian</div>
                    <div class="col col-5 mb-3">
                        <table class="table table-bordered text-dark" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Aspek Penilaian</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penilaian as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->aspek_penilaian }}</td>
                                        <td>{{ $item->nilai }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col col-6"></div>
                    <div class="col col-1 mb-">Sertifikat</div>
                    <div class="col col-3 mb-3 {{ $sertifikat ? '' : 'd-none' }}">
                        <div class="card p-5 shadow">
                            <img src="{{ asset('dist/img/sertifikat.png') }}" alt="" class="img-fluid">
                            <p class="text-center mt-3">{{ $sertifikat->nama_sertifikat ?? '' }}</p>
                            <a href="{{ route('download-sertifikat') }}" class="btn btn-sm btn-danger rounded-pill "
                                download>Download Sertifikat</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
