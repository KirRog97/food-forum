@extends('layouts.app')

@section('page_title')
{{ __('Рецепт') }}
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
                        <span>{{ __('Нравится') }}</span>
                    </a>
                    <a href="{{ route('posts.edit', $post) }}" class="btn-edit">
                        {{-- for hover --}}
                        {{-- <i class="fas fa-edit"></i> --}}
                        <i class="far fa-edit"></i>
                        <span>{{ __('Редактировать') }}</span>
                    </a>                     
                    <a href="" class="btn-bookmark">
                        {{-- for hover --}}
                        {{-- <i class="fa fa-bookmark" aria-hidden="true"></i> --}}
                        <i class="far fa-bookmark mr-1"></i>
                        <span>{{ __('Добавить в закладки') }}</span>
                    </a>
                </div>
            </div>

            <div class="recipe-about text-justify">
                <h2>{{ $post->title }}</h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque repudiandae repellendus non
                    doloremque hic perferendis maxime. Delectus eveniet ex optio repudiandae, id quam non cupiditate.
                    Officia pariatur dicta rem modi?
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.Provident perferendis unde esse? Omnis,
                    corrupti sit ipsa quia ducimus rerum commodi? Tempore assumenda maxime quaerat ipsum dolores quam
                    quis quas. Maxime?
                </p>
            </div>

            <div class="container-fluid my-4">
                <div class="row justify-content-around px-4">
                    <div class="col-2 p-0 text-small">
                        <i class="fas fa-chart-pie fa-lg mr-1"></i>
                        <span>{{ $post->COP }} {{ __('порций') }}</span>
                    </div>
                    <div class="col-2 p-0 text-small">
                        <i class="far fa-clock fa-lg mr-1"></i>
                        <span>{{ $post->TTC }} {{ __('минут') }}</span>
                    </div>
                    <div class="col-2 p-0 text-small">
                        <i class="fas fa-running fa-lg mr-1"></i>
                        <span>{{ $post->Kcal }} {{ __('Ккал') }}</span>
                    </div>
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
