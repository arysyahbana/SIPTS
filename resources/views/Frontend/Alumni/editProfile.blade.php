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
                <form>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" placeholder="Nama"
                            value="{{ Auth::user()->name }}">
                    </div>
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input type="text" class="form-control" id="nis" placeholder="NIS">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Email"
                            value="{{ Auth::user()->email }}">
                    </div>
                    <div class="form-group">
                        <label for="email">No HP</label>
                        <input type="email" class="form-control" id="email" placeholder="No HP"
                            value="{{ Auth::user()->hp }}">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control">
                            <option>--- Pilih ---</option>
                            <option>Bekerja</option>
                            <option>Tidak Bekerja</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tempat">Tempat</label>
                        <input type="text" class="form-control" id="tempat" placeholder="Tempat">
                    </div>
                    <button type="submit" class="btn btn-danger">Sign in</button>
                </form>
            </div>
        </div>
    </div>
@endsection
