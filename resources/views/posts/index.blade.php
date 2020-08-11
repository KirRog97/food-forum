@extends('layouts.app')

@section('page_title')
{{ __('Книга рецептов') }}
@endsection


@section('content')

<x-heading>
    Книга рецептов
</x-heading>

<x-sub-heading>
    Ищите рецепты, выбирая категорию блюда, его подкатегорию, кухню или меню.
</x-sub-heading>


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

<x-paginate-links>
    {{ $posts->links() }}
</x-paginate-links>

@endsection
