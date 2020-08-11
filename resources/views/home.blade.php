@extends('layouts.app')
@section('page_title')
Eда - Главная
@endsection

@section('content')
<x-heading>
    Подбор рецптов
</x-heading>

<post-selection></post-selection>

@include('layouts.compilation')

@endsection