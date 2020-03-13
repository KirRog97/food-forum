@extends('layouts.app')

@section('page_title')
{{ __('Рецепт') }}
@endsection

@section('content')

<x-heading>
    Изменение рецепта
</x-heading>

<div class="container-fluid">
    <div class="row">
        <div class="col p-0">
            <div class="card text-white border-0 position-relative">
                <img class="card-img-top" src="{{ $post->pictures->path }}" alt="Post picture">
                <div class="card-body d-flex flex-row bg-dark50 position-absolute fixed-bottom justify-content-center">
                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">
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

                    <picture-upload-single></picture-upload-single>

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
                    <el-button type="primary" icon="el-icon-check" onclick="submit()">
                        Сохранить рецепт
                    </el-button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
