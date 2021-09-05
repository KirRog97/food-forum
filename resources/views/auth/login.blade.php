@extends('layouts.auth')

@section('page_title')
Еда - Логин
@endsection

@section('background_image')
<img class="img-fluid--cover" src="/images/login_background.jpg" alt="">
@endsection

@section('form')
<form class="w-full bg-secondary-800" method="POST" action="{{ route('login') }}">
    @csrf

    <div class="flex flex-col flex-wrap justify-center items-center space-y-6">
        {{-- Email --}}
        <x-auth-form-field name='email' title='Имя' input_attributes='required autofocus'>
        </x-auth-form-field>
        {{-- Password --}}
        <x-auth-form-field name='password' title='Пароль' type='password' input_attributes='required'>
        </x-auth-form-field>
    </div>

    {{-- Remember --}}
    <div class="flex flex-col justify-center items-center mt-3 mb-6">
        <label class="w-auto flex items-center text-gray-200 font-bold" for="remember">
            <input class="leading-tight rounded mr-2" type="checkbox" name="remember" id="remember"
                {{ old('remember') ? 'checked' : '' }}>
            <span class="text-base font-handwritten font-light">
                Запомни меня
            </span>
        </label>
    </div>

    {{-- Submit --}}
    <div class="w-full flex justify-center items-center">
        <button class="text-lg bg-primary-500 hover:bg-primary-400 text-white font-handwritten py-2 px-4 rounded shadow"
            type="submit">
            Вход
        </button>
    </div>

    @if (Route::has('password.request'))
    <div class="w-full flex justify-center items-center mt-4">
        <a class="text-base text-primary-500 hover:text-primary-300 font-handwritten transition-500ms" hover:underline
            href="{{ route('password.request') }}">
            Забыли пароль?
        </a>
    </div>
    @endif

</form>
@endsection