@extends('Frontend.layouts.app')

@section('title', 'Edit Data Industri')

@section('main-content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Edit Industri</h6>
            </div>
            <div class="card-body">
                <form action="#" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="mou">MOU</label>
                        <input type="text" class="form-control" placeholder="Masukkan MOU" name="mou"
                            value="121212121">
                    </div>
                    <div class="form-group">
                        <label for="namaPerusahaan">Nama Perusahaan</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama Perusahaan"
                            name="namaPerusahaan" value="AACom">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" placeholder="Masukkan Alamat" name="alamat"
                            value="Jln.awokawokawok">
                    </div>
                    <div class="form-group">
                        <label for="hp">No Hp</label>
                        <input type="number" class="form-control" placeholder="Masukkan No Hp" name="hp"
                            value="082376458765">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" placeholder="Masukkan Email" name="email"
                            value="aacom@gmail.com">
                    </div>
                    <div class="form-group">
                        <label for="name">Nama Siswa</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama Siswa" name="name"
                            value="Joni">
                    </div>
                    <div class="form-group">
                        <label for="mentor">Mentor</label>
                        <input type="mentor" class="form-control" placeholder="Masukkan Mentor" name="mentor"
                            value="Budi">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
