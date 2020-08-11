@extends('layouts.app')

@section('page_title')
{{ __('Книга рецептов') }}
@endsection


@section('content')

<div class="container-fluid">

  <x-heading>
    Книга рецептов
  </x-heading>

<x-sub-heading>
    Ищите рецепты, выбирая категорию блюда, его подкатегорию, кухню или меню.
</x-sub-heading>

  <div class="post-list">

    @foreach ($posts as $post)
    <post-index-card userId="{{$post->user->id}}" username="{{$post->user->username}}"
      userAvatarPath="{{$post->user->avatar->path}}" :post='@json($post)' postPicturePath="{{$post->pictures->path}}"
      :postIngredients='@json($post->ingredients)'>
    </post-index-card>

    @endforeach
  </div>

  <div class="d-flex justify-content-center mt-3">
    {{ $posts->links() }}
  </div>

</div>
@endsection
