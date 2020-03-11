    <div class="row d-flex flex-wrap">
        @foreach ($post->ingredients as $ingredient)
        <div class="col-12 col-sm-12 col-md-4 col-lg-auto card bg-secondary border-0 shadow p-0 mx-auto mb-1"
            style="max-width: 250px; max-heiht: 450px;">
            <div class="card-body">
                <h4 class="card-title text-center text-light mb-0">
                    {{ $ingredient['name'] }}
                </h4>
            </div>
            <img class="card-img-top bg-light" src="{{$ingredient->picture->path}}" alt="Ingredient image" />
            <div class="card-body text-center px-0 py-2">
                <h5 class="text-center text-light mb-0">
                    {{ $ingredient->pivot['amount'] }} Грамм
                </h5>
            </div>
        </div>
        @endforeach
</div>
