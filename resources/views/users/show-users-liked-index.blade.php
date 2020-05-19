@extends('layouts.app')

@section('page_title')
Книга любимых рецептов
@endsection


@section('content')

@if (count($posts) > 0)
<div class="container-fluid">

  <x-heading>
    Любимые рецепты
  </x-heading>

  <div class="position-relative text-center text-muted text-justify mb-5">
    <p>
      Здесь собраны все рецепты, которые понравились пользователю
    </p>
  </div>

  <div class="post-list">
    @foreach ($posts as $post)
    <post-index-card userId="{{$post->user->id}}" username="{{$post->user->username}}"
      userAvatarPath="{{$post->user->avatar->path}}" :post='@json($post)' postPicturePath="{{$post->pictures->path}}"
      :postIngredients='@json($post->ingredients)'>
    </post-index-card>
    @endforeach
  </div>

</div>
@else
<div class="container-fluid">

  <x-heading>
    Любимые рецепты
  </x-heading>

  <div class="position-relative text-center text-muted text-justify mb-5">
    <p>
      Пользователь пока не дал оценки ни одному рецепту
    </p>
  </div>

</div>
@endif

@endsection
