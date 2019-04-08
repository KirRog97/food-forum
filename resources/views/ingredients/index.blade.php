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

    <div class="ingredient-element mt-3 p-0 row">
        <div class="col-3 p-0">
            <img class="img-fluid" src="/images/recipes/харчо.jpg" alt="">
        </div>
        <div class="col p-2">

            <div class="breadcrumbs">
                <ul class=" d-flex flex-row justify-content-start mb-3">
                    <li class="breadcrumbs-item"><a href="#">Russian Kitchen</a></li>
                    <li class="breadcrumbs-item"><a href="#">Food Category</a></li>
                </ul>
            </div>
            
            <div class="ingredient-element-recipe-title">
                <h3>
                    <a href="/ingredients/{{$ingredient->id}}">
                        <span>{{$ingredient->title}}</span>
                    </a>
                </h3>
            </div>

            <div class="ingredient-element-author-title">
                <span>Автор: Антон Антонов</span>
            </div>

            <div class="recipe-socials-widgets">
                <div class="widget-like">
                    <i class="fas fa-heart"></i>
                    <span class="widget-like-count">15</span>
                </div>
                <div class="widget-vk">
                    <i class="fab fa-vk"></i>
                </div>
                <div class="widget-facebook">
                    <i class="fab fa-facebook"></i>
                </div>
            </div>

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
