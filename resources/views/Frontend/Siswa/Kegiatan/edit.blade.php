@extends('Frontend.layouts.app')

@section('title', 'Edit Kegiatan')

@section('main-content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-danger">Edit Kegiatan</h6>
            </div>
            <div class="card-body">
                <form action="#" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="datetime-local" class="form-control" placeholder="Masukkan Waktu" name="tanggal">
                    </div>
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" placeholder="Masukkan Judul Kegiatan" name="judul"
                            value="Memasang Kabel">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="" cols="30" rows="5" class="form-control"
                            placeholder="Masukan Deskripsi">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ducimus sapiente aspernatur qui provident quibusdam dolores maiores enim unde eveniet eum?</textarea>
                    </div>
                    <div class="form-group">
                        <p>Foto Sebelumnya</p>
                        <img src="{{ asset('dist/img/undraw_profile.svg') }}" alt="" class="img-fluid"
                            style="max-width: 10rem">
                    </div>
                    <div class="form-group">
                        <label for="foto">Update Foto Kegiatan</label>
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
                    <button type="submit" class="btn btn-danger">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
