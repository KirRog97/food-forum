@extends('layouts.app')

@section('page_title')
Книга рецептов
@endsection


@section('content')

<div class="container-fluid">

    @heading
     Книга рецептов
    @endheading


    <div class="position-relative text-center text-muted text-justify mb-5">
        <p>
            Ищите рецепты, выбирая категорию блюда, его подкатегорию, кухню или меню. А в дополнительных фильтрах можно
            искать по нужному
            (или ненужному) ингредиенту: просто начните писать его название и сайт подберет соответствующий.
        </p>
    </div>

    <div class="recipe-list">

        @if (count($posts) > 0)

        @foreach ($posts as $post)

        <div class="recipe-list-item">

            <div class="recipe-list-box">
                <div class="recipe-list-images position-relative d-flex">
                    <div class="recipe-author rounded-pill bg-dark50 w-auto px-2 py-1 mt-2">
                        <div class="recipe-author-name p-1">
                            <a href="/users/{{$post->user->id}}" data-toggle="tooltip" data-placement="bottom"
                                title="Просмотреть профиль">
                                <span>
                                    {{$post->user->name}}
                                </span>
                            </a>
                        </div>

                        <div class="recipe-list-photo-author rounded-circle ml-1">
                            <img src="/images/icons/user_avacado.svg" alt="User_avatar">
                        </div>
                    </div>
                    <div class="recipe-list-photo w-100">
                        <img src="/images/recipes/блины.jpg" alt="Blin">
                    </div>
                </div>
                <div class="recipe-list-title">
                    <h2>
                        <a href="/posts/{{$post->id}}">
                            <span>{{$post->title}}</span>
                        </a>
                    </h2>
                </div>
                <div class="recipe-list-specification m-auto">
                    <div class="recipe-list-specification-line">
                        <i class="far fa-clock fa-lg mr-1"></i>
                        <span>{{$post->TTC}} минут</span>
                    </div>
                    <div class="recipe-list-specification-line">
                        <i class="fas fa-chart-pie fa-lg mr-1"></i>
                        <span>{{$post->COP}} порции</span>
                    </div>
                    <div class="recipe-list-specification-line">
                        <i class="fas fa-running fa-lg mr-1"></i>
                        <span>{{$post->Kcal}} Ккал</span>
                    </div>
                </div>
                <div class="recipe-list-ingredients">
                    <a href="">Редиска</a>
                    <a href="">Редиска</a>
                    <a href="">Редиска</a>
                    <a href="">Редиска</a>
                </div>
                <div class="recipe-socials-widgets">
                    <div class="widget-like">
                        <a href="" class="btn-like">
                            <i class="far fa-heart"></i>
                            <i class="fas fa-heart" hidden></i>
                            <span>1923</span>
                        </a>
                    </div>
                    <div class="widget-facebook">
                        <a href="" class="btn-facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </div>
                    <div class="widget-vk">
                        <a href="" class="btn-vk">
                            <i class="fab fa-vk"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{$posts->links()}}
    </div>

    @else
    <div class="alert-danger rounded-pill text-center p-1 m-2 border border-danger text-uppercase">
        <h1>Эта книга пока что пуста... Пока что...</h1>
    </div>
    @endif

</div>
@endsection
