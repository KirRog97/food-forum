<el-header height="100px">
  <div class="row position-relative d-flex align-items-center justify-items-center rounded-pill py-2">

    <div class="col-auto d-flex justify-content-center p-0 m-auto">
      <el-avatar fit="contain" shape="circle" :size="72" src="{{ $user->avatar->path }}" alt="User picture">
        <img src="/images/icons/user_avacado.svg" />
      </el-avatar>
    </div>
    <div class="col-3 d-flex justify-content-center p-0 m-auto">
      <h5 class="text-center m-auto">
        {{ $user->username }}
      </h5>
    </div>

    <div class="col-4 d-flex flex-nowrap justify-content-between p-0">
      <div class="col">
        <h4 class="text-center pb-1 m-0">{{ $user->posts->count() }}</h4>
        <h6 class="text-center font-weight-lighter m-0">Рецептов</h6>
      </div>
      <div class="col">
        {{-- <h4 class="text-center m-0">{{ $user->subs->count() }}</h4> --}}
        <h4 class="text-center pb-1 m-0">1262</h4>
        <h6 class="text-center font-weight-lighter m-0">Подписок</h6>
      </div>
      <div class="col">
        {{-- <h4 class="text-center m-0">{{ $user->comments->count() }}</h4> --}}
        <h4 class="text-center pb-1 m-0">5000</h4>
        <h6 class="text-center font-weight-lighter m-0">Коментариев</h6>
      </div>
    </div>

    <div class="col-2 d-flex justify-content-center m-0">
      <a class="btn btn-linktext-secondary border-none" href="{{ route('users.edit', ['user'=>$user]) }}">
        Редактировать
      </a>
    </div>

    <div class="position-absolute d-flex justify-content-center"
      style="top: calc(100% - 26px / 2); left: calc(50% - 180px / 2);">
      <h6 class="rounded text-center font-weight-lighter p-2 m-0">
        Дата регистрации: {{ $user->created_at->format('j F, Y') }}
      </h6>
    </div>
  </div>

</el-header>
