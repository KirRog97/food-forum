<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Вход</title>

    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" /> --}}
    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet" type="text/css" />

</head>

<body>
    <div class="container-fluid vh-100 p-0">
        <div class="row vh-100 m-0">
            <div class="col-2 col-sm-6 col-xl-8 p-0">
                <img class="img-fluid-center" src="/images/register_background.jpg" alt="">
            </div>

            <div
                class="col-10 col-sm-6 col-xl-4 justify-content-end align-content-center bg-dark border-left border-primary">
                <div class="logo">
                    <a href="/home" data-toggle="tooltip" data-placement="bottom" title="На главную">
                        Еда
                    </a>
                </div>
                <div class="card bg-transparent text-primary border-0">
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row justify-content-center p-0">
                                <div class="col-md-10">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text border-primary bg-dark50 text-primary">
                                                <i class="fas fa-user"></i>
                                            </div>
                                        </div>

                                        <input id="username" type="text"
                                            class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                            name="username" value="{{ old('username') }}" required autofocus>

                                        @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <div class="col-md-10">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text border-primary bg-dark50 text-primary">
                                                <i class="fas fa-envelope"></i>
                                            </div>
                                        </div>

                                        <input id="email" type="email"
                                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <div class="col-md-10">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text border-primary bg-dark50 text-primary">
                                                <i class="fas fa-key"></i>
                                            </div>
                                        </div>

                                        <input id="password" type="password"
                                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            name="password" required>

                                        @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <div class="col-md-10">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text border-primary bg-dark50 text-primary">
                                                <i class="fas fa-check-double"></i>
                                            </div>
                                        </div>

                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row d-flex justify-content-center mb-0">
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary bg-dark50 text-light px-3 py-1">
                                        Регистрация
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>