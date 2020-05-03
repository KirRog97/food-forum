@extends('layouts.auth')

@section('page_title')
Регистрация
@endsection

@section('background_image')
<img class="img-fluid-center" src="/images/register_background.jpg" alt="">
@endsection

@section('form')
<form method="POST" action="{{ route('register') }}">
  @csrf

  <div class="form-group row justify-content-center">
    <div class="col-md-10">
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text border-primary bg-dark50 text-primary">
            <i class="fas fa-user"></i>
          </div>
        </div>

        <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
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

        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
          value="{{ old('email') }}" required>

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

        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
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

        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
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
@endsection
