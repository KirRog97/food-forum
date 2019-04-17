@extends('layouts.app')

@section('page_title')
{{ __('Рецепт') }}
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col p-0" style="background-color: lightgrey;">

            <div class="card text-white border-0 position-relative">
                {{-- <img class="card-img-top" src="/storage/recipes/{{ $post->picture->pic_path }}" alt=""> --}}
                <img class="card-img-top" src="/images/recipes/плов.jpg" alt="">

                <div class="card-body d-flex flex-row bg-dark50 position-absolute fixed-bottom justify-content-between">
                    <a href="" class="btn-like">
                        {{-- for hover --}}
                        {{-- <i class="fas fa-heart"></i> --}}
                        <i class="far fa-heart mr-1"></i>
                        <span>{{ __('Нравится') }}</span>
                    </a>
                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">
                            {{-- for hover --}}
                            {{-- <i class="fas fa-trash-alt mr-1"></i> --}}
                            <i class="fas fa-trash mr-1"></i>
                            <span>{{ __('Удалить') }}</span>
                        </button>
                    </form>
                    <a href="" class="btn-bookmark">
                        {{-- for hover --}}
                        {{-- <i class="fa fa-bookmark" aria-hidden="true"></i> --}}
                        <i class="far fa-bookmark mr-1"></i>
                        <span>{{ __('Добавить в закладки') }}</span>
                    </a>
                </div>
            </div>

            <form action="{{ route('posts.update', ['id'=> $post->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="recipe-about text-justify">
                    <div class="form-group px-4 my-4">
                        <label for="title">{{ __('Название блюда:') }}</label>
                        <input type="text" class="form-control text-center" name="title" id="title"
                            value="{{ $post->title }}" placeholder="{{ $post->title }}" required>
                    </div>
                    <p>
                        <div class="form-group px-4">
                            <label for="description">{{ __('Описание блюда:') }}</label>
                            <textarea class="form-control text-justify" name="description" id="description" rows="3"
                                required>
                            </textarea>
                        </div>
                    </p>
                </div>

                <div class="container-fluid my-4">
                    <div class="row justify-content-around px-2">
                        <div class="col-4 d-flex input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-chart-pie"></i></span>
                            </div>
                            <input type="number" class="form-control text-center" min="1" name="COP" id="COP"
                                value="{{ $post->COP }}" placeholder="{{ $post->COP }}" data-toggle="tooltip"
                                data-placement="bottom" title="Пожалуйста,введите число" required>
                            <div class="input-group-append">
                                <span class="input-group-text">{{ __('порций') }}</span>
                            </div>
                        </div>
                        <div class="col-4 d-flex input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                            </div>
                            <input type="number" class="form-control text-center" min="1" name="TTC" id="TTC"
                                value="{{ $post->TTC }}" placeholder="{{ $post->TTC }}" data-toggle="tooltip"
                                data-placement="bottom" title="Пожалуйста,введите число" required>
                            <div class="input-group-append">
                                <span class="input-group-text">{{ __('минут') }}</span>
                            </div>
                        </div>
                        <div class="col-4 d-flex input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-running"></i></span>
                            </div>
                            <input type="number" class="form-control text-center" min="1" name="Kcal" id="Kcal"
                                value="{{ $post->Kcal }}" placeholder="{{ $post->Kcal }}" data-toggle="tooltip"
                                data-placement="bottom" title="Пожалуйста,введите число" required>
                            <div class="input-group-append">
                                <span class="input-group-text"{{ __('калорий') }}></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group px-4 mb-4">
                    <label for="Ingredients">{{ __('Добавление ингредиентов:') }}</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button class="btn btn-primary" type="button">{{ __('Добавить') }}</button>
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
            <button type="submit" class="btn btn-lg btn-primary">{{ __('Сохранить изменения') }}</button>
        </div>
        </form>
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
