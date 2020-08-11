@extends('layouts.app')

@section('page_title')
Список кулинаров
@endsection

@section('content')

<x-heading>
    Список кулинаров
</x-heading>

<x-sub-heading>
    Список кулинаров нашего сайта. Объединяйтесь и воплощайте свои самые смелые кулинарные фантазии в жизнь.
</x-sub-heading>

@if (count($users) > 0)
<div class="grid grid-cols-6 gap-5">
    @foreach ($users as $user)
    <div class="col-span-6 sm:col-span-3 lg:col-span-2 rounded-lg transition-500ms shadow hover:shadow-2xl">
        <user-index-card username="{{ $user->username }}" avatar="{{ $user->avatar->path }}" id="{{ $user->id }}">
        </user-index-card>
    </div>
    @endforeach
</div>

<x-paginate-links>
    {{$users->links()}}
</x-paginate-links>

@endif

@endsection