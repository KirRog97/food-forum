@extends('layouts.app')
@section('page_title')
Eда - Главная
@endsection

@section('content')
<x-heading>
    Подбор рецптов
</x-heading>

<post-selection></post-selection>

<news-board></news-board>

<x-heading>
    Топы рецептов
</x-heading>

<post-trands></post-trands>



@endsection