@extends('layouts.auth')

@section('page_title')
Логин
@endsection

@section('background_image')
<img class="img-fluid-center" src="/images/login_background.jpg" alt="">
@endsection

@section('form')
<form method="POST" action="{{ route('login') }}">
  @csrf

  <div class="form-group row justify-content-center">
    <div class="col-md-10">
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text border-primary bg-dark50 text-primary">
            <i class="fas fa-envelope"></i>
          </div>
        </div>

        <input id="email" type="email" class="form-control shadow-none {{ $errors->has('email') ? ' is-invalid' : '' }}"
          name="email" value="{{ old('email') }}" required autofocus>

        @if ($errors->has('email'))
        <span class="invalid-feedback" role="alert">
          <strong>
            {{ $errors->first('email') }}
          </strong>
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
          class="form-control shadow-none {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

        @if ($errors->has('password'))
        <span class="invalid-feedback" role="alert">
          <strong>
            {{ $errors->first('password') }}
          </strong>
        </span>
        @endif
      </div>
    </div>
  </div>

  <div class="form-group row d-flex justify-content-center">
    <div class="form-check custom-checkbox">
      <input class="custom-control-input" type="checkbox" name="remember" id="remember"
        {{ old('remember') ? 'checked' : '' }}>

      <label class="custom-control-label text-primary" for="remember">
        {{ __('Запомни меня') }}
      </label>
    </div>
  </div>

  <div class="form-group row d-flex justify-content-center mb-0">
    <button type="submit" class="btn btn-primary bg-dark50 text-light px-3 py-1">
      Вход
    </button>
  </div>

  @if (Route::has('password.request'))
  <div class="form-group row d-flex justify-content-center mt-2">
    <a class="btn btn-link" href="{{ route('password.request') }}">
      Забыли пароль?
    </a>
  </div>
  @endif

</form>
@endsection
