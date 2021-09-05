@extends('layouts.auth')

@section('page_title')
Сброс пароля
@endsection

@section('background_image')
<img class="img-fluid--cover" src="/images/login_background.jpg" alt="">
@endsection

@section('form')
<form class='w-full' method="POST" action="{{ route('password.email') }}">
  @csrf

  <div class="flex flex-col flex-wrap justify-center items-center">
    {{-- Email --}}
    <x-auth-form-field name='email' title='Почта' input_attributes='required autofocus'>
    </x-auth-form-field>
  </div>

  <div class="w-full flex justify-center items-center mt-6">
    <button class="text-lg bg-primary-500 hover:bg-primary-400 text-white font-handwritten py-2 px-4 rounded shadow"
      type="submit">
      Сбросить пароль
    </button>
  </div>
</form>
@endsection