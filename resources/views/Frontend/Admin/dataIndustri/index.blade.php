@extends('Frontend.layouts.app')

@section('title', 'Data Industri')

@section('main-content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Industri</h6>
                <a href="{{ route('add-industri') }}" class="btn btn-sm btn-primary">Add</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>MOU</th>
                                <th>Nama Perusahaan</th>
                                <th>Alamat</th>
                                <th>No Hp</th>
                                <th>Email</th>
                                <th>Nama Siswa</th>
                                <th>Mentor</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>121212121</td>
                                <td>AACom</td>
                                <td>Jln.awokawokawok</td>
                                <td>082376458765</td>
                                <td>aacom@gmail.com</td>
                                <td>Joni</td>
                                <td>Budi</td>
                                <td><a href="{{ route('edit-industri') }}" class="btn btn-sm btn-success">Edit</a>
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
