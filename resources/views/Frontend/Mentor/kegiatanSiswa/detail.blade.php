@extends('Frontend.layouts.app')

@section('title', 'Cek Kegiatan')

@section('main-content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Cek Kegiatan Siswa</h6>
            </div>
            <div class="card-body text-dark">
                <div class="row">
                    <div class="col col-3 col-lg-1 mb-2">Nama Siswa</div>
                    <div class="col col-9 col-lg-11 mb-2">Joni</div>
                    <div class="col col-3 col-lg-1 mb-3">Bidang Studi</div>
                    <div class="col col-9 col-lg-11 mb-3">TJKT</div>
                </div>
                <table class="table table-bordered text-dark" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 2rem">No</th>
                            <th style="width: 10rem">Tanggal</th>
                            <th style="width: 20rem">Judul</th>
                            <th style="width: 30rem">Deskripsi</th>
                            <th>Foto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>20 April 2024</td>
                            <td>Memasang Kabel</td>
                            <td>Lorem ipsum dolor sit amet consectetur adipisicing.</td>
                            <td><img src="{{ asset('dist/img/undraw_profile.svg') }}" alt="" class="img-fluid w-25">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
