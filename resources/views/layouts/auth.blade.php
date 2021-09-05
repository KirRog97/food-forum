<!doctype html>
<html lang="{{ app()->getLocale() }}">

@include('layouts.html-head')

<body>
    <div class="flex flex-auto flex-nowrap min-h-screen mx-auto">
        <div class="hidden sm:flex sm:w-4/12 md:w-8/12 lg:w-7/12">
            @yield('background_image')
        </div>
        <div
            class="w-full sm:w-8/12 lg:w-5/12 flex flex-wrap content-center justify-center bg-secondary-800 border-0 sm:border-l-2 border-primary-500 px-12 py-10 sm:px-5 sm:py-2">
            <div class="w-full flex flex-auto justify-center mb-8">
                <a class="text-6xl text-primary-500 hover:text-primary-400 text-center font-handwritten" href="/home"
                    data-toggle="tooltip" data-placement="bottom" title="На главную">
                    Еда
                </a>
            </div>

            @yield('form')

        </div>
    </div>
</body>

</html>