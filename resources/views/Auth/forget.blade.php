<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('dist_frontend/img/CODIAS.png') }}" type="image/png">
    <title>Forget Password</title>
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
                                            <p class="lead fs-4">Reset Password</p>
                                        </div>
                                    </div>

                                    <form action="{{ route('forget_submit') }}" method="post">
                                        @csrf
                                        <div class="form-outline text-start mt-2">
                                            <input type="email" id="form2Example17" class="form-control rounded-pill"
                                                name="email" placeholder="Email address" />
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="pt-1 mt-3 text-start">
                                            <button class="btn btn-danger btn-block form-control rounded-pill"
                                                type="submit">
                                                Send Password Reset Link
                                            </button>
                                        </div>
                                    </form>
                                    <div class="pt-1 mt-4 text-end">
                                        <a href="{{ route('login-show') }}" class="text-danger text-decoration-none"
                                            type="submit">
                                            Back to Sign In Page
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
