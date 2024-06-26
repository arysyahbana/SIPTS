@extends('Frontend.layouts.app')

@section('title', 'Update Profile Siswa')

@section('main-content')
    <div class="container-fluid">
        <h3 class="font-weight-bold text-dark text-center">Sistem Informasi Praktek Kerja Lapangan dan Tracer Study</h3>
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-danger">Update Profile</h6>
            </div>
            <div class="card-body text-dark">
                <form action="{{ route('update-profile-siswa2', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama"
                            value="{{ Auth::user()->name }}">
                    </div>
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input type="text" class="form-control" id="nis" name="nis" placeholder="NIS"
                            value="{{ $siswa->nis }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                            value="{{ Auth::user()->email }}">
                    </div>
                    <div class="form-group">
                        <label for="email">No HP</label>
                        <input type="text" class="form-control" id="email" name="hp" placeholder="No HP"
                            value="{{ Auth::user()->hp }}">
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01"
                                    aria-describedby="inputGroupFileAddon01" name="foto">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger">Upload</button>
                </form>
            </div>
        </div>
    </div>
@endsection
