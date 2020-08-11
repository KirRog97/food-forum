<div class="w-full flex flex-col sm:flex-row flex-no-wrap justify-evenly items-center space-y-2 sm:space-y-0">
    <div class="w-2/3 sm:w-auto flex flex-nowrap justify-center items-center bg-secondary-700 rounded-lg px-4 py-2">
        <span class="text-lg sm:text-xl text-primary-200 hover:text-primary-600">
            <i class="fas fa-chart-pie fa-lg mr-1"></i>
            {{ $post->COP }} порций
        </span>
    </div>
    <div class="w-2/3 sm:w-auto flex flex-nowrap justify-center items-center bg-secondary-700 rounded-lg px-4 py-2">
        <span class="text-lg sm:text-xl text-primary-200 hover:text-primary-600">
            <i class="far fa-clock fa-lg mr-1"></i>
            {{ $post->TTC }} мин
        </span>
    </div>
    <div class="w-2/3 sm:w-auto flex flex-nowrap justify-center items-center bg-secondary-700 rounded-lg px-4 py-2">
        <span class="text-lg sm:text-xl text-primary-200 hover:text-primary-600">
            <i class="fas fa-running fa-lg mr-1"></i>
            {{ $post->Kcal }} ккал
        </span>
    </div>
</div>
