@extends('layouts.app')

@section('page_title')
Рецепт "{{ $post->title }}"
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12 p-0" style="background-color: lightgrey;">
      <div class="card text-white border-0 position-relative">
        <img class="card-img-top img-fluid-center h-25" src="{{ $post->pictures->path}}" alt="Post image">
        <div class="card-body d-flex flex-row justify-content-between position-absolute fixed-bottom bg-dark50">

          <like-button post_id="{{ $post->id }}"></like-button>

          @if ($post->user->hasOwnerRights($post->user->id))
          <a class="btn-edit" href="{{ route('posts.edit', $post) }}">
            <i class="far fa-edit"></i>
            <span>Редактировать</span>
          </a>
          @endif
          <a class="btn-bookmark" href="">
            <i class="far fa-bookmark mr-1"></i>
            <span>Добавить в закладки</span>
          </a>
        </div>
      </div>

      <div class="container-fluid mb-3">
        <h2 class="post-about-heading">
          {{ $post->title }}
        </h2>
        <p class="post-about-paragraph">
          {{ $post->description }}
        </p>

        @include('posts.show-options')

        <h3 class="post-about-heading">
          Способ приготовления
        </h3>
        <p class="post-about-paragraph">
          {{ $post->instruction }}
        </p>

        <h3 class="post-about-heading">
          Теги рецепта
        </h3>

        @include('posts.show-tags')

        <h3 class="post-about-heading">
          Используемые ингредиенты
        </h3>

        @include('posts.show-ingredient-cards')

      </div>
    </div>
  </div>
</div>
@endsection
