<div class="grid grid-cols-3 md:grid-cols-6 gap-3 rounded-lg p-2 md:p-4">
    {{-- Ing Image --}}
    <div class="col-span-3 row-span-1 md:row-span-3 hidden md:flex justify-center items-center">
        <img class="w-full h-full object-cover overflow-hidden rounded" src="{{ $ingredient->picture->path }}"
            alt="{{ $ingredient->name }} Picture">
        {{--
            <img class="w-full h-full object-cover overflow-hidden rounded" src="/images/login_background.jpg"
                alt="{{ $ingredient->name }} Picture"> --}}
    </div>

    {{-- Ing Name --}}
    <div class="col-span-3 row-span-1 flex justify-center items-center p-1">
        <a class="text-4xl md:text-3xl text-center leading-none" href="/ingredients/{{ $ingredient->id }}">
            <span>
                {{ $ingredient->name }}
            </span>
        </a>
    </div>

    {{-- Ing Description --}}
    <div class="col-span-3 md:col-span-3 row-span-1 px-3">
        {{--
                Issue: 'whitespace-pre-line' creating whtie space in fist string of <p>.
                Amount of white space equal to HTML space in here

                Decision: make negative margin -mt-4

                Right decision: make shorter 'class'
                and palce 'blade variablble' close to tag "p"
            --}}
        <p
            class="text-xl text-secondary-900 leading-normal md:leading-snug font-normal whitespace-pre-line overflow-hidden font-display font-serif -mt-4">
            {{ $ingredient->description }}
        </p>
    </div>
    {{-- Ing Description --}}
    <div class="col-span-3 row-span-1 flex justify-end px-3">
        <a class="text-xl text-primary-700 hover:text-primary-700 transition-500ms"
            href="/ingredients/{{ $ingredient->id }}/usage/">
            <span>
                Использование в рецептах
            </span>
        </a>
    </div>

</div>