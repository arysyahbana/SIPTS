@extends('Frontend.layouts.app')

@section('title', 'Edit Data User')

@section('main-content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
            </div>
            <div class="card-body">
                <form action="#" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">NIS</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama" name="name" value="Budi">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" placeholder="Masukkan Email" name="email"
                            value="budi@gmail.com">
                    </div>
                    <div class="form-group">
                        <label for="hp">No HP</label>
                        <input type="number" class="form-control" placeholder="Masukkan No HP" name="hp"
                            value="082736477689">
                    </div>
                    <div class="form-group">
                        <label for="namaSiswa">Role</label>
                        <select class="form-control" name="bidang">
                            <option value="" hidden selected>--- Pilih ---</option>
                            <option value="Siswa">Siswa</option>
                            <option value="Pamong">Pamong</option>
                            <option value="Mentor">Mentor</option>
                            <option value="Alumni">Alumni</option>
                            <option value="Industri">Industri</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" placeholder="Masukkan Password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
