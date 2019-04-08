@extends('layouts.app')

@section('page_title')
Рецепт
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col p-0" style="background-color: lightgrey;">
            <div class="card text-white border-0">
                <img class="card-img-top" src="/images/recipes/плов.jpg" alt="">
                <div class="card-body d-flex flex-row badge-dark">
                    <div class="btn-group-sm">
                        <button type="button" name="" id="" class="btn btn-primary border-0" btn-lg>
                            <i class="fas fa-heart"></i>
                            <span>Нравится</span>
                        </button>

                        <button type="button" name="" id="" class="btn btn-primary border-0" btn-lg>
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            <span>Добавить в закладки</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="recipe-about">
                <h2>Лазанья классическая с мясом</h2>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque repudiandae repellendus non
                    doloremque hic perferendis maxime. Delectus eveniet ex optio repudiandae, id quam non cupiditate.
                    Officia pariatur dicta rem modi?
                </p>
            </div>

            <div class="container-fluid mb-4">
                <div class="row justify-content-between px-4">

                    <div class="col-2 p-0">
                        <img src="/images/icons/CountOfPortions.ico" width="25px" alt="">
                        <h5><span>5 порций</span></h5>
                    </div>
                    <div class="col-2 p-0">
                        <img src="/images/icons/CountOfPortions.ico" width="25px" alt="">
                        <h5><span>120 минут</span></h5>
                    </div>

                    <div class="col-2 p-0">
                        <img src="/images/icons/Kcal.svg" width="25px" alt="">
                        <h5><span>563 Ккал</span></h5>
                    </div>

                    <div class="col-2 p-0">
                        <img src="/images/icons/CountOfPortions.ico" width="25px" alt="">
                        <h5><span>5 порций</span></h5>
                    </div>

                </div>
            </div>

            <div class="container-fluid">
                <div class="card-columns">

                    <div class="card border-0 bg-transparent">
                        <img class="card-img-top" src="/images/category_meat.jpg" alt="">
                        <div class="card-body p-1 text-center">
                            <h4 class="card-title mb-1">Масло</h4>
                            <p class="card-text">200гр</p>
                        </div>
                    </div>
                    <div class="card border-0 bg-transparent">
                        <img class="card-img-top" src="/images/category_meat.jpg" alt="">
                        <div class="card-body p-1 text-center">
                            <h4 class="card-title mb-1">Масло</h4>
                            <p class="card-text">200гр</p>
                        </div>
                    </div>
                    <div class="card border-0 bg-transparent">
                        <img class="card-img-top" src="/images/category_meat.jpg" alt="">
                        <div class="card-body p-1 text-center">
                            <h4 class="card-title mb-1">Масло</h4>
                            <p class="card-text">200гр</p>
                        </div>
                    </div>
                    <div class="card border-0 bg-transparent">
                        <img class="card-img-top" src="/images/category_meat.jpg" alt="">
                        <div class="card-body p-1 text-center">
                            <h4 class="card-title mb-1">Масло</h4>
                            <p class="card-text">200гр</p>
                        </div>
                    </div>
                    <div class="card border-0 bg-transparent">
                        <img class="card-img-top" src="/images/category_meat.jpg" alt="">
                        <div class="card-body p-1 text-center">
                            <h4 class="card-title mb-1">Масло</h4>
                            <p class="card-text">200гр</p>
                        </div>
                    </div>

                </div>
            </div>


        </div>
        <div class="col-3 p-0 ml-2">

            <div class="container p-0">

                <div class="post-sidecolumn flex-column">

                    <div class="card w-100 p-0 border-0">

                        <img class="card-img-top" src="/images/spice.jpg" alt="IMG">

                        <div class="post-sidecolumn-text card-img-overlay">
                            <h3>
                                <a href="#">
                                    <span>Рецепты лазаньи с молоком</span>
                                </a>
                            </h3>
                        </div>

                    </div>

                    <div class="card p-0  border-0">

                        <img class="card-img-top" src="/images/spice.jpg" alt="IMG">

                        <div class="post-sidecolumn-text card-img-overlay">
                            <h3>
                                <a href="#">
                                    <span>Рецепты лазаньи с молоком</span>
                                </a>
                            </h3>
                        </div>

                    </div>

                    <div class="card p-0  border-0">

                        <img class="card-img-top" src="/images/spice.jpg" alt="IMG">

                        <div class="post-sidecolumn-text card-img-overlay">
                            <h3>
                                <a href="#">
                                    <span>Рецепты лазаньи с молоком</span>
                                </a>
                            </h3>
                        </div>

                    </div>

                    <div class="card p-0  border-0">

                        <img class="card-img-top" src="/images/spice.jpg" alt="IMG">

                        <div class="post-sidecolumn-text card-img-overlay">
                            <h3>
                                <a href="#">
                                    <span>Рецепты лазаньи с молоком</span>
                                </a>
                            </h3>
                        </div>

                    </div>

                    <div class="card p-0  border-0">

                        <img class="card-img-top" src="/images/spice.jpg" alt="IMG">

                        <div class="post-sidecolumn-text card-img-overlay">
                            <h3>
                                <a href="#">
                                    <span>Рецепты лазаньи с молоком</span>
                                </a>
                            </h3>
                        </div>

                    </div>

                    <div class="card p-0  border-0">

                        <img class="card-img-top" src="/images/spice.jpg" alt="IMG">

                        <div class="post-sidecolumn-text card-img-overlay">
                            <h3>
                                <a href="#">
                                    <span>Рецепты лазаньи с молоком</span>
                                </a>
                            </h3>
                        </div>

                    </div>

                    <div class="card p-0  border-0">

                        <img class="card-img-top" src="/images/spice.jpg" alt="IMG">

                        <div class="post-sidecolumn-text card-img-overlay">
                            <h3>
                                <a href="#">
                                    <span>Рецепты лазаньи с молоком</span>
                                </a>
                            </h3>
                        </div>

                    </div>

                    <div class="card p-0  border-0">

                        <img class="card-img-top" src="/images/spice.jpg" alt="IMG">

                        <div class="post-sidecolumn-text card-img-overlay">
                            <h3>
                                <a href="#">
                                    <span>Рецепты лазаньи с молоком</span>
                                </a>
                            </h3>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

@endsection
