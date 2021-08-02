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

@isset($posts[0])
<div class="post-list">
    @foreach ($posts as $post)
    <div class="post-list__item">
        <post-index-card :post='@json($post)'>
        </post-index-card>
    </div>
    @endforeach
</div>
<x-paginate-links>
    {{$posts->links() }}
</x-paginate-links>
@endisset

@empty($posts)
<x-message-empty-collection>
    Список рецептов временно пуст
</x-message-empty-collection>
@endempty

@endsection