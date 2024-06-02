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
                            @foreach ($kegiatan as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->tanggal }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ $item->deskripsi }}</td>
                                    <td class="text-center"><img
                                            src="{{ asset('uploads/kegiatan/' . Auth::user()->name . '/' . $item->foto) }}"
                                            alt="" class="img-fluid" style="max-width: 200px"></td>
                                    <td><a href="{{ route('edit-kegiatan', $item->id) }}"
                                            class="btn btn-sm btn-success">Edit</a>
                                        <a href="{{ route('delete-kegiatan', $item->id) }}" class="btn btn-sm btn-danger">Delete</a>
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
