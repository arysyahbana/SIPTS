@extends('Frontend.layouts.app')

@section('title', 'Upload Kegiatan')

@section('main-content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-danger">Upload Kegiatan</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('store-kegiatan') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="kehadiran">Kehadiran</label> <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kehadiran" id="inlineRadio1"
                                value="Hadir" checked>
                            <label class="form-check-label" for="inlineRadio1">Hadir</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kehadiran" id="inlineRadio2"
                                value="Sakit">
                            <label class="form-check-label" for="inlineRadio2">Sakit</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kehadiran" id="inlineRadio3"
                                value="Izin">
                            <label class="form-check-label" for="inlineRadio3">Izin</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="datetime-local" class="form-control" placeholder="Masukkan Waktu" name="tanggal">
                    </div>
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" placeholder="Masukkan Judul Kegiatan" name="judul">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="" cols="30" rows="5" class="form-control"
                            placeholder="Masukan Deskripsi"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto Kegiatan</label>
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
                    <button type="submit" class="btn btn-danger">Upload</button>
                </form>
            </div>
        </div>
    </div>
@endsection
