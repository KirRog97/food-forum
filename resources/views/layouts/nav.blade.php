<div class="container-fluid px-2 py-3 fa-lg">
    <div class="row justify-content-between align-items-center">
        <div class="col-9 col-md-10 p-0">
            <form class="form-inline" action="" method=" POST">
                {{ csrf_field() }}
                <button class="btn px-2 py-0 mr-2" type="submit">
                    <i class="fa fa-search fa-lg" aria-hidden="true"></i>
                </button>
                <input class="form-control form-control-sm flex-fill" type="search" name="search">
            </form>
        </div>

        <div class="col-3 col-md-2">
            <ul class="d-flex flex-row flex-nowrap justify-content-around">

                @auth
                <li>
                    <div class="dropdown">
                        <button class="btn px-2 py-0 m-auto shadow-none" type="button" data-toggle="dropdown"
                            data-offset="-120px, 10px" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell fa-lg" aria-hidden="true"></i>
                        </button>

                        <div class="dropdown-menu text-center p-0 mr-5" style="width: 250px;">
                            <div class="card bg-dark border-dark">
                                <div
                                    class="card-header d-flex justify-content-between align-items-center text-white border-dark">
                                    <span>{{__('Уведомления')}}</span>
                                    <a href="#">
                                        <i class="fas fa-cog p-1"></i>
                                    </a>
                                </div>
                                <div class="card-body p-0">
                                    <div class="list-group">
                                        <a href="#"
                                            class="list-group-item list-group-item-primary list-group-item-action rounded-0">
                                            <span>{{__('Уведомление')}}</span>
                                        </a>
                                        <a href="#"
                                            class="list-group-item list-group-item-primary list-group-item-action rounded-0">
                                            <span>{{__('Уведомление')}}</span>
                                        </a>
                                        <a href="#"
                                            class="list-group-item list-group-item-primary list-group-item-action rounded-0">
                                            <span>{{__('Уведомление')}}</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </li>

                <li>
                    <div class="dropdown">
                        <button type="button" class="btn px-2 py-0 m-auto shadow-none" data-toggle="dropdown"
                            data-offset="-124px, 10px" data-flip="true" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user-circle fa-lg" aria-hidden="true"></i>
                        </button>
                        <div class="dropdown-menu rounded border-dark text-center p-0">
                            <a class="dropdown-header bg-dark text-white py-2" href="/users/{{ Auth::user()->id }}">
                                <img src="{{ Auth::user()->avatar->path }}" class="rounded-circle" style="width:64px;"
                                    alt="User Avatar">
                                <h5 class="text-wrap mt-1">{{ Auth::user()->username }}</h5>
                            </a>
                            <a class="dropdown-item py-3" href="/users/{{ Auth::user()->id }}">
                                {{__('Мой профиль')}}
                            </a>
                            <a class="dropdown-item py-3" href="#">
                                {{__('Мои рецепты')}}
                            </a>
                            <a class="dropdown-item py-3" href="#">
                                {{__('Понравилось')}}
                            </a>
                            <a class="dropdown-item py-3" href="#">
                                {{__('Закладки')}}
                            </a>

                            <div class="dropdown-divider m-0"></div>

                            <a class="dropdown-item  bg-dark text-white" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); $('#logout-form').submit();">
                                <i class="fas fa-sign-out-alt py-2 mr-1"></i>
                                <span>{{__('Выход')}}</span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" hidden>
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                </li>

                @else

                <li>
                    <a href="{{ route('login') }}" class="px-2 py-0 m-auto" data-toggle="tooltip"
                        data-placement="bottom" title="Вход">
                        <i class="fas fa-sign-in-alt"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ route('register') }}" class="px-2 py-0 m-auto" data-toggle="tooltip"
                        data-placement="bottom" title="Зарегистрироваться">
                        <i class="fas fa-address-card"></i>
                    </a>
                </li>

                @endauth
            </ul>
        </div>
    </div>
</div>