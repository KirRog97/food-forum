<div class="flex flex-col justify-center items-center px-2 py-6 space-y-2">
    {{-- UserAvatar --}}
    <el-avatar fit="cover" shape="circle" :size="130" src="{{ $user->avatar->path }}" alt="User picture">
        <img src="/images/icons/user_avacado.svg" />
    </el-avatar>
    <span class="text-lg text-secondary-700 text-center tracking-wide font-handwritten">
        Кухня
    </span>
    {{-- Username --}}
    <span class="text-2xl text-center tracking-wide font-handwritten font-semibold">
        {{ $user->username }}
    </span>

    {{-- Count of Posts, Subs, Comments --}}
    <div class="w-full flex flex-col justify-between space-y-2">
        <div class="w-full flex flex-col justify-center items-center bg-secondary-50 text-secondary-700 rounded p-2">
            <span class="text-lg text-center leading-tight font-handwritten">
                {{-- {{ $user->posts->count() }} --}} 520323
            </span>
            <span class="text-lg text-center font-light leading-tight">
                Рецептов
            </span>
        </div>
        <div class="w-full flex flex-col justify-center items-center bg-secondary-50 text-secondary-700 rounded p-2">
            <span class="text-lg text-center leading-tight font-handwritten">
                {{-- {{ $user->subs->count() }} --}}
                1262
            </span>
            <span class="text-lg text-center font-light leading-tight">
                Подписок
            </span>
        </div>
        <div class="w-full flex flex-col justify-center items-center bg-secondary-50 text-secondary-700 rounded p-2">
            <span class="text-lg text-center leading-tight font-handwritten">
                {{-- {{ $user->comments->count() }} --}}
                5000
            </span>
            <span class="text-lg text-center font-light leading-tight">
                Коментариев
            </span>
        </div>
    </div>

    {{-- Reg date --}}
    <span class="text-lg text-center font-light">
        Дата регистрации:
        <span class="font-handwritten">
            {{ $user->created_at->diffForHumans() }}
        </span>
    </span>

    @if ($user->hasOwnerRights($user->id))
    {{-- Edit profile--}}
    <a class="block text-base md:text-lg text-secondary500 bg-primary-300 border border-primary-400 rounded px-2 py-1"
        href="{{ route('users.edit', ['user'=>$user]) }}">
        Редактировать
    </a>
    @endif
</div>
