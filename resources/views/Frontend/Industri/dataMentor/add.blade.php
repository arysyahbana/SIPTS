@extends('Frontend.layouts.app')

@section('title', 'Add Data Mentor')

@section('main-content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active text-danger" href="#" id="addMentor">Add Mentor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="existingMentor">Add An Existing Mentor</a>
                </li>
            </ul>
            <div class="card-body">
                <div id="form-add-mentor">
                    <form action="{{ route('store-industri-data-mentor') }}" method="POST">
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
                            <label for="password">Pasword</label>
                            <input type="password" class="form-control" placeholder="Masukkan Pasword" name="password">
                        </div>
                        <div class="form-group">
                            <label for="namaSiswa">Nama Siswa</label>
                            <select class="form-control" name="namaSiswa">
                                <option selected hidden>--- Pilih ---</option>
                                @foreach ($dataSiswa as $siswa)
                                    <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>

                <div id="form-existing-Mentor">
                    <form action="#" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name2">Nama Mentor</label>
                            <select class="form-control" name="name2">
                                <option selected hidden>--- Pilih ---</option>
                                {{-- @foreach ($dataSiswa as $siswa)
                                    <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                                @endforeach --}}
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="hp2">Nomor HP</label>
                            <input type="number" class="form-control" placeholder="Masukkan Nomor Hp" name="hp2">
                        </div>
                        <div class="form-group">
                            <label for="email2">Email Mentor</label>
                            <input type="email" class="form-control" placeholder="Masukkan Email Mentor" name="email2">
                        </div>
                        <div class="form-group">
                            <label for="password2">Pasword</label>
                            <input type="password" class="form-control" placeholder="Masukkan Pasword" name="password2">
                        </div>
                        <div class="form-group">
                            <label for="namaSisw2a">Nama Siswa</label>
                            <select class="form-control" name="namaSiswa2">
                                <option selected hidden>--- Pilih ---</option>
                                @foreach ($dataSiswa as $siswa)
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
            $("#form-existing-Mentor").hide();

            $("#addMentor").click(function(e) {
                e.preventDefault();
                $(".nav-link").removeClass("active text-danger");
                $(this).addClass("active text-danger");
                $("#form-existing-Mentor").hide();
                $("#form-add-mentor").show();
            });

            $("#existingMentor").click(function(e) {
                e.preventDefault();
                $(".nav-link").removeClass("active text-danger");
                $(this).addClass("active text-danger");
                $("#form-add-mentor").hide();
                $("#form-existing-Mentor").show();
            });
        });
    </script>
@endsection
