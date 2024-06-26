@extends('Frontend.layouts.app')

@section('title', 'Add Data Siswa')

@section('main-content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Add Siswa</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('store-siswa') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="NIP">NIS</label>
                        <input type="number" class="form-control" placeholder="Masukkan NIS" name="nis">
                    </div>
                    <div class="form-group">
                        <label for="name">Nama Siswa</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama Siswa" name="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" placeholder="Masukkan Email" name="email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Masukkan Password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="hp">No HP</label>
                        <input type="number" class="form-control" placeholder="Masukkan No HP" name="hp">
                    </div>
                    <div class="form-group">
                        <label for="name">Jenis Kelamin</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="exampleRadios1"
                                value="Laki-Laki">
                            <label class="form-check-label" for="exampleRadios1">
                                Laki-laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="exampleRadios2"
                                value="Perempuan">
                            <label class="form-check-label" for="exampleRadios2">
                                Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="namaSiswa">Bidang Keahlian</label>
                        <select class="form-control" name="bidang">
                            <option>--- Pilih ---</option>
                            <option value="TKJ" selected>TKJ</option>
                            <option value="DPIB">DPIB</option>
                            <option value="TKR">TKR</option>
                            <option value="TITL">TITL</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="namaSiswa">Program Keahlian</label>
                        <select class="form-control" name="program">
                            <option>--- Pilih ---</option>
                            <option value="TKJ" selected>TKJ</option>
                            <option value="DPIB">DPIB</option>
                            <option value="TKR">TKR</option>
                            <option value="TITL">TITL</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="namaSiswa">Konsentrasi Keahlian</label>
                        <select class="form-control" name="konsentrasi">
                            <option>--- Pilih ---</option>
                            <option value="TKJ" selected>TKJ</option>
                            <option value="DPIB">DPIB</option>
                            <option value="TKR">TKR</option>
                            <option value="TITL">TITL</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="namaPerusahaan">Nama Perusahaan</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama Perusahaan"
                            name="namaPerusahaan">
                    </div>
                    <div class="form-group">
                        <label for="mentor">Mentor</label>
                        <input type="mentor" class="form-control" placeholder="Masukkan Mentor" name="mentor">
                    </div>
                    <div class="form-group">
                        <label for="namaPamong">Nama Pamong</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama Pamong" name="namaPamong">
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
@endsection
