@extends('Frontend.layouts.app')

@section('title', 'Edit Data Alumni')

@section('main-content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Edit Alumni</h6>
            </div>
            <div class="card-body">
                <form action="#" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="NIP">NIS</label>
                        <input type="number" class="form-control" placeholder="Masukkan NIS" name="nis"
                            value="121212121">
                    </div>
                    <div class="form-group">
                        <label for="name">Nama Siswa</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama Siswa" name="name"
                            value="Joni">
                    </div>
                    <div class="form-group">
                        <label for="tamat">Tahun Tamat</label>
                        <input type="number" class="form-control" placeholder="Masukkan Tahun Tamat" name="tamat"
                            value="2023">
                    </div>
                    <div class="form-group">
                        <label for="name">Jenis Kelamin</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="exampleRadios1"
                                value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Laki-laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="exampleRadios2"
                                value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="namaSiswa">Bidang Keahlian</label>
                        <select class="form-control" name="bidang">
                            <option>--- Pilih ---</option>
                            <option value="1" selected>TKJ</option>
                            <option value="2">DPIB</option>
                            <option value="3">TKR</option>
                            <option value="4">TITL</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="namaSiswa">Program Keahlian</label>
                        <select class="form-control" name="program">
                            <option>--- Pilih ---</option>
                            <option value="1" selected>TKJ</option>
                            <option value="2">DPIB</option>
                            <option value="3">TKR</option>
                            <option value="4">TITL</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="namaSiswa">Konsentrasi Keahlian</label>
                        <select class="form-control" name="konsentrasi">
                            <option>--- Pilih ---</option>
                            <option value="1" selected>TKJ</option>
                            <option value="2">DPIB</option>
                            <option value="3">TKR</option>
                            <option value="4">TITL</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status Pekerjaan</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="exampleRadios1"
                                value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Bekerja
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="exampleRadios2"
                                value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                Tidak Bekerja
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="place">Tempat</label>
                        <input type="text" class="form-control" placeholder="Masukkan Tempat" name="place"
                            value="AACom">
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
@endsection
