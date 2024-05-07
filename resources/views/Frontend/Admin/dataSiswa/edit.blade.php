@extends('Frontend.layouts.app')

@section('title', 'Edit Data Siswa')

@section('main-content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Edit Siswa</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('update-siswa', $data->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="NIP">NIS</label>
                        <input type="number" class="form-control" placeholder="Masukkan NIS" name="nis"
                            value="{{ $data->nis }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Nama Siswa</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama Siswa" name="name"
                            value="{{ $data->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" placeholder="Masukkan Email" name="email"
                            value="{{ $data->email }}">
                    </div>
                    <div class="form-group">
                        <label for="hp">No HP</label>
                        <input type="number" class="form-control" placeholder="Masukkan No HP" name="hp"
                            value="{{ $data->no_hp }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Jenis Kelamin</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="exampleRadios1"
                                value="Laki-Laki" {{ $data->jenis_kelamin == 'Laki-Laki' ? 'checked' : '' }}>
                            <label class="form-check-label" for="exampleRadios1">
                                Laki-laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="exampleRadios2"
                                value="Perempuan" {{ $data->jenis_kelamin == 'Perempuan' ? 'checked' : '' }}>
                            <label class="form-check-label" for="exampleRadios2">
                                Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="namaSiswa">Bidang Keahlian</label>
                        <select class="form-control" name="bidang">
                            <option>--- Pilih ---</option>
                            <option value="TKJ" {{ $data->bidang_keahlian == 'TKJ' ? 'selected' : '' }}>TKJ</option>
                            <option value="DPIB" {{ $data->bidang_keahlian == 'DPIB' ? 'selected' : '' }}>DPIB</option>
                            <option value="TKR" {{ $data->bidang_keahlian == 'TKR' ? 'selected' : '' }}>TKR</option>
                            <option value="TITL" {{ $data->bidang_keahlian == 'TITL' ? 'selected' : '' }}>TITL</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="namaSiswa">Program Keahlian</label>
                        <select class="form-control" name="program">
                            <option>--- Pilih ---</option>
                            <option value="TKJ" {{ $data->program_keahlian == 'TKJ' ? 'selected' : '' }}>TKJ</option>
                            <option value="DPIB" {{ $data->program_keahlian == 'DPIB' ? 'selected' : '' }}>DPIB</option>
                            <option value="TKR" {{ $data->program_keahlian == 'TKR' ? 'selected' : '' }}>TKR</option>
                            <option value="TITL" {{ $data->program_keahlian == 'TITL' ? 'selected' : '' }}>TITL</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="namaSiswa">Konsentrasi Keahlian</label>
                        <select class="form-control" name="konsentrasi">
                            <option>--- Pilih ---</option>
                            <option value="TKJ" {{ $data->konsentrasi_keahlian == 'TKJ' ? 'selected' : '' }}>TKJ
                            </option>
                            <option value="DPIB" {{ $data->konsentrasi_keahlian == 'DPIB' ? 'selected' : '' }}>DPIB
                            </option>
                            <option value="TKR" {{ $data->konsentrasi_keahlian == 'TKR' ? 'selected' : '' }}>TKR
                            </option>
                            <option value="TITL" {{ $data->konsentrasi_keahlian == 'TITL' ? 'selected' : '' }}>TITL
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="namaPerusahaan">Nama Perusahaan</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama Perusahaan"
                            name="namaPerusahaan" value="{{ $data->nama_perusahaan }}">
                    </div>
                    <div class="form-group">
                        <label for="mentor">Mentor</label>
                        <input type="mentor" class="form-control" placeholder="Masukkan Mentor" name="mentor"
                            value="{{ $data->mentor }}">
                    </div>
                    <div class="form-group">
                        <label for="namaPamong">Nama Pamong</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama Pamong" name="namaPamong"
                            value="{{ $data->pamong }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
