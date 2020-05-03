@extends('layouts.auth')

@section('page_title')
Сброс пароля
@endsection

@section('background_image')
<img class="img-fluid-center" src="/images/login_background.jpg" alt="">
@endsection

@section('form')
@if (session('status'))
<div class="alert alert-success" role="alert">
  {{ session('status') }}
</div>
@endif

<form method="POST" action="{{ route('password.email') }}">
  @csrf

  <div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right text-primary">
      Адрес почты:
    </label>

    <div class="col-md-6">
      <input id="email" type="email" class="form-control shadow-none {{ $errors->has('email') ? ' is-invalid' : '' }}"
        name="email" value="{{ old('email') }}" required>

      @if ($errors->has('email'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('email') }}</strong>
      </span>
      @endif
    </div>
  </div>

  <div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
      <button type="submit" class="btn btn-primary">
        Сбросить пароль
      </button>
    </div>
  </div>
</form>
@endsection
