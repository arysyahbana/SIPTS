@extends('Frontend.layouts.app')

@section('title', 'Input Nilai')

@section('main-content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Input Nilai Siswa</h6>
                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addNilai">Add</a>
            </div>
            <div class="card-body text-dark pb-5">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="row">
                            <div class="col col-2 mb-2">Nama Siswa</div>
                            <div class="col col-10 mb-2">{{ $siswa->nama ?? '' }}</div>
                            <div class="col col-2 mb-3">Bidang Studi</div>
                            <div class="col col-10 mb-3">{{ $siswa->bidang_keahlian ?? '' }}</div>
                        </div>
                        <div class="card shadow">
                            <table class="table table-bordered text-dark" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Aspek Penilaian</th>
                                        <th>Nilai</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penilaian as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->aspek_penilaian }}</td>
                                            <td>{{ $item->nilai }}</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-success" data-toggle="modal"
                                                    data-target="#editNilai{{ $item->id }}">Edit</a>
                                                <a href="{{ route('mentor-showed-input-nilai-delete', $item->id) }}"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                                    class="btn btn-sm btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        {{-- Modal Edit --}}
                                        <div class="modal fade" id="editNilai{{ $item->id }}" data-backdrop="static"
                                            data-keyboard="false" tabindex="-1"
                                            aria-labelledby="staticBackdropLabel{{ $item->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel{{ $item->id }}">
                                                            Edit Nilai
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form
                                                            action="{{ route('mentor-showed-input-nilai-update', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="aspek">Aspek Penilaian</label>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Masukkan Aspek Penilaian" name="aspek"
                                                                    value="{{ $item->aspek_penilaian }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nilai">Nilai</label>
                                                                <input type="number" id="nilai" class="form-control"
                                                                    placeholder="Masukkan Nilai" name="nilai"
                                                                    value="{{ $item->nilai }}">
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </form>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="row">
                            <div class="col col-12 font-weight-bold">Upload Sertifikat</div>
                            <div class="col col-8 my-1">
                                <form action="{{ route('mentor-upload-sertifikat', [$siswa->id, Auth::user()->id]) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="input-group">
                                        <div class="custom-file mr-2">
                                            <input type="file" class="custom-file-input" id="inputGroupFile02"
                                                name="sertifikat">
                                            <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                        </div>
                                        <button type="submit" class="btn btn-danger">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                {{-- <img src="{{asset('dist/img/Sertifikat-Hardiknas.png')}}" alt="" class="img-fluid" style="max-width:515px"> --}}
                                <img src="{{ $sertifikat ? asset('uploads/sertifikat/' . $sertifikat->nama_sertifikat) : '' }}"
                                    alt="" class="img-fluid" style="max-width:515px">
                            </div>
                            <div class="col-8 {{ $sertifikat ? '' : 'd-none' }}">
                                <a href="#" class="btn btn-danger form-control">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Add --}}
    <div class="modal fade" id="addNilai" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Input Nilai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('mentor-showed-input-nilai-store', $siswa->id ?? '') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="aspek">Aspek Penilaian</label>
                            <input type="text" class="form-control" placeholder="Masukkan Aspek Penilaian"
                                name="aspek">
                        </div>
                        <div class="form-group">
                            <label for="nilai">Nilai</label>
                            <input type="number" class="form-control" placeholder="Masukkan Nilai" name="nilai">
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('input[name="nilai"]').forEach(function(input) {
            input.addEventListener('input', function() {
                if (this.value > 100) {
                    alert('Nilai tidak boleh lebih dari 100');
                    this.value = 100;
                }
            });
        });
    </script>
@endsection
