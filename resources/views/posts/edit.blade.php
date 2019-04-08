@extends('layouts.app')

@section('page_title')
Рецепт
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col p-0" style="background-color: lightgrey;">
            <div class="card text-white border-0 position-relative">

                <img class="card-img-top" src="/images/recipes/плов.jpg" alt="">

                <div class="card-body d-flex flex-row bg-dark50 position-absolute fixed-bottom justify-content-between">
                    <a href="" class="btn-like">
                        {{-- for hover --}}
                        {{-- <i class="fas fa-heart"></i> --}}
                        <i class="far fa-heart mr-1"></i>
                        <span>Нравится</span>
                    </a>
                    <a href="" class="btn-edit">
                        {{-- for hover --}}
                        {{-- <i class="fas fa-edit"></i> --}}
                        <i class="far fa-edit"></i>
                        <span>Редактировать</span>
                    </a>
                    <a href="" class="btn-bookmark">
                        {{-- for hover --}}
                        {{-- <i class="fa fa-bookmark" aria-hidden="true"></i> --}}
                        <i class="far fa-bookmark mr-1"></i>
                        <span>Добавить в закладки</span>
                    </a>
                </div>
            </div>

            <div class="recipe-about text-justify">

                <div class="form-group px-4 my-4">
                    <label for="title">Название блюда:</label>
                    <input type="text" class="form-control text-center" name="title" id="title"
                        value="{{ $post->title }}" placeholder="{{ $post->title }}">
                </div>

                <p>
                    <div class="form-group px-4">
                        <label for="description">Описание блюда:</label>
                        <textarea class="form-control text-justify" name="description" id="description"
                            rows="3"></textarea>
                    </div>
                </p>
            </div>

            {{-- <div class="container-fluid my-4">
                <div class="row justify-content-around px-4">
                    <div class="col-2 p-0 text-small">
                        <i class="fas fa-chart-pie fa-lg mr-1"></i>
                        <span>{{ $post->kitchen->name }} порций</span>
        </div>
        <div class="col-2 p-0 text-small">
            <i class="far fa-clock fa-lg mr-1"></i>
            <span>{{ $post->category->name }} минут</span>
        </div>
    </div>
</div> --}}

<div class="container-fluid my-4">
    <div class="row justify-content-around px-2">
        <div class="col-4 d-flex input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-chart-pie"></i></span>
            </div>
            <input type="number" class="form-control text-center" min="1" name="COP" id="COP" value="{{ $post->COP }}"
                placeholder="{{ $post->COP }}">
            <div class="input-group-append">
                <span class="input-group-text">порций</span>
            </div>
        </div>
        <div class="col-4 d-flex input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-clock"></i></span>
            </div>
            <input type="number" class="form-control text-center" min="1" name="TTC" id="TTC" value="{{ $post->TTC }}"
                placeholder="{{ $post->TTC }}">
            <div class="input-group-append">
                <span class="input-group-text">минут</span>
            </div>
        </div>
        <div class="col-4 d-flex input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-running"></i></span>
            </div>
            <input type="number" class="form-control text-center" min="1" name="Kcal" id="Kcal"
                value="{{ $post->Kcal }}" placeholder="{{ $post->Kcal }}">
            <div class="input-group-append">
                <span class="input-group-text">калорий</span>
            </div>
        </div>
    </div>
</div>

<div class="form-group px-4 mb-4">
    <label for="Ingredients">Добавление ингредиентов:</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <button class="btn btn-primary" type="button">Добавить</button>
        </div>
        <input type="text" class="form-control" placeholder="" name="Ingredients" id="Ingredients">
    </div>
</div>

<div class="container-fluid">
    <div class="card-columns">
        @for ($i = 0; $i < 6; $i++) <div class="card border-0 bg-dark50 text-light shadow-sm">
            <img class="card-img-top" src="/images/category_meat.jpg" alt="">
            <div class="card-body p-1 text-center">
                <h4 class="card-title mb-1">Масло</h4>
                <p class="card-text">200гр</p>
            </div>
    </div>
    @endfor
</div>
</div>

<div class="row justify-content-center my-2">
    <button type="submit" class="btn btn-lg btn-primary">Сохранить изменения</button>
</div>

</div>

<div class="col-3 p-0 ml-2">
    <div class="container p-0">
        <div class="post-sidecolumn flex-column">


            @for ($i = 0; $i < 8; $i++) <div class="card p-0  border-0">
                <img class="card-img-top" src="/images/spice.jpg" alt="IMG">
                <div class="post-sidecolumn-text card-img-overlay">
                    <h3>
                        <a href="#">
                            <span>Рецепты лазаньи с молоком</span>
                        </a>
                    </h3>
                </div>
        </div>
        @endfor
    </div>
</div>

</div>
</div>
</div>

@endsection
