@extends('Frontend.layouts.app')

@section('title', 'Update Profile')

@section('main-content')

    <div class="container-fluid">
        <h3 class="font-weight-bold text-dark text-center">Sistem Informasi Praktek Kerja Lapangan dan Tracer Study</h3>
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-danger">Update Profile</h6>
            </div>
            <div class="card-body text-dark">
                <form action="{{route('update-profile-alumni')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama"
                            value="{{ $dataSiswa->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input type="text" class="form-control" name="nis" id="nis" placeholder="NIS"
                            value="{{ $dataSiswa->nis }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                            value="{{ $dataSiswa->email }}">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="hp">No HP</label>
                        <input type="text" class="form-control" id="hp" name="hp" placeholder="No HP"
                            value="{{ $dataSiswa->no_hp }}">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="bekerja" id="bekerja" onchange="toggleTempatInput()">
                            <option value="pilih" selected hidden>--- Pilih ---</option>
                            <option value="Tidak Bekerja"
                                {{ $dataSiswa->status_pekerjaan == 'Tidak Bekerja' ? 'selected' : '' }}>Tidak Bekerja
                            </option>
                            <option value="Bekerja" {{ $dataSiswa->status_pekerjaan == 'Bekerja' ? 'selected' : '' }}>
                                Bekerja</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tempat">Tempat</label>
                        <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Tempat"
                            value="{{ $dataSiswa->tempat ?? '' }}">
                    </div>
                    <button type="submit" class="btn btn-danger">Update</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        function toggleTempatInput() {
            var statusSelect = document.getElementById('bekerja');
            var tempatInput = document.getElementById('tempat');
            if (statusSelect.value === "Tidak Bekerja" || statusSelect.value === 'pilih') {
                tempatInput.disabled = true;
                tempatInput.value = ""; // Clear the input if disabled
            } else {
                tempatInput.disabled = false;
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            toggleTempatInput(); // Initial check on page load
        });
    </script>
@endsection
