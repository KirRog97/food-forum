@extends('layouts.app')

@section('page_title')
Рецепт "{{ $post->title }}"
@endsection

@section('content')

<div class="flex flex-auto flex-wrap mx-auto">
    <div class="relative w-full bg-secondary-100">
        {{-- Post Image --}}
        <div class="relative pb-2/3">
            {{-- <img class="absolute h-full w-full object-cover" src="{{ $post->pictures->path}}" alt="Post
            image"> --}}

            <img class="absolute h-full w-full object-cover" src="/images/login_background.jpg" alt="Post image">
        </div>

        {{-- Post Actions: Like, Edit, Bookmark --}}
        <div class="absolute bottom-0 w-full h-10 sm:h-12 flex justify-between items-center bg-dark50 px-4 py-2">

            <like-button post_id="{{ $post->id }}"></like-button>

            @if ($post->user->hasOwnerRights($post->user->id))
            <a class="text-xs sm:text-base text-primary-200 hover:text-blue-700"
                href="{{ route('posts.edit', ['post' => $post]) }}">
                <i class="far fa-edit fa-lg mr-1"></i>
                <span>Редактировать</span>
            </a>
            @endif

            <a class="text-xs sm:text-base text-primary-200 hover:text-green-700" href="">
                <i class="far fa-bookmark fa-lg mr-1"></i>
                <span>Добавить в закладки</span>
            </a>
        </div>
    </div>

    {{-- Post main body--}}
    <div class="flex flex-auto flex-wrap justify-center bg-secondary-200 px-6 py-8 mx-auto space-y-6 sm:space-y-8">
        {{--Post title and description--}}
        <div class="flex justify-center flex-wrap">

            {{--Post title--}}
            <span class="text-2xl sm:text-4xl text-primary-600 text-center leading-tight font-handwritten mb-1 sm:mb-2">
                {{ $post->title }}
            </span>

            {{--Post description--}}
            <p class="w-full text-base sm:text-lg text-secondary-800 leading-snug sm:leading-normal">
                {{ $post->description }}
            </p>
        </div>

        {{--Post options--}}
        @include('posts.show-options')

        {{--Post instruction--}}
        <div class="flex justify-center flex-wrap">
            <span class="text-2xl sm:text-4xl text-primary-600 text-center leading-tight font-handwritten mb-1 sm:mb-2">
                Способ приготовления
            </span>
            <p class="w-full text-base sm:text-lg text-secondary-800 leading-snug sm:leading-normal">
                {{ $post->instruction }}
            </p>
        </div>

        {{--Post tags --}}
        <div class="flex justify-center flex-wrap">
            <span class="text-2xl sm:text-4xl text-primary-600 text-center leading-tight font-handwritten mb-1 sm:mb-2">
                Теги рецепта
            </span>

            @include('posts.show-tags')
        </div>

        <div class="flex justify-center flex-wrap">
            <span class="text-2xl sm:text-4xl text-primary-600 text-center leading-tight font-handwritten mb-1 sm:mb-2">
                Используемые ингредиенты
            </span>

            @include('posts.show-ingredient-cards')
        </div>
    </div>
</div>
@endsection
