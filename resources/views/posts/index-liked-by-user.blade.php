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
        <post-index-card :post='@json($post)'>
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
