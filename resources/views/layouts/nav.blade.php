<div class="h-full flex flex-auto flex-nowrap justify-between items-center py-3">
    <div class="w-auto md:w-1/12 flex justify-start items-center">
        <a href="/home">
            <span class="header-logo">
                Еда
            </span>
        </a>
    </div>
    <div class="w-7/12 md:w-9/12 hidden md:block">
        <header-global-search></header-global-search>
    </div>
    <div class="w-auto md:w-2/12 h-full justify-between items-center">
        <ul class="h-full flex flex-row flex-nowrap justify-around items-center">
            <li class="block md:hidden">
                <div class="header-icon__inner">
                    <i class="fas fa-search header-icon"></i>
                </div>
            </li>
            @auth
            <li>
                <header-notification-dropdown></header-notification-dropdown>
            </li>
            <li>
                <header-user-dropdown :user='@json(auth()->user())'></header-user-dropdown>
            </li>
            @else
            <li>
                <div class="header-icon__inner">
                    <a href="{{ route('login') }}" data-toggle="tooltip" data-placement="bottom" title="Вход">
                        <i class="fas fa-sign-in-alt header-icon"></i>
                    </a>
                </div>
            </li>
            <li>
                <div class="header-icon__inner">
                    <a href="{{ route('register') }}" data-toggle="tooltip" data-placement="bottom"
                        title="Зарегистрироваться">
                        <i class="fas fa-address-card header-icon"></i>
                    </a>
                </div>
            </li>
            @endauth

            <li class="block md:hidden">
                <mobile-sidebar-button>
            </li>
        </ul>
    </div>
</div>