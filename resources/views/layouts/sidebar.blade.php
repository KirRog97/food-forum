<div class="logo">
    <a href="/">{{__('Еда')}}</a>
</div>
<div class="list-group">
    <ul>
        <li><a class="sidebar-link" href="/posts">{{__('Книга рецептов')}}</a></li>
        <li><a class="sidebar-link" href="/ingredients">{{__('Ингредиенты')}}</a></li>
        <li><a class="sidebar-link" href="/posts/create">{{__('Добавить рецепт')}}</a></li>
        <li><a class="sidebar-link" href="/Сезонные_рецепты">{{__('Сезонные рецепты')}}</a></li>
        <li><a class="sidebar-link" href="/Здоровье">{{__('Здоровая пища')}}</a></li>
        <li><a class="sidebar-link" href="/users">{{__('Авторы')}}</a></li>
    </ul>
</div>

<div class="sidebar-end">
    <div class="lang mb-3">
        <button class="lang-btn">{{__('Ru')}}</button>
        <button class="lang-btn">{{__('En')}}</button>
    </div>
    @social_buttons
    @endsocial_buttons
</div>
