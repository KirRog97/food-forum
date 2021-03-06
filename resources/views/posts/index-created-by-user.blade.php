@extends('layouts.app')

@section('page_title')
Книга созданных рецептов
@endsection


@section('content')

<x-heading>
    Созданные рецепты
</x-heading>

<x-sub-heading>
    Здесь собраны все рецепты, которые были написанны пользователем
</x-sub-heading>

@if (count($posts) > 0)

<div class="post-list">
    @foreach ($posts as $post)
    <div class="post-list__item">
        <post-index-card :post='@json($post)'>
        </post-index-card>
    </div>
    @endforeach
</div>

@else

<x-message-empty-collection>
    Пользователь пока не создал ни одного рецепта
</x-message-empty-collection>

@endif
@endsection
