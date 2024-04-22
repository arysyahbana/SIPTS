@extends('Frontend.layouts.app')

@section('title', 'Add Data Industri')

@section('main-content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Add Industri</h6>
            </div>
            <div class="card-body">
                <form action="#" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="mou">MOU</label>
                        <input type="text" class="form-control" placeholder="Masukkan MOU" name="mou">
                    </div>
                    <div class="form-group">
                        <label for="namaPerusahaan">Nama Perusahaan</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama Perusahaan"
                            name="namaPerusahaan">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" placeholder="Masukkan Alamat" name="alamat">
                    </div>
                    <div class="form-group">
                        <label for="hp">No Hp</label>
                        <input type="number" class="form-control" placeholder="Masukkan No Hp" name="hp">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" placeholder="Masukkan Email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="name">Nama Siswa</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama Siswa" name="name">
                    </div>
                    <div class="form-group">
                        <label for="mentor">Mentor</label>
                        <input type="mentor" class="form-control" placeholder="Masukkan Mentor" name="mentor">
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
@endsection
