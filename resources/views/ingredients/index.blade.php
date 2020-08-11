@extends('layouts.app')

@section('page_title')
Eда - Книга ингредиентов
@endsection

@section('content')

<x-heading>
    Книга ингредиентов
</x-heading>

<x-sub-heading>
    Здесь вы можете ознакомиться с ингредиентами, которые будут использоваться в ваших рецептах.
</x-sub-heading>

@if (count($ingredients) > 0)

<div class="space-y-8 md:space-y-6">
    @foreach ($ingredients as $ingredient)

    <div class="grid grid-cols-6 gap-3 bg-secondary-100 rounded-lg p-2 md:p-4">
        {{-- Ing Image --}}
        <div class="col-span-3 row-span-1 md:row-span-3 flex justify-center items-center">
            {{-- <img class="w-full object-cover overflow-hidden rounded" src="{{ $ingredient->picture->path }}"
            alt="{{ $ingredient->name }} Picture"> --}}

            <img class="w-full object-cover overflow-hidden rounded" src="/images/login_background.jpg"
                alt="{{ $ingredient->name }} Picture">
        </div>

        {{-- Ing Name --}}
        <div class="col-span-3 row-span-1 flex justify-center items-center p-1">
            <a class="text-3xl sm:text-4xl md:text-3xl text-center leading-none"
                href="/ingredients/{{ $ingredient->id }}">
                <span>
                    {{ $ingredient->name }}
                </span>
            </a>
        </div>

        {{-- Ing Description --}}
        <div class="col-span-6 md:col-span-3 row-span-2 border-t-2 border-solid border-secondary-900 p-3">
            {{--
                Issue: 'whitespace-pre-line' creating whtie space in fist string of <p>.
                Amount of white space equal to HTML space in here

                Decision: make negative margin -mt-4

                Right decision: make shorter 'class'
                and palce 'blade variablble' close to tag "p"
            --}}
            {{-- https://service.webboss.pro/text-generator --}}
            <p
                class="text-lg text-secondary-900 leading-normal md:leading-snug font-normal whitespace-pre-line overflow-hidden font-display font-serif -mt-4">
                {{ $ingredient->description }}
                {{-- С другой стороны постоянное информационно-пропагандистское обеспечение нашей деятельности обеспечивает
                широкому кругу (специалистов) участие в формировании позиций, занимаемых участниками в отношении
                поставленных задач.

                Равным образом рамки и место обучения кадров влечет за собой процесс внедрения и модернизации системы
                обучения кадров,соответствует насущным потребностям.

                С другой стороны рамки и место обучения кадров способствует подготовки и реализации модели развития.
                Идейные соображения высшего порядка, а также рамки и место обучения кадров обеспечивает широкому кругу
                (специалистов)
                участие в формировании новых предложений.
                Товарищи! сложившаяся структура организации представляет собой интересный эксперимент проверки
                направлений прогрессивного развития. --}}
            </p>
        </div>
    </div>

    @endforeach
</div>

<x-paginate-links>
    {{$ingredients->links()}}
</x-paginate-links>

@else

<x-message-empty-collection>
    Список ингредиентов временно пуст
</x-message-empty-collection>

@endif

@endsection
