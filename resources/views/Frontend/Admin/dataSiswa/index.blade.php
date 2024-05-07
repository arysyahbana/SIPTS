@extends('Frontend.layouts.app')

@section('title', 'Data Siswa')

@section('main-content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
                <a href="{{ route('add-siswa') }}" class="btn btn-sm btn-primary">Add</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama Siswa</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th>Jenis Kelamin</th>
                                <th>Bidang Keahlian</th>
                                <th>Program Keahlian</th>
                                <th>Konsentrasi Keahlian</th>
                                <th>Nama Perusahaan</th>
                                <th>Mentor</th>
                                <th>Nama Pamong</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $siswa)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $siswa->nis }}</td>
                                <td>{{ $siswa->nama }}</td>
                                <td>{{ $siswa->email }}</td>
                                <td>{{ $siswa->no_hp }}</td>
                                <td>{{ $siswa->jenis_kelamin }}</td>
                                <td>{{ $siswa->bidang_keahlian }}</td>
                                <td>{{ $siswa->program_keahlian }}</td>
                                <td>{{ $siswa->konsentrasi_keahlian }}</td>
                                <td>{{ $siswa->nama_perusahaan }}</td>
                                <td>{{ $siswa->mentor }}</td>
                                <td>{{ $siswa->pamong }}</td>
                                <td>
                                    <a href="{{ route('edit-siswa',$siswa->id) }}" class="btn btn-sm btn-success">Edit</a>
                                    <a href="{{ route('delete-siswa',$siswa->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                    <a href="{{ route('alumni-siswa',$siswa->id) }}" class="btn btn-sm btn-info">Alumni</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
