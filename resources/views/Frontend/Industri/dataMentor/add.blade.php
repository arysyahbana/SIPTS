@extends('Frontend.layouts.app')

@section('title', 'Add Data Mentor')

@section('main-content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Add Mentor</h6>
            </div>
            <div class="card-body">
                <form action="#" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Mentor</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama Mentor" name="name">
                    </div>
                    <div class="form-group">
                        <label for="hp">Nomor HP</label>
                        <input type="number" class="form-control" placeholder="Masukkan Nomor Hp" name="hp">
                    </div>
                    <div class="form-group">
                        <label for="email">Email Mentor</label>
                        <input type="email" class="form-control" placeholder="Masukkan Email Mentor" name="email">
                    </div>
                    <div class="form-group">
                        <label for="namaSiswa">Nama Siswa</label>
                        <select class="form-control" name="namaSiswa">
                            <option>--- Pilih ---</option>
                            <option value="2">Budi</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
@endsection
