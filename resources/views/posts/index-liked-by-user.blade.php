@extends('layouts.app')

@section('page_title')
Книга любимых рецептов
@endsection


@section('content')

<x-heading>
    Любимые рецепты
</x-heading>

<x-sub-heading>
    Здесь собраны все рецепты, которые понравились пользователю
</x-sub-heading>

@if (count($posts) > 0)

<div class="post-list">
    @foreach ($posts as $post)
    <div class="post-list__item">
        <post-index-card userId="{{$post->user->id}}" username="{{$post->user->username}}"
            userAvatarPath="{{$post->user->avatar->path}}" :post='@json($post)'
            postPicturePath="{{$post->pictures->path}}" :postIngredients='@json($post->ingredients)'>
        </post-index-card>
    </div>
    @endforeach
</div>

</div>
@else

<x-message-empty-collection>
    Пользователь пока не дал оценки ни одному рецепту
</x-message-empty-collection>

@endif

@endsection
