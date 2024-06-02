@extends('Frontend.layouts.app')

@section('title', 'Add Data Pamong')

@section('main-content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            {{-- <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Add Pamong</h6>
            </div> --}}
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active text-danger" href="#" id="addPamong">Add Pamong</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="existingPamong">Add An Existing Pamong</a>
                </li>
            </ul>
            <div class="card-body">
                <div id="form-add-pamong">
                    <form action="{{ route('store-pamong') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="NIP">NIP</label>
                            <input type="number" class="form-control" placeholder="Masukkan NIP" name="nip">
                        </div>
                        <div class="form-group">
                            <label for="name">Nama Pamong</label>
                            <input type="text" class="form-control" placeholder="Masukkan Nama Pamong" name="name">
                        </div>
                        <div class="form-group">
                            <label for="hp">Nomor HP</label>
                            <input type="number" class="form-control" placeholder="Masukkan Nomor Hp" name="hp">
                        </div>
                        <div class="form-group">
                            <label for="email">Email Pamong</label>
                            <input type="email" class="form-control" placeholder="Masukkan Email Pamong" name="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" placeholder="Masukkan Password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="namaSiswa">Nama Siswa</label>
                            <select class="form-control" name="namaSiswa">
                                <option selected hidden>--- Pilih ---</option>
                                @foreach ($data as $siswa)
                                    <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
                <div id="form-existing-pamong">
                    <form action="{{ route('store-pamong') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name2">Nama Pamong</label>
                            <select class="form-control" name="namePamong">
                                <option selected hidden>--- Pilih ---</option>
                                @foreach ($pamong as $pamong)
                                    <option value="{{ $pamong->id }}">{{ $pamong->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="namaSiswa">Nama Siswa</label>
                            <select class="form-control" name="namaSiswa2">
                                <option selected hidden>--- Pilih ---</option>
                                @foreach ($data as $siswa)
                                    <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#form-existing-pamong").hide();

            $("#addPamong").click(function(e) {
                e.preventDefault();
                $(".nav-link").removeClass("active text-danger");
                $(this).addClass("active text-danger");
                $("#form-existing-pamong").hide();
                $("#form-add-pamong").show();
            });

            $("#existingPamong").click(function(e) {
                e.preventDefault();
                $(".nav-link").removeClass("active text-danger");
                $(this).addClass("active text-danger");
                $("#form-add-pamong").hide();
                $("#form-existing-pamong").show();
            });
        });
    </script>
@endsection
