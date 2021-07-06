@extends('layouts.app')

@section('page_title')
Рецепты блюд с использовованием "{{$ingredient->name}}"
@endsection


@section('content')

<x-heading>
    Рецепты блюд с использовованием "{{$ingredient->name}}"
</x-heading>

<div class="post-list">
    @foreach ($posts as $post)
    <div class="post-list__item">
        <post-index-card :post='@json($post)'>
        </post-index-card>
    </div>
    @endforeach
</div>

<x-paginate-links>
    {{ $posts->links() }}
</x-paginate-links>

@endsection