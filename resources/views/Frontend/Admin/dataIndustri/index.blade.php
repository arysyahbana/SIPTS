@extends('Frontend.layouts.app')

@section('title', 'Data Industri')

@section('main-content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Industri</h6>
                {{-- <a href="{{ route('add-industri') }}" class="btn btn-sm btn-primary">Add</a> --}}
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
                                <th>No Hp Perusahaan</th>
                                <th>Email Perusahaan</th>
                                <th>Nama Siswa</th>
                                <th>Mentor</th>
                                <th>No HP Mentor</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->industri->mou ?? '' }}</td>
                                    <td>{{ $item->industri->nama_perusahaan ?? '' }}</td>
                                    <td>{{ $item->industri->alamat ?? '' }}</td>
                                    <td>{{ $item->industri->np_hp ?? '' }}</td>
                                    <td>{{ $item->industri->email ?? '' }}/td>
                                    <td>{{ $item->siswa->nama ?? '' }}</td>
                                    <td>{{ $item->user->name ?? '' }}</td>
                                    <td>{{ $item->user->hp ?? '' }}</td>
                                    {{-- <td><a href="{{ route('edit-industri') }}" class="btn btn-sm btn-success">Edit</a>
                                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
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
