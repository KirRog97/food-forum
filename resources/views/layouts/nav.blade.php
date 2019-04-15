<nav>
    <div class="search justify-content-start">
        <form id="search-form" action="" method="post">
            {{ csrf_field() }}
            <button type="submit" id="search-btn" class="nav-icon">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
            <input type="search" autofocus name="search" id="search-field">
        </form>
    </div>


    <ul class="nav navbar-ul flex-grow-0">
        @guest

        <li class="ml-2">
            <a href="{{ route('login') }}" class="nav-link nav-icon m-auto"
            data-toggle="tooltip" data-placement="bottom" title="Log In">
                <i class="fas fa-sign-in-alt"></i>
            </a>
        </li>
        <li class="ml-4 mr-2">
            <a href="{{ route('register') }}" class="nav-link nav-icon m-auto"
            data-toggle="tooltip" data-placement="bottom" title="Check In">
                <i class="fas fa-address-card"></i>
            </a>
        </li>

        @else

        <li class="notification mx-2">
            <div class="dropdown">
                <button class="btn btn rounded-right shadow-none" type="button" id="dropdownMenu1" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Notification">
                    <i class="fa fa-bell nav-icon" aria-hidden="true"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <a class="dropdown-header bg-dark text-white py-3" href="#">
                        <span>{{ Auth::user()->name }}</span>
                    </a>
                    <a class="dropdown-item" href="#!">Профиль</a>
                    <a class="dropdown-item" href="#!">Another action</a>
                </div>

                <div class="dropdown-menu p-0 mr-5" aria-labelledby="dropdownMenu1">
                    <div class="card">
                        <div class="card-header">
                            {{__('Notification')}}
                        </div>
                        <div class="card-body p-0">
                            <div class="list-group">
                                <a href="#" class="list-group-item list-group-item-action active">{{__('Notification')}}</a>
                                <a href="#" class="list-group-item list-group-item-action">{{__('Notification')}}</a>
                                <a href="#" class="list-group-item list-group-item-action disabled">{{__('Notification')}}</a>
                            </div>
                        </div>
                        <div class="card-footer text-muted">
                                {{__('Footer')}}
                        </div>
                    </div>
                </div>

            </div>
        </li>

        <li class="nav-item dropdown mx-2">
            <div class="btn-group dropleft">
                <button type="button" class="btn rounded-right shadow-none" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Просмотреть профиль">
                    <i class="fa fa-user-circle nav-icon" aria-hidden="true"></i>
                </button>
                <div class="dropdown-menu border-dark text-center p-0" x-placement="right-start" style="position: absolute; transform: translate3d(111px, 0px, 0px); top: 0px; left: 0px; will-change: transform; width: 200px;">

                    <a class="dropdown-header bg-dark text-white py-2" href="#">
                            @if (Auth::user()->avatar_id == 1 )
                            <img src="/images/icons/user_avacado.svg" style="width:72px;" alt="">
                            @else
                            <img src="/images/icons/user_male.ico" alt="">
                            @endif
                        <span>{{ Auth::user()->name }}</span>
                    </a>

                <a class="dropdown-item py-2" href="/users/{{ Auth::user()->id }}">{{__('Мой профиль')}}</a>
                    <a class="dropdown-item py-2" href="#">{{__('Мои рецепты')}}</a>
                    <a class="dropdown-item py-2" href="#">{{__('Понравилось')}}</a>
                    <a class="dropdown-item py-2" href="#">{{__('Закладки')}}</a>

                    <div class="dropdown-divider m-0"></div>
                    <a class="dropdown-item  bg-dark text-white" href="{{ Auth::logout() }}">
                        <i class="fas fa-sign-out-alt py-2 mr-1"></i>
                        {{__('Log Out')}}
                    </a>
                </div>
            </div>

            <!-- https://appdividend.com/2018/06/02/laravel-avatar-image-upload-tutorial-with-example/ -->
        </li>

        @endguest
    </ul>

</nav>
