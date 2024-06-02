@extends('Frontend.layouts.app')

@section('title', 'Edit Data Pamong')

@section('main-content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Edit Pamong</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('update-pamong', $user->user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="NIP">NIP</label>
                        <input type="number" class="form-control" placeholder="Masukkan NIP" name="nip"
                            value="{{ $user->user->nip }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Nama Pamong</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama Pamong" name="name"
                            value="{{ $user->user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="hp">Nomor HP</label>
                        <input type="number" class="form-control" placeholder="Masukkan Nomor Hp" name="hp"
                            value="{{ $user->user->hp }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email Pamong</label>
                        <input type="email" class="form-control" placeholder="Masukkan Email Pamong" name="email"
                            value="{{ $user->user->email }}">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" placeholder="Masukkan Password Baru" name="password">
                    </div>
                    <div class="form-group">
                        <label for="namaSiswa">Nama Siswa</label>
                        <select class="form-control" name="namaSiswa">
                            <option value="" selected hidden>Pilih</option>
                            @foreach ($siswa as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $user->siswa->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
