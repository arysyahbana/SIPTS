@extends('Frontend.layouts.app')

@section('title', 'Edit Data User')

@section('main-content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('update-user', $data->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama" name="name" value="{{ $data->name }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" placeholder="Masukkan Email" name="email"
                            value="{{ $data->email }}">
                    </div>
                    <div class="form-group">
                        <label for="hp">No HP</label>
                        <input type="number" class="form-control" placeholder="Masukkan No HP" name="hp"
                            value="{{ $data->hp }}">
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control" name="role">
                            <option value="" hidden {{ $data->role ? '' : 'selected' }}>--- Pilih ---</option>
                            <option value="Admin" {{ $data->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                            <option value="Pamong" {{ $data->role == 'Pamong' ? 'selected' : '' }}>Pamong</option>
                            {{-- <option value="Mentor" {{ $data->role == 'Mentor' ? 'selected' : '' }}>Mentor</option> --}}
                            <option value="Industri" {{ $data->role == 'Industri' ? 'selected' : '' }}>Industri</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" placeholder="Masukkan Password Baru" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
