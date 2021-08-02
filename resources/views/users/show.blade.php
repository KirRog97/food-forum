@extends('layouts.app')

@section('page_title')
Профиль {{ $user->username }}
@endsection

@section('content')

<div class="grid grid-cols-12 gap-2">
    <div class="col-span-8 md:col-span-9">
        <x-heading>
            @if ($user->hasOwnerRights($user->id))
            Ваша история
            @else
            История "{{ $user->username }}"
            @endif
        </x-heading>

        @foreach ($user->posts as $post)
        <post-show-card :post='@json($post)'>
        </post-show-card>
        @endforeach
    </div>
    <div class="col-span-4 md:col-span-3">
        @include('users.show-sidebar')
    </div>
</div>
@endsection
