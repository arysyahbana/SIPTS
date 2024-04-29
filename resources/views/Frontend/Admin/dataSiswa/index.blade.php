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
                            <tr>
                                <td>1</td>
                                <td>121212121</td>
                                <td>Joni</td>
                                <td>joni@gmail.com</td>
                                <td>082354678965</td>
                                <td>Laki-laki</td>
                                <td>TKJ</td>
                                <td>TKJ</td>
                                <td>TKJ</td>
                                <td>AACom</td>
                                <td>Awowok</td>
                                <td>Awikwok</td>
                                <td><a href="{{ route('edit-siswa') }}" class="btn btn-sm btn-success">Edit</a>
                                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
