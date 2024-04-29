@extends('Frontend.layouts.app')

@section('title', 'Data Perusahaan')

@section('main-content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col col-12 col-lg-6">
                <h5 class="font-weight-bold text-dark">Data Perusahaan</h5>
                <div class="card">
                    <div class="card-header bg-danger text-white" style="max-height: 6rem">
                        <div class="row">
                            <div class="col col-6 col-lg-4">
                                <h4 class="font-weight-bold">AACom</h4>
                                <p>Industri</p>
                            </div>
                            <div class="col col-6 col-lg-4 text-center pt-4">
                                <img src="{{ asset('dist/img/undraw_profile_3.svg') }}" alt=""
                                    class="img-fluid rounded-pill shadow" style="width: 6rem;">
                            </div>
                        </div>
                    </div>
                    <div class="card-body mt-5 text-dark">
                        <h6 class="card-title text-center">Berikut data informasi industri :</h6>
                        <div class="ml-2 pl-2 ml-lg-5 pl-lg-5">
                            <p>
                            <div class="row">
                                <div class="col col-6 col-lg-4">
                                    MOU </div>
                                <div class="col-col-6 px-3">
                                    Awokwo123
                                </div>
                            </div>
                            </p>
                            <p>
                            <p>
                            <div class="row">
                                <div class="col col-6 col-lg-4">
                                    Nama Perusahaan </div>
                                <div class="col-col-6 px-3">
                                    AACom
                                </div>
                            </div>
                            </p>
                            <p>
                            <div class="row">
                                <div class="col col-6 col-lg-4">
                                    Alamat
                                </div>
                                <div class="col col-6">Jln. Bukittinggi-Padang
                                </div>
                            </div>
                            </p>
                            <div class="row">
                                <div class="col col-6 col-lg-4">
                                    No HP Perusahaan
                                </div>
                                <div class="col col-6">082365748945
                                </div>
                            </div>
                            </p>
                            <div class="row">
                                <div class="col col-6 col-lg-4">
                                    Email Perusahaan
                                </div>
                                <div class="col col-6">aacom@gmail.com
                                </div>
                            </div>
                            </p>
                        </div>
                        <div class="d-flex justify-content-center mt-5">
                            <a href="{{ route('edit-industri-data-perusahaan') }}"
                                class="btn btn-danger rounded-pill form-control col-6">Edit Data Perusahaan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
