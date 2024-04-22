<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('dist/css/iziToast.min.css') }}">
    <script src="{{ asset('dist/js/iziToast.min.js') }}"></script>
</head>

<body class="bg-warning">
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col col-4">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col col-12">
                                <div class="p-5 text-center">
                                    <div class="row mb-2">
                                        <div class="col col-5 text-end">
                                            <img src="{{ asset('/dist/img/Tilkam.png') }}" alt=""
                                                class="img-fluid" style="max-width: 4rem">
                                        </div>
                                        <div class="col col-6 d-flex justify-start">
                                            <h1 class="text-dark fw-bold pt-3">SIPTS</h1>
                                        </div>
                                        <div class="col col-12 mt-3">
                                            <p class="lead fs-4">Sistem Informasi Prakerin dan Tracerstudy</p>
                                        </div>
                                    </div>

                                    <form method="POST" action="{{ route('signup_submit') }}">
                                        @csrf

                                        <div class="form-group mt-3">
                                            <input type="text" class="form-control rounded-pill" name="name"
                                                placeholder="Name" value="{{ old('name') }}" required autofocus>
                                        </div>

                                        <div class="form-group mt-3">
                                            <input type="email" class="form-control rounded-pill" name="email"
                                                placeholder="E-Mail Address" value="{{ old('email') }}" required>
                                        </div>

                                        <div class="form-group mt-3">
                                            <input type="number" class="form-control rounded-pill" name="hp"
                                                placeholder="No HP" value="{{ old('hp') }}" required>
                                        </div>

                                        <div class="form-group mt-3">
                                            <input type="password" class="form-control rounded-pill" name="password"
                                                placeholder="Password" required>
                                        </div>

                                        <div class="form-group mt-3">
                                            <input type="password" class="form-control rounded-pill"
                                                name="password_confirmation" placeholder="Confirm Password" required>
                                        </div>

                                        <div class="form-group mt-3">
                                            <button type="submit"
                                                class="btn btn-danger form-control btn-block rounded-pill">
                                                Sing Up
                                            </button>
                                        </div>
                                    </form>

                                    <hr>

                                    <div class="text-center">
                                        <span class="small ">Sudah punya akun? </span><a
                                            class="small text-decoration-none text-dark"
                                            href="{{ route('login-show') }}">
                                            Login
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                iziToast.error({
                    title: '',
                    position: 'topRight',
                    message: '{{ $error }}',
                });
            </script>
        @endforeach

    @endif
    @if (session()->get('success'))
        <script>
            iziToast.success({
                title: '',
                position: 'topRight',
                message: '{{ session()->get('success') }}',
            });
        </script>
    @endif

    @if (session()->get('error'))
        <script>
            iziToast.error({
                title: '',
                position: 'topRight',
                message: '{{ session()->get('error') }}',
            });
        </script>
    @endif

</body>

</html>
