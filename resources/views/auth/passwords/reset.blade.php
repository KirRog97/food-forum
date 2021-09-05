@extends('layouts.auth')

@section('page_title')
Восстановление пароля
@endsection

@section('background_image')
<img class="img-fluid-center" src="/images/login_background.jpg" alt="">
@endsection

@section('form')
<form class="w-full" method="POST" action="{{ route('password.update') }}">
  @csrf

  <input type="hidden" name="token" value="{{ $token }}">

  <div class="flex flex-col flex-wrap justify-center items-center space-y-6">
    {{-- Email --}}
    <x-auth-form-field name='email' title='Имя' input_attributes='required autofocus'>
    </x-auth-form-field>
    {{-- Password --}}
    <x-auth-form-field name='password' title='Пароль' type='password' input_attributes='required'>
    </x-auth-form-field>
    {{-- Password_confirmation --}}
    <x-auth-form-field name='password_confirmation' title='Пароль' type='password' input_attributes='required'>
    </x-auth-form-field>
  </div>

  {{-- Submit --}}
  <div class="w-full flex justify-center items-center mt-6">
    <button class="text-lg bg-primary-500 hover:bg-primary-400 text-white font-handwritten py-2 px-4 rounded shadow"
      type="submit">
      Сбросить пароль
    </button>
  </div>
</form>
@endsection