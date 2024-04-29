@extends('Frontend.layouts.app')

@section('title', 'Data Mentor')

@section('main-content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Mentor</h6>
                <a href="{{ route('add-industri-data-mentor') }}" class="btn btn-sm btn-primary">Add Mentor</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Mentor</th>
                                <th>No HP Mentor</th>
                                <th>Email Mentor</th>
                                <th>Nama Siswa</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Dadang</td>
                                <td>082345127689</td>
                                <td>dadang@gmail.com</td>
                                <td>Joni</td>
                                <td><a href="{{ route('edit-industri-data-mentor') }}"
                                        class="btn btn-sm btn-success">Edit</a>
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
