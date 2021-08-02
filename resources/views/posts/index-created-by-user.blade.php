@extends('layouts.app')

@section('page_title')
Книга созданных рецептов
@endsection


@section('content')

<x-heading>
    Созданные рецепты
</x-heading>

<x-sub-heading>
    Здесь собраны все рецепты, которые были созданы пользователем
</x-sub-heading>

@isset($posts[0])
<div class="post-list">
    @foreach ($posts as $post)
    <div class="post-list__item">
        <post-index-card :post='@json($post)'>
        </post-index-card>
    </div>
    @endforeach
</div>

{{-- <x-paginate-links>
    {{$posts->links() }}
</x-paginate-links> --}}

@endisset

@empty($posts)
<x-message-empty-collection>
    Пользователь пока не дал оценки ни одному рецепту
</x-message-empty-collection>
@endempty

@endsection