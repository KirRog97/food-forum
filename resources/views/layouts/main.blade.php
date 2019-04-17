
@heading
Подбор рецптов
@endheading

    @include('layouts.compilation')

     @heading
      Рецепты
      @endheading

<div class="row">
    <div class="btn-group btn-group-lg justify-content-center m-auto" role="group">
        <button type="button" class="btn btn-outline-dark">Новые рецепты</button>
        <button type="button" class="btn btn-outline-dark">Популярные</button>
        <button type="button" class="btn btn-outline-dark">Рекомендуем</button>
    </div>
</div>

<recipe-sorting></recipe-sorting>

{{-- Closed for testing Vue

    <div class="recipe-list mt-4">

    @for ($i = 0; $i< 6; $i++)

     @recipe
    @endrecipe

    @endfor
 </div> --}}

@heading
Горячая подборка
@endheading

<div class="hotcollect">
    <div class="container-fluid">
        <div class="card-deck">
            @for ($i = 0; $i< 5; $i++) {{-- FIX PLS --}}
            <div class="card bg-dark min-height250">
                <img class="card-img img-fluid-center" src="/images/category_coldDrinks.jpg" alt="">
                <div class="card-img-overlay">
                    <h4 class="card-title text-white text-shadow">
                        Похмельные Рецепты
                    </h4>
                </div>
            </div>
            @endfor
        </div>
    </div>
</div>

<div class="AuthorRaiting">
    <h2>Подпишитесь на рассылку полезных советов и рецептов</h2>
    <div id="AuthorRaiting_foto">
        <a href=""><img src="/images/icons/user_avacado.svg" alt="1"></a>
        <a href=""><img src="/images/icons/user_avacado.svg" alt="2"></a>
        <a href=""><img src="/images/icons/user_avacado.svg" alt="3"></a>
        <a href=""><img src="/images/icons/user_avacado.svg" alt="4"></a>
        <a href=""><img src="/images/icons/user_avacado.svg" alt="5"></a>
        <a href=""><img src="/images/icons/user_avacado.svg" alt="6"></a>
        <a href=""><img src="/images/icons/user_avacado.svg" alt="7"></a>
        <a href=""><img src="/images/icons/user_avacado.svg" alt="8"></a>
        <a href=""><img src="/images/icons/user_avacado.svg" alt="9"></a>
        <a href=""><img src="/images/icons/user_avacado.svg" alt="10"></a>
    </div>
</div>