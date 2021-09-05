<div class="w-full sm:flex">
    <div class="w-full sm:w-3/12 sm:items-center sm:flex sm:justify-end">
        <label
            class="inline-block text-xl sm:text-xl text-white font-handwritten font-light tracking-wide sm:text-right pr-4 mb-1 sm:mb-0"
            for="{{$name}}">
            {{ $title }}
        </label>
    </div>
    <div class="w-full sm:w-7/12">
        <input
            class="w-full text-gray-700 bg-white leading-tight appearance-none border-2 border-primary-200 rounded focus:outline-none focus:border-primary-500 transition-500ms py-2 px-4"
            type="{{ $type ?? 'text'}}" id="{{$name}}" name="{{$name}}" value="{{ old($name) }}"
            {{$input_attributes ?? ''}}>
        @if ($errors->has($name))
        <span class="inline-block text-base leading-tight text-red-500 mt-1">
            <strong>
                {{ $errors->first($name) }}
            </strong>
        </span>
        @endif
    </div>
</div>