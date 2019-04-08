<footer>
    <div class="container-fluid">
        <div class="row">
            <div class="col py-1">
                    <a class="footer-menu-link" href="/">{{__('Главная')}}</a>
                    <a class="footer-menu-link" href="/posts">{{__('Рецепты')}}</a>
                    <a class="footer-menu-link" href="">{{__('Идеи')}}</a>
                    <a class="footer-menu-link" href="">{{__('Авторы')}}</a>
                    <a class="footer-menu-link" href="">{{__('Журналы')}}</a>
                    <a class="footer-menu-link" href="">{{__('Реклама')}}</a>
                    <a class="footer-menu-link" href="">{{__('FAQ')}}</a>
            </div>
            <div class="col py-1">
               <div class="ml-auto w-50">
                    @social_buttons
                    @endsocial_buttons
               </div>
            </div>
        </div>
    </div>
</footer>
