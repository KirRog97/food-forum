@extends('layouts.app')

@section('page_title')
Новый рецепт
@endsection

@section('content')

<x-heading>
    Создание рецепта
</x-heading>

<post-create-form></post-create-form>

@endsection
