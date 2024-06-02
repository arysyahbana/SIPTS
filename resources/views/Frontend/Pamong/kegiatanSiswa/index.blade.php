@extends('Frontend.layouts.app')

@section('title', 'Cek Kegiatan')

@section('main-content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Cek Kegiatan Siswa</h6>
            </div>
            <div class="card-body text-dark">
                <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Bidang Studi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataPamong as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->siswa->nis}}</td>
                                <td>{{$item->siswa->nama}}</td>
                                <td>{{$item->siswa->bidang_keahlian}}</td>
                                <td><a href="{{ route('pamong-detail-cek-kegiatan',$item->siswa->id) }}" class="btn btn-sm btn-danger">Lihat</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
