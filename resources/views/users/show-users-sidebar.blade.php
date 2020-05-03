<el-aside style="max-width: 35%; min-width: 25%">
  <div class="container-fluid px-1 py-4 border-left">
    <div class="row no-gutters d-flex justify-content-center mb-3">
      <el-avatar fit="contain" shape="circle" :size="200" src="{{ $user->avatar->path }}" alt="User picture">
        <img src="/images/icons/user_avacado.svg" />
      </el-avatar>
    </div>
    <div class="row no-gutters d-flex justify-content-center mb-2">
      <p class="text-center p-0 m-0">
        Кухня
      </p>
    </div>
    <div class="row no-gutters d-flex justify-content-center mb-2">
      <h2 class="text-center px-2 py-4 m-auto">
        {{ $user->username }}
      </h2>
    </div>

    <div class="row no-gutters d-flex flex-nowrap justify-content-between mb-4 px-2 py-3">
      <div class="col-auto">
        <h4 class="text-center pb-1 m-0">{{ $user->posts->count() }}</h4>
        <h6 class="text-center font-weight-lighter m-0">Рецептов</h6>
      </div>
      <div class=" col-auto">
        {{-- <h4 class="text-center m-0">{{ $user->subs->count() }}</h4> --}}
        <h4 class="text-center pb-1 m-0">1262</h4>
        <h6 class="text-center font-weight-lighter m-0">Подписок</h6>
      </div>
      <div class="col-auto">
        {{-- <h4 class="text-center m-0">{{ $user->comments->count() }}</h4> --}}
        <h4 class="text-center pb-1 m-0">5000</h4>
        <h6 class="text-center font-weight-lighter m-0">Коментариев</h6>
      </div>
    </div>

    <div class="row no-gutters d-flex justify-content-center mb-5">
      <a class="btn btn-link text-secondary border-none" href="{{ route('users.edit', ['user'=>$user]) }}">
        Редактировать
      </a>
    </div>

    <div class="row no-gutters d-flex justify-content-center px-5 m-auto">
      <h6 class="text-center font-weight-lighter m-0">
        Дата регистрации: {{ $user->created_at->format('j F, Y') }}
      </h6>
    </div>
  </div>
</el-aside>
