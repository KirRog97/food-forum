<div class="grid grid-cols-2 gap-8">
    @foreach ($post->ingredients as $ingredient)
    <div class="col-span-2 sm:col-span-1 rounded-lg shadow-lg overflow-hidden">

        <div class="h-4/12 flex flex-col justify-center items-center bg-secondary-700 px-2 py-2">
            <span class="text-2xl sm:text-3xl text-primary-700 text-center font-display tracking-wid mb-1 sm:mb-2">
                {{ $ingredient['name'] }}
            </span>
            <span class="text-base sm:text-lg bg-secondary-900 text-primary-300 text-center rounded-lg px-3 py-2">
                {{ $ingredient->pivot['amount'] }} Грамм
            </span>
        </div>

        <img class="w-full h-8/12 bg-gray-200 object-cover" src="{{$ingredient->picture->path}}"
            alt="Ingredient image" />
    </div>
    @endforeach
</div>
