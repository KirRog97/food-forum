@extends('layouts.app')

@section('page_title')
Профиль {{ $user->username }}
@endsection

@section('content')

<div class="container-fluid">

    <x-heading>
        @if ($user->hasOwnerRights($user->id))
        Ваша кухня
        @else
        Добро пожаловать на кухню к {{ $user->username}}
        @endif
    </x-heading>

    <div class="row">
        <div class="col-12 col-md-7 col-lg-5 d-flex justify-content-center">
            <el-avatar fit="contain" shape="circle" :size="350" src="{{ $user->avatar->path }}" alt="User picture">
                <img src="/images/icons/user_avacado.svg" />
            </el-avatar>
        </div>
        <div class="col-12 col-md-5 col-lg-7 d-flex flex-wrap align-content-center ">
            <h5 class="text-center py-2">Личные данные</h5>
            <table class="table">
                <tbody>
                    <tr>
                        <td scope="row">Имя пользователя:</td>
                        <td>{{ $user->username }}</td>
                    </tr>
                    <tr>
                        <td scope="row">Дата регистрации:</td>
                        <td>{{ $user->created_at }}</td>
                    </tr>
                </tbody>
            </table>

            <h5 class="text-center py-2">Активность пользователя</h5>
            <table class="table">
                <tbody>
                    <tr>
                        <td scope="row">Опубликованно рецептов:</td>
                        <td>{{ $user->posts->count() }}</td>
                    </tr>
                    <tr>
                        <td scope="row">Написанно комментариев:</td>
                        {{-- <td>{{ $user->comments->count() }}</td> --}}
                        <td>Random digit</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <x-heading>
        @if ($user->hasOwnerRights($user->id))
        Ваши рецепты
        @else
        Рецепты от {{ $user->username }}
        @endif
    </x-heading>

    <div class="row">
        <div class="col-12 p-0">
            <table class="table">
                <thead>
                    <tr>
                        <th>Название блюда</th>
                        <th>Автор</th>
                        @if ($user->hasOwnerRights($user->id))
                        <th>Редактирование</th>
                        <th>Удаление</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user->posts as $post)
                    <tr>
                        <td scope="row">{{ $post->title }}:</td>
                        <td>{{ $user->username }}</td>
                        @if ($user->hasOwnerRights($user->id))
                        <td>
                            <el-tooltip placement="top">
                                <div slot="content">
                                    <span class="text-center">Переход к редатированию рецепта</span>
                                    <br />
                                    <span class="text-danger">После удаления происходит перенаправление</span>
                                </div>
                                <a href="{{ route('posts.edit', $post) }}">
                                    <el-button type="info" icon="el-icon-edit" circle> </el-button>
                                </a>
                            </el-tooltip>

                        </td>
                        <td>
                            <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <el-tooltip placement="top">
                                    <div slot="content">
                                        <span class="text-center">Удаление рецепта</span>
                                        <br />
                                        <span class="text-danger">После удаления происходит
                                            перенаправление</span>
                                    </div>
                                    <el-button type="danger" icon="el-icon-delete" onclick="submit()" circle>
                                    </el-button>
                                </el-tooltip>
                            </form>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <x-heading>
        @if ($user->hasOwnerRights($user->id))
        Ваши коментарии
        @else
        Коментарии {{ $user->username }}
        @endif
    </x-heading>

    <div class="row">
        <div class="col-12 p-0">

            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Блюдо</th>
                        <th>Коментарий</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row"></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td scope="row"></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
