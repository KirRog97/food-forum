@extends('layouts.app')

@section('page_title')
Eда - Книга ингредиентов
@endsection

@section('content')

<x-heading>
    Книга ингредиентов
</x-heading>

<x-sub-heading>
    Здесь вы можете ознакомиться с ингредиентами, которые будут использоваться в ваших рецептах.
</x-sub-heading>

<div class="space-y-8 md:space-y-6">
    @isset($ingredients)

    @foreach ($ingredients as $ingredient)
    <x-index-ingredient-card :ingredient="$ingredient">
    </x-index-ingredient-card>
    @endforeach

    <x-paginate-links>
        {{$ingredients->links()}}
    </x-paginate-links>

    @endisset

    @empty($ingredients)
    <x-message-empty-collection>
        Список ингредиентов временно пуст
    </x-message-empty-collection>
    @endempty
</div>

@endsection