@extends('layouts.app')

@section('page_title')
{{ __('Рецепт') }}
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col p-0" style="background-color: lightgrey;">

            <div class="card text-white border-0 position-relative">
                <img class="card-img-top" src="{{ $post->pictures->path }}" alt="Post picture">
                <div class="card-body d-flex flex-row bg-dark50 position-absolute fixed-bottom justify-content-center">
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
                </div>
            </div>

            <form action="{{ route('posts.update', ['id'=> $post->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="container-fluid form-custom-secondprimary py-4">
                    <div class="form-group d-flex justify-content-center position-relative pt-4 mt-4">
                        <label class="text-shadow shadow" for="title">
                            {{ __('Название рецепта') }}
                        </label>
                        <input type="text" class="form-control text-center" name="title" id="title"
                            value="{{ $post->title }}" placeholder="{{ $post->title }}" required>
                    </div>

                    <div class="row justify-content-around">
                        <div class="col-12 col-sm-12 col-md-4 d-flex input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text border-primary bg-dark50 text-primary text-shadow">
                                    <i class="fas fa-chart-pie"></i>
                                </div>
                            </div>
                            <input type="number" class="form-control text-center" min="1" name="COP" id="COP"
                                value="{{ $post->COP }}" placeholder="{{ $post->COP }}">
                            <div class="input-group-append">
                                <div class="input-group-text border-primary bg-dark50 text-primary text-shadow">
                                    <span>{{ __('порций') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 d-flex input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text border-primary bg-dark50 text-primary text-shadow">
                                    <span><i class="fas fa-clock"></i></span>
                                </div>
                            </div>
                            <input type="number" class="form-control text-center" min="1" name="TTC" id="TTC"
                                value="{{ $post->TTC }}" placeholder="{{ $post->TTC }}">
                            <div class="input-group-append">
                                <div class="input-group-text border-primary bg-dark50 text-primary text-shadow">
                                    <span>{{ __('минут') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 d-flex input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text border-primary bg-dark50 text-primary text-shadow">
                                    <span><i class="fas fa-running"></i></span>
                                </div>
                            </div>
                            <input type="number" class="form-control text-center" min="1" name="Kcal" id="Kcal"
                                value="{{ $post->Kcal }}" placeholder="{{ $post->Kcal }}">
                            <div class="input-group-append">
                                <div class="input-group-text border-primary bg-dark50 text-primary text-shadow">
                                    <span>{{ __('калорий') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <post-selection-options></post-selection-options>
                    <ingredient-selection></ingredient-selection>

                    <picture-downloading :isMultipleDownloadMode="false">
                    </picture-downloading>

                    <div class="form-group d-flex justify-content-center position-relative pt-2 mt-5">
                        <label class="col-form-label text-shadow shadow px-3" for="description">
                            {{ __('Описание блюда') }}
                        </label>
                        <textarea class="form-control text-primary text-justify" name="description" id="description"
                            rows="5" value="{{ old('description') }}" required>
                            {{ $post->description }}
                        </textarea>
                    </div>

                    <div class="form-group d-flex justify-content-center position-relative pt-2 mt-5">
                        <label class="col-form-label text-shadow shadow px-3" for="instruction">
                            {{ __('Способ приготовления') }}
                        </label>
                        <textarea class="form-control text-primary text-justify" name="instruction" id="instruction"
                            rows="5" value="{{ old('instruction') }}" required>
                             {{ $post->instruction }}
            </textarea>
                    </div>
                </div>

                <div class="d-flex justify-content-center mt-3">
                    <vs-button color="primary" type="filled" size="large" icon="done" onclick="submit()">
                        Сохранить рецепт
                    </vs-button>
                </div>
            </form>



            <form action="{{ route('posts.update', ['id'=> $post->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="recipe-about text-justify">
                    <div class="form-group px-4 my-4">
                        <label for="title">{{ __('Название блюда:') }}</label>
                        <input type="text" class="form-control text-center" name="title" id="title"
                            value="{{ $post->title }}" placeholder="{{ $post->title }}" required>
                    </div>
                    <div class="form-group px-4">
                        <label for="description">{{ __('Описание блюда:') }}</label>
                        <textarea class="form-control text-justify" name="description" id="description" required>
                                {{ $post->description }}
                            </textarea>
                    </div>
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
                                <span class="input-group-text" {{ __('калорий') }}></span>
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
</div>
</div>
</div>

@endsection
