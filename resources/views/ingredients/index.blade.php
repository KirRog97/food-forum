@extends('layouts.app')
@section('page_title')
Книга ингредиентов
@endsection

@section('content')

<div class="container-fluid">

    @heading
    Книга ингредиентов
    @endheading


    <div class="text-center text-justify text-muted mb-4">
        <p>
            Здесь вы можете ознакомиться с ингредиентами, которые будут использоваться в ваших рецептах.
        </p>
    </div>

    @if (count($ingredients) > 0)

    @foreach ($ingredients as $ingredient)

    <div class="row w-100 p-2">
        <div class="col-4 p-0 rounded">
            @if ($ingredient->picture->path && $ingredient->picture->path === '0')
            <img class="img-fluid-center" src="/storage/{{ $ingredient->picture->path }}" alt="Ingredient Picture">
            @else
            <img class="img-fluid-center" src="/images/ingredients/meet.jpg" alt="Ingredient Picture">
            @endif
        </div>
        <div class="col px-4 text-justify text-secondary rounded">
            <a class="text-center font-weight-light py-2" href="/ingredients/{{ $ingredient->id }}">
                <h3>
                    {{ $ingredient->name }}
                </h3>
            </a>
            <hr>
            <p class="text-wrap px-3 m-auto">
                @if ($ingredient->description)
                {{ $ingredient->description }}
                @else
                Для данного ингредиента описание отсутствует
                @endif
            </p>
        </div>
    </div>

    @endforeach

    <div class="d-flex justify-content-center mt-3">
        {{$ingredients->links()}}
    </div>

    @else
    <div class="alert-danger rounded-pill text-center p-1 m-2 border border-danger text-uppercase">
        <h1>Эта книга пока что пуста... Пока что...</h1>
    </div>
    @endif

</div>
@endsection