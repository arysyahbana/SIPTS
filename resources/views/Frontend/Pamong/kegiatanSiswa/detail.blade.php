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
                    <div class="col col-9 col-lg-11 mb-2">{{ $siswa->nama }}</div>
                    <div class="col col-3 col-lg-1 mb-3">Bidang Studi</div>
                    <div class="col col-9 col-lg-11 mb-3">{{ $siswa->bidang_keahlian }}</div>
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
                        @foreach ($kegiatan as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td class="text-center"><img
                                    src="{{ asset('uploads/kegiatan/' . $item->user->name . '/' . $item->foto) }}"
                                    alt="" class="img-fluid" style="max-width: 200px">
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
