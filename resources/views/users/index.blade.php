@extends('layouts.app')

@section('page_title')
Список кулинаров
@endsection

@section('content')

<x-heading>
    Список кулинаров
</x-heading>

    <div class="text-center text-justify text-muted mb-4">
        <p>
           Список кулинаров нашего сайта. Объединяйтесь и воплощайте свои самые смелые кулинарные фантазии в жизнь.
        </p>
    </div>
    @if (count($users) > 0)
    <div class="user-list">
        @foreach ($users as $user)
        <div class="user-list-item py-3">
            <user-index-card username="{{ $user->username }}" avatar="{{ $user->avatar->path }}" id="{{ $user->id }}">
            </user-index-card>
        </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center my-3">
        {{$users->links()}}
    </div>

    @endif

    @endsection
