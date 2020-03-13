@extends('layouts.app')

@section('page_title')
Новый рецепт
@endsection

@section('content')

<x-heading>
    Создание рецепта
</x-heading>

{!! Form::open(['action' => 'PostController@store', 'method' => 'POST']) !!}
<div class="form-group">
    {!! Form::hidden('author', 1, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {{ Form::label ('title','Название рецепта:')}}
    {{ Form::text('title','',['class' => 'form-control', 'placeholder' => 'Селедка под шубой'])}}
</div>

<div class="custom-file mb-3">
    {{ Form::label ('recipe_photo','Фото блюда:', ['class' => 'custom-file-label'])}}
    {!! Form::file('recipe_photo', ['class' => 'custom-file-input']) !!}
</div>

{{-- <div class="file_preview">
    <img class="file_preview-image" src="/public/images/recipes/$loaded_file.jpg" alt="Загруженное" srcset="">
</div> --}}

<div class="row">
    <div class="form-group col">
        {{ Form::label ('TTC','Время приготовления:')}}
        {{ Form::text('TTC','',['class' => 'form-control', 'placeholder' => '1 час 45 минут'])}}
    </div>
    <div class="form-group col">
        {{ Form::label ('COP','Количество порций:')}}
        {{ Form::number('COP','',['class' => 'form-control', 'min' => '1'])}}
    </div>
    <div class="form-group col">
        {{ Form::label ('Kcal','Число калорий:')}}
        {{ Form::number('Kcal','',['class' => 'form-control', 'min' => '1'])}}
    </div>
</div>

<div class="form-group">
    <label for="HTC">How to cook:</label>
    <textarea class="form-control" name="HTC" id="HTC" rows="3"></textarea>
</div>

<div class="form-group mb-3">
    <label for="Ingredients">Добавление ингредиентов:</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <button class="btn btn-primary" type="button">Добавить</button>
        </div>
        <input type="text" class="form-control" placeholder="" name="Ingredients" id="Ingredients"
            aria-describedby="basic-addon1">
    </div>
</div>

{!! Form::submit('Сохранить рецепт', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}

@endsection
