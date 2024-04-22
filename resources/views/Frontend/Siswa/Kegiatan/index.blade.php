@extends('Frontend.layouts.app')

@section('title', 'Kegiatan')

@section('main-content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Kegiatan</h6>
                <a href="{{ route('add-kegiatan') }}" class="btn btn-sm btn-primary">Upload</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Judul</th>
                                <th style="max-width: 5rem">Deskripsi</th>
                                <th>Foto</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>20 April 2024</td>
                                <td>Memasang Kabel</td>
                                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex, sunt sint! Provident id
                                    cupiditate pariatur nemo ipsum nostrum alias explicabo.</td>
                                <td><img src="{{ asset('dist/img/undraw_profile_2.svg') }}" alt=""></td>
                                <td><a href="{{ route('edit-kegiatan') }}" class="btn btn-sm btn-success">Edit</a>
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
