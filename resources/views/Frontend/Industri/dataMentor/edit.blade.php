@extends('Frontend.layouts.app')

@section('title', 'Edit Data Mentor')

@section('main-content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Edit Mentor</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('update-industri-data-mentor', [$dataSiswa->id, $dataMentor->id]) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nameMentor">Nama Mentor</label>
                        <select class="form-control" name="nameMentor" id="nameMentor">
                            <option hidden>--- Pilih ---</option>
                            @foreach ($dataMentorAll as $item)
                                <option value="{{ $item->id_mentor }}"
                                    {{ $dataMentor->id == $item->id_mentor ? 'selected' : '' }}>
                                    {{ $item->user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="hp">Nomor HP</label>
                        <input type="number" class="form-control" placeholder="Masukkan Nomor Hp" name="hp"
                            value="{{ old('hp', $dataMentor->hp ?? '') }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email Mentor</label>
                        <input type="email" class="form-control" placeholder="Masukkan Email Mentor" name="email"
                            value="{{ old('email', $dataMentor->email ?? '') }}">
                    </div>
                    <div class="form-group">
                        <label for="password">Pasword</label>
                        <input type="password" class="form-control" placeholder="Masukkan Pasword" name="password">
                    </div>
                    <div class="form-group">
                        <label for="namaSiswa">Nama Siswa</label>
                        <select class="form-control" name="namaSiswa">
                            <option selected hidden>--- Pilih ---</option>
                            @foreach ($dataSiswaAll as $siswa)
                                <option value="{{ $siswa->id }}"
                                    {{ old('namaSiswa', $dataSiswa->id) == $siswa->id ? 'selected' : '' }}>
                                    {{ $siswa->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
