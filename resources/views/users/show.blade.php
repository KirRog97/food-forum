@extends('layouts.app')

@section('page_title')
Профиль {{ $user->username }}
@endsection

@section('content')

{{-- <x-heading>
    @if ($user->hasOwnerRights($user->id))
    Ваши коментарии
    @else
    Коментарии {{ $user->username }}
@endif
</x-heading> --}}

{{-- @include('users.show-users-bar') --}}

<el-container>
  <el-main>
    <x-heading>
      @if ($user->hasOwnerRights($user->id))
      Ваши рецепты
      @else
      Рецепты от {{ $user->username }}
      @endif
    </x-heading>

    {{-- <div class="row">
      <div class="col-12 p-2">
        @include('users.show-users-posts')
      </div>
    </div> --}}

    @foreach ($user->posts as $post)
    <post-show-card :post='@json($post)' :postIngredients='@json($post->ingredients)'
      username="{{ $post->user->username }}" userAvatarPath="{{ $post->user->avatar->path }}"
      postPicturePath="{{ $post->pictures->path }}">
    </post-show-card>
    @endforeach
  </el-main>

  @include('users.show-users-sidebar')

</el-container>
@endsection
