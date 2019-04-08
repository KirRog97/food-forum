@extends('layouts.app')
@section('page_title') Новый рецепт
@endsection

@section('content') @heading Создание рецепта @endheading

<form action="{{route('posts.store')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="title">Название рецепта:</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="Селедка под шубой">
    </div>

    <div class="custom-file mb-3">
        <label class="custom-file">
            <input type="file" name="recipe_photo" id="recipe_photo" placeholder="" class="custom-file-input">
            <span class="custom-file-control">Download photo</span>
        </label>
    </div>
    {{--
    <div class="file_preview">
        <img class="file_preview-image" src="/public/images/recipes/$loaded_file.jpg" alt="Загруженное" srcset="">
    </div> --}}

    <div class="row mt-4">
        <div class="form-group col">
            <label for="TTC">Время приготовления(в минутах):</label>
            <input type="number" class="form-control" name="TTC" id="TTC" placeholder="120 минут">
        </div>
        <div class="form-group col">
            <label for="COP">Количество порций(в шт.):</label>
            <input type="number" class="form-control" min="1" name="COP" id="COP" placeholder="4 порции">
        </div>
        <div class="form-group col">
            <label for="Kcal">Количество калорий(в килокалориях):</label>
            <input type="number" class="form-control" min="1" name="Kcal" id="Kcal" placeholder="328 калорий">
        </div>
    </div>

    <div class="form-group">
        <label for="HTC">Способ приготовления:</label>
        <textarea class="form-control" name="HTC" id="HTC" rows="3" placeholder="Для приготовления данного блюда..."></textarea>
    </div>

    <div class="form-group mb-3">
        <label for="Ingredients">Добавление ингредиентов:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <button class="btn btn-primary" type="button">Добавить</button>
            </div>
            <input type="text" class="form-control" placeholder="" name="Ingredients" id="Ingredients" aria-describedby="basic-addon1">
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Сохранить рецепт</button>
</form>
@endsection
