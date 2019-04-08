@extends('layouts.app')

@section('page_title')
Список кулинаров
@endsection

@section('content')

<div class="container-fluid">

    @heading
    Список кулинаров
    @endheading


    <div class="text-center text-justify text-muted mb-4">
        <p>
            Список кулинаров отражен здесь. Взимодействуйте верно с ними. Они тоже юзеры.
        </p>
    </div>

    @if (count($users) > 0)

    <div class="container flex-row flex-wrap d-flex justify-content-between p-0">
        @foreach ($users as $user)

        <div class="card flex-item-user mb-4">
            <div class="card-header bg-success text-white border-success text-center">
                {{ $user->name}} <em>#{{ $user->id}}</em>
            </div>
            <div class="card-body bg-dark border border-dark text-white p-0">
                <ul class="list-group list-group-flush bg-transparent">
                    <li class="list-group-item bg-transparent border-white">
                        <div class="row">
                            <div class="col-4">
                                <span class="card-title">{{__('Почта:')}}</span>
                            </div>
                            <div class="col p-0">
                                <span class="card-title"> {{ $user->email}}
                                    @if (is_null($user->email_verify_at))
                                    <i class="fa fa-check-circle text-success" aria-hidden="true"></i>
                                    @else
                                    <i class="fa fa-times-circle text-warning" aria-hidden="true"></i>
                                    @endif
                                </span>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item bg-transparent border-white">
                        <div class="row">
                            <div class="col-4">
                                <span class="card-title">{{__('Рецептов:')}}</span>
                                <span class="badge badge-pill badge-success text-black-50">15</span>
                            </div>
                            <div class="col p-0">
                                <a href="" class="card-link">
                                    {{__('Список рецептов')}}
                                </a>
                            </div>
                    </li>
                    <li class="list-group-item bg-transparent border-white">
                        <a href="" class="card-link">
                            {{__('Рецептов:')}}
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-footer bg-success text-white border-success">
                
            </div>
        </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{$users->links()}}
    </div>

    @else
    <div class="alert-danger rounded-pill text-center p-1 m-2 border border-danger text-uppercase">
        <h1>Похоже, что здесь пока что никого нет... А жаль</h1>
    </div>
    @endif

</div>


@endsection
