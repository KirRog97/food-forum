@extends('layouts.app')

@section('page_title')
{{ __('Книга рецептов') }}
@endsection


@section('content')

<div class="container-fluid">

  <x-heading>
    Книга рецептов
  </x-heading>

  <div class="position-relative text-center text-muted text-justify mb-5">
    <p>
      Ищите рецепты, выбирая категорию блюда, его подкатегорию, кухню или меню.
    </p>
  </div>

  <div class="post-list">

    @foreach ($posts as $post)
    <post-index-card userId="{{$post->user->id}}" username="{{$post->user->username}}"
      userAvatarPath="{{$post->user->avatar->path}}" postId="{{$post->id}}" postPicturePath="{{$post->pictures->path}}"
      postTitle="{{$post->title}}" postTTC="{{$post->TTC}}" postCOP="{{$post->COP}}" postKcal="{{$post->Kcal}}"
      :postIngredients='@json($post->ingredients)'>
    </post-index-card>
    @endforeach
  </div>

  <div class="d-flex justify-content-center mt-3">
    {{ $posts->links() }}
  </div>

</div>
@endsection
