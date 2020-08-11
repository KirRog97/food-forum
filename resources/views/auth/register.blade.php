@extends('layouts.auth')

@section('page_title')
Eда - Регистрация
@endsection

@section('background_image')
<img class="img-fluid--cover" src="/images/register_background.jpg" alt="">
@endsection

@section('form')
<form class="w-full bg-blue-900" method="POST" action="{{ route('register') }}">
    @csrf


    <div class="flex flex-row flex-wrap justify-center items-center">

        {{-- Username --}}
        <div class="w-full sm:w-10/12">
            <div class="sm:flex sm:items-center justify-center mb-4">
                <div class="sm:w-auto">
                    <label
                        class="block text-2xl sm:text-xl text-gray-500 font-handwritten font-light tracking-wide sm:text-right pr-4 mb-1 sm:mb-0"
                        for="username">
                        Имя
                    </label>
                </div>
                <div class="sm:w-7/12">
                    <input
                        class="w-full text-gray-700 bg-gray-300 focus:bg-white leading-tight appearance-none border-2 border-gray-200 rounded focus:outline-none focus:border-primary-500 transition-500ms py-2 px-4"
                        id="username" name="username" type="text" value="{{ old('username') }}" required autofocus>
                </div>
            </div>
            @if ($errors->has('username'))
            <span class="text-sm text-red-600" role="alert">
                <strong>
                    {{ $errors->first('username') }}
                </strong>
            </span>
            @endif
        </div>

        {{-- Email --}}
        <div class="w-full sm:w-10/12">
            <div class="sm:flex sm:items-center justify-center mb-4">
                <div class="sm:w-auto">
                    <label
                        class="block text-2xl sm:text-xl text-gray-500 font-handwritten font-light tracking-wide sm:text-right pr-4 mb-1 sm:mb-0"
                        for="email">
                        Почта
                    </label>
                </div>
                <div class="sm:w-7/12">
                    <input
                        class="w-full text-gray-700 bg-gray-300 focus:bg-white leading-tight appearance-none border-2 border-gray-200 rounded focus:outline-none focus:border-primary-500 transition-500ms py-2 px-4"
                        id="email" name="email" type="text" value="{{ old('email') }}" required>
                </div>
            </div>
            @if ($errors->has('email'))
            <span class="text-sm text-red-600" role="alert">
                <strong>
                    {{ $errors->first('email') }}
                </strong>
            </span>
            @endif
        </div>

        {{-- Password --}}
        <div class="w-full sm:w-10/12">
            <div class="sm:flex sm:items-center justify-center mb-4">
                <div class="sm:w-auto">
                    <label
                        class="block text-2xl sm:text-xl text-gray-500 font-handwritten font-light tracking-wide sm:text-right pr-4 mb-1 sm:mb-0"
                        for="password">
                        Пароль
                    </label>
                </div>
                <div class="sm:w-7/12">
                    <input
                        class="w-full text-gray-700 bg-gray-300 focus:bg-white leading-tight appearance-none border-2 border-gray-200 rounded focus:outline-none focus:border-primary-500 transition-500ms py-2 px-4"
                        id="password" name="password" type="text" value="{{ old('password') }}" required>
                </div>
            </div>
            @if ($errors->has('password'))
            <span class="text-sm text-red-600" role="alert">
                <strong>
                    {{ $errors->first('password') }}
                </strong>
            </span>
            @endif
        </div>

        {{-- Password Confirm--}}
        <div class="w-full sm:w-10/12">
            <div class="sm:flex sm:items-center justify-center mb-4">
                <div class="sm:w-auto">
                    <label
                        class="block text-2xl sm:text-xl text-gray-500 font-handwritten font-light tracking-wide sm:text-right pr-4 mb-1 sm:mb-0"
                        for="password_confirmation">
                        Пароль
                    </label>
                </div>
                <div class="sm:w-7/12">
                    <input
                        class="w-full text-gray-700 bg-gray-300 focus:bg-white leading-tight appearance-none border-2 border-gray-200 rounded focus:outline-none focus:border-primary-500 transition-500ms py-2 px-4"
                        id="password_confirmation" name="password_confirmation" type="text"
                        value="{{ old('password_confirmation') }}" required>
                </div>
            </div>
            @if ($errors->has('password_confirmation'))
            <span class="text-sm text-red-600" role="alert">
                <strong>
                    {{ $errors->first('password_confirmation') }}
                </strong>
            </span>
            @endif
        </div>

        <div class="w-full flex justify-center items-center">
            <button
                class="shadow bg-primary-500 hover:bg-primary-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                type="submit">
                Регистрация
            </button>
        </div>
</form>
@endsection
