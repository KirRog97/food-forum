@extends('layouts.app')

@section('page_title')
Регистрация
@endsection

@section('content')

<div class="container-fluid">
    <form class="form-custom-foodrorum " method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <label for="name">{{ __('Имя:') }}</label>
            <input id="name" type="text" name="name" class="form-control custom-control-inline {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" required autofocus>
               
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif 
        </div>

        <div class="form-group">
            <label for="email">{{ __('Email:') }}</label>
            <input id="email" type="text" name="email" class="form-control custom-control-inline {{ $errors->has('email') ? ' is-invalid' : '' }}" required>
            
            @if ($errors->has('last_name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('last_name') }}</strong>
                </span>
            @endif 
       
        </div>

        {{-- <div class="form-group">
            <label for="avatar">{{ __('Аватар:') }}</label>
            <div class="custom-file">
                <input id="avatar" type="file" class="custom-file-input">
                <label for="avatar"class="custom-file-label text-muted" >Выберите файл</label>
            </div>

            @if ($errors->has('last_name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('last_name') }}</strong>
                </span>
            @endif 
        </div> --}}

        <div class="form-group">
            <label for="password">{{ __('Пароль:') }}</label>
            <input id="password" type="password" name="password" class="form-control custom-control-inline {{ $errors->has('password') ? ' is-invalid' : '' }}" required>
        
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif 
        
        </div>

        <div class="form-group mb-4">
            <label for="password-confirm">{{ __('Подтверждение пароля:') }}</label>
            <input id="password-confirm" type="password" name="password_confirmation" class="form-control custom-control-inline" required>        
        </div>

        <button type="submit" class="btn btn-primary">
            {{__('Зарегистрироваться')}}
        </button>
    </form>
</div>

@endsection
