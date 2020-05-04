@extends('layouts.app')

@section('page_title')
Рецепт
@endsection

@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col p-0" style="background-color: lightgrey;">
      <div class="card text-white border-0 position-relative">
        <img class="card-img-top" src="{{ $ingredient->picture->path }}" alt="Ingredient image">
      </div>

      <div class="my-3">
        <h2 class="post-about-heading">{{ $ingredient->name }}</h2>
        <p class="post-about-paragraph">{{ $ingredient->description }}</p>
      </div>
    </div>
  </div>
</div>
@endsection
