@extends('layouts.app')

@section('page_title')
{{ __('Книга рецептов') }}
@endsection


@section('content')

<div class="container-fluid">

    @heading
    {{  __('Книга рецептов')  }}
    @endheading


    <div class="position-relative text-center text-muted text-justify mb-5">
        <p>
            Ищите рецепты, выбирая категорию блюда, его подкатегорию, кухню или меню.
        </p>
    </div>

    <div class="recipe-list">

        @if (count($posts) > 0)

        @foreach ($posts as $post)

        <post-index-card
        userId="{{$post->user->id}}"
        username="{{$post->user->username}}"
        userAvatarPath="{{$post->user->avatar->path}}"
        postId="{{$post->id}}"
        postPicturePath="{{$post->pictures->path}}"
        postTitle="{{$post->title}}"
        postTTC="{{$post->TTC}}"
        postCOP="{{$post->COP}}"
        postKcal="{{$post->Kcal}}"
        >
        </post-index-card>

        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{ $posts->links() }}
    </div>

    @else
    <div class="alert-danger rounded-pill text-center p-1 m-2 border border-danger text-uppercase">
        <h1>Эта книга пока что пуста... Пока что...</h1>
    </div>
    @endif

</div>
@endsection
