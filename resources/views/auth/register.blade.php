@extends('layouts.auth')

@section('page_title')
Eда - Регистрация
@endsection

@section('background_image')
<img class="img-fluid--cover" src="/images/register_background.jpg" alt="">
@endsection

@section('form')
<form class="w-full" method="POST" action="{{ route('users.store') }}">
    @csrf

    <div class="flex flex-col flex-wrap justify-center items-center space-y-6">
        <x-auth-form-field name='username' title='Имя' input_attributes='required autofocus'>
        </x-auth-form-field>

        <x-auth-form-field name='email' title='Почта' input_attributes='required'>
        </x-auth-form-field>

        <x-auth-form-field name='password' title='Пароль' type='password' input_attributes='required'>
        </x-auth-form-field>

        <x-auth-form-field name='password_confirmation' title='Проверка пароля' type='password'
            input_attributes='required'>
        </x-auth-form-field>

        <div class="w-full flex justify-center items-center">
            <button
                class="text-lg bg-primary-500 hover:bg-primary-400 text-white font-handwritten py-2 px-4 rounded shadow"
                type="submit">
                Регистрация
            </button>
        </div>
</form>
@endsection