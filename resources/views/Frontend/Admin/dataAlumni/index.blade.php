@extends('Frontend.layouts.app')

@section('title', 'Data Alumni')

@section('main-content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Alumni</h6>
                {{-- <a href="{{ route('add-alumni') }}" class="btn btn-sm btn-primary">Add</a> --}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama Siswa</th>
                                <th>Tahun Tamat</th>
                                <th>Jenis Kelamin</th>
                                <th>Bidang Keahlian</th>
                                <th>Program Keahlian</th>
                                <th>Konsentrasi Keahlian</th>
                                <th>Status Pekerjaan</th>
                                <th>Tempat</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $alumni)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $alumni->nis }}</td>
                                <td>{{ $alumni->nama }}</td>
                                <td>{{ $alumni->tahun_tamat }}</td>
                                <td>{{ $alumni->jenis_kelamin }}</td>
                                <td>{{ $alumni->bidang_keahlian }}</td>
                                <td>{{ $alumni->program_keahlian }}</td>
                                <td>{{ $alumni->konsentrasi_keahlian }}</td>
                                <td>{{ $alumni->status_pekerjaan }}</td>
                                <td>{{ $alumni->tempat }}</td>
                                {{-- <td>
                                    <a href="{{ route('edit-alumni', $alumni->id) }}" class="btn btn-sm btn-success">Edit</a>
                                    <a href="{{ route('delete-alumni', $alumni->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
