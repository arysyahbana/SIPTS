@extends('Frontend.layouts.app')

@section('title', 'Edit Kegiatan')

@section('main-content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-danger">Edit Kegiatan</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('update-kegiatan',$edit->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="datetime-local" class="form-control" placeholder="Masukkan Waktu" name="tanggal" value="{{$edit->tanggal}}">
                    </div>
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" placeholder="Masukkan Judul Kegiatan" name="judul"
                            value="{{$edit->judul}}">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="" cols="30" rows="5" class="form-control"
                            placeholder="Masukan Deskripsi">{{$edit->deskripsi}}</textarea>
                    </div>
                    <div class="form-group">
                        <p>Foto Sebelumnya</p>
                        <img src="{{ asset('uploads/kegiatan/' . Auth::user()->name . '/' . $edit->foto) }}" alt="" class="img-fluid"
                            style="max-width: 10rem">
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
                    <button type="submit" class="btn btn-danger">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
