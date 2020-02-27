@extends('layouts.app')

@section('page_title')
{{ __('Новый рецепт') }}
@endsection

@section('content')
@heading
{{ __('Создание рецепта') }}
@endheading

<form action="{{route('posts.store') }}" method="post">
    @csrf

    <div class="container-fluid form-custom-secondprimary border-r25 py-4">
        <div class="form-group d-flex justify-content-center position-relative pt-4 mt-4">
            <label class="text-shadow shadow" for="title">
                {{ __('Название рецепта') }}
            </label>
            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
        </div>

        <div class="row justify-content-around">
            <div class="col-12 col-sm-12 col-md-4 d-flex input-group mb-3">
                <div class="input-group-prepend">
                    <div class="input-group-text border-primary bg-dark50 text-primary text-shadow">
                        <i class="fas fa-chart-pie"></i>
                    </div>
                </div>
                <input type="number" class="form-control text-center" min="1" step="10" name="COP" id="COP"
                    value="{{ old('Kcal') }}">
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
                <input type="number" class="form-control text-center" min="1" step="1" name="TTC" id="TTC"
                    value="{{ old('TTC') }}">
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
                <input type="number" class="form-control text-center" min="1" step="10" name="Kcal" id="Kcal"
                    value="{{ old('Kcal') }}">
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
            <textarea class="form-control text-primary text-justify" name="description" id="description" rows="5"
                value="{{ old('description') }}">
            </textarea>
        </div>

        <div class="form-group d-flex justify-content-center position-relative pt-2 mt-5">
            <label class="col-form-label text-shadow shadow px-3" for="instruction">
                {{ __('Способ приготовления') }}
            </label>
            <textarea class="form-control text-primary text-justify" name="instruction" id="instruction" rows="5"
                value="{{ old('instruction') }}">
            </textarea>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-3">
        <el-button type="primary" icon="el-icon-check" onclick="submit()">
            Сохранить рецепт
        </el-button>
    </div>
</form>
@endsection
