<div class="row align-items-center justify-content-around px-2 py-2 m-0">
    <div class="col-4 d-flex flex-nowrap align-items-baseline justify-content-center">
        <h5 class="bg-secondary text-white rounded-pill p-2 m-0">
            <i class="fas fa-chart-pie fa-lg mr-1"></i>
            {{ $post->COP }} порций
        </h5>
    </div>
    <div class="col-4 d-flex flex-nowrap align-items-baseline justify-content-center">
        <h5 class="bg-secondary text-white rounded-pill p-2 m-0">
            <i class="far fa-clock fa-lg mr-1"></i>
            {{ $post->TTC }} минут
        </h5>
    </div>
    <div class="col-4 d-flex flex-nowrap align-items-baseline justify-content-center">
        <h5 class="bg-secondary text-white rounded-pill p-2 m-0">
            <i class="fas fa-running fa-lg mr-1"></i>
            {{ $post->Kcal }} Ккал
        </h5>
    </div>
</div>
