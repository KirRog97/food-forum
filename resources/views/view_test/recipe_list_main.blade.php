<div class="recipe-list mt-4">
        <div class="container-fluid">
            <div class="card-deck justify-content-between">
    
                @for ($i = 0; $i < 6; $i++) {{-- FIX PLS --}}
                 <div class="col-sm-6 mb-4 p-0">
                    <div class="card m-auto">
                        <div class="row no-gutters">
                            <div class="col-6">
                                <img src="/images/recipes/блины.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="col-6">
                                <div class="card-block px-2">
                                    <h4 class="recipe-title p-2 mb-1">
                                        Мраморная говядина под соусом тар-тар
                                    </h4>
                                    <div class="recipe-specification m-auto">
                                        <div class="recipe-specification-line">
                                            <img src="/images/icons/TimeToCook.ico" alt="TC" class="icon  mr-1">
                                            <span>30 мин</span>
                                        </div>
                                        <div class="recipe-specification-line">
                                            <img src="/images/icons/CountOfPortions.ico" alt="Por" class="icon mr-1">
                                            <span>4 порции</span>
                                        </div>
                                        <div class="recipe-specification-line">
                                            <img src="/images/icons/Kcal.svg" alt="K" class="icon mr-1">
                                            <span>395 Ккал</span>
                                        </div>
                                    </div>
                                    <div class="recipe-ingredients mt-2 text-justify visible-sm">
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Ad aperiam ipsum, deserunt expedita recusandae alias saepe
                                            vitae delectus magnam animi necessitatibus sapiente,
                                            fuga possimus, ea vero quos libero excepturi dicta!
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer w-100 text-muted">
                                Footer stating cats are CUTE little animals
                            </div>
                        </div>
                    </div>
            </div>
    
            @endfor
    
        </div>
    </div>
    </div>