@extends('Frontend.layouts.app')

@section('title', 'Data Pamong')

@section('main-content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Pamong</h6>
                <a href="{{ route('add-pamong') }}" class="btn btn-sm btn-primary">Add</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama Pamong</th>
                                <th>Nama Siswa</th>
                                <th>Bidang Keahlian</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->user->nip ?? '' }}</td>
                                    <td>{{ $item->user->name ??''}}</td>
                                    <td>{{ $item->siswa->nama??'' }}</td>
                                    <td>{{ $item->siswa->bidang_keahlian ??''}}</td>
                                    <td><a href="{{ route('edit-pamong', [$item->id]) }}"
                                            class="btn btn-sm btn-success">Edit</a>
                                        <form action="{{ route('delete-pamong', [$item->id]) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
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
