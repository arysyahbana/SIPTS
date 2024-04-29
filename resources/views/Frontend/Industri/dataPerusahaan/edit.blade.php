@extends('Frontend.layouts.app')

@section('title', 'Edit Perusahaan')

@section('main-content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-danger">Edit Perusahaan</h6>
            </div>
            <div class="card-body">
                <form action="#" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="mou">MOU</label>
                        <input type="text" class="form-control" placeholder="Masukkan MOU" name="mou"
                            value="Awokwo123">
                    </div>
                    <div class="form-group">
                        <label for="name">Nama Perusahaan</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama Perusahaan" name="name"
                            value="AACom">
                    </div>
                    <div class="form-group">
                        <p>Foto Sebelumnya</p>
                        <img src="{{ asset('dist/img/undraw_profile.svg') }}" alt="" class="img-fluid"
                            style="max-width: 10rem">
                    </div>
                    <div class="form-group">
                        <label for="foto">Update Foto Perusahaan</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01"
                                    aria-describedby="inputGroupFileAddon01" name="foto">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama Perusahaan" name="alamat"
                            value="Jln. Bukittinggi-Padang">
                    </div>
                    <div class="form-group">
                        <label for="hp">No HP Perusahaan</label>
                        <input type="number" class="form-control" placeholder="Masukkan No HP Perusahaan" name="hp"
                            value="082365748945">
                    </div>
                    <div class="form-group">
                        <label for="email">Email Perusahaan</label>
                        <input type="email" class="form-control" placeholder="Masukkan Email Perusahaan" name="email"
                            value="aacom@gmail.com">
                    </div>
                    <button type="submit" class="btn btn-danger">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
