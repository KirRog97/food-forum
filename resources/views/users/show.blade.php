@extends('layouts.app')

@section('page_title')
Профиль пользователя
@endsection

@section('content')

<div class="container-fluid">
    <div class="card border-0 mb-3">
        <div class="row no-gutters">
            <div class="col-12 col-md-4">
                <img class="card-img-top img-fluid-center" src="{{ $user->avatar->path}}" alt="user image">
            </div>
            <div class="col-12 col-md-8">
                <div class="card-body">
                    <h5 class="card-title text-center">
                        {{ $user->username  }}
                    </h5>
                    <vs-list>
                        <vs-list-header icon="person" title="Личные данные"> </vs-list-header>
                        <vs-list-item title="Дата регистрации:" subtitle="{{ $user->created_at}}">
                            <label for="switch2">Doesnt work </label>
                            <vs-switch color="success" v-model="switch2" vs-icon="done"></vs-switch>
                        </vs-list-item>
                        <vs-list-item title="Email:" subtitle="{{ $user->email}}">
                            <vs-button type="flat" color="secondary">Изменить</vs-button>
                        </vs-list-item>
                        <vs-list-header icon="assignment" title="Активность пользователя"> </vs-list-header>
                        <vs-list-item title="Опубликованно рецептов:" subtitle="1123">
                            <vs-button type="flat" color="secondary">Список</vs-button>
                        </vs-list-item>
                        <vs-list-item title="Написанно комментариев:" subtitle="235">
                            <vs-button type="flat" color="secondary">Список</vs-button>
                        </vs-list-item>
                    </vs-list>
                    <p class="card-text d-flex justify-content-end">
                        <small class="text-muted">
                            Last updated 54 mins ago
                        </small>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 my-2">
        <h6 class="card-subtitle text-center py-2">О себе</h6>
        <p class="card-text text-justify">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit.
            Ea neque eos expedita reiciendis cumque nisi. Quis ullam, ab ex obcaecati quas temporibus soluta est iusto.
            Voluptatum accusantium dolore sunt consequatur.Lorem ipsum dolor sit amet consectetur, adipisicing elit.
            Ea neque eos expedita reiciendis cumque nisi. Quis ullam, ab ex obcaecati quas temporibus soluta est iusto.
            Voluptatum accusantium dolore sunt consequatur.Lorem ipsum dolor sit amet consectetur, adipisicing elit.
            Ea neque eos expedita reiciendis cumque nisi. Quis ullam, ab ex obcaecati quas temporibus soluta est iusto.
            Voluptatum accusantium dolore sunt consequatur.
        </p>
    </div>
</div>

@endsection
