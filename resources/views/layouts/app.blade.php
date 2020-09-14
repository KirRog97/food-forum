<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.html-head')

<body>
    <div id="app">
        <el-container>
            <el-aside class="hidden md:block" width="64px">
                <sidebar></sidebar>
                <sidebar-drawer></sidebar-drawer>
            </el-aside>
            <el-container>
                <el-header height="64px">
                    @include('layouts.nav')
                </el-header>
                <el-main>
                    <vue-snotify></vue-snotify>
                    <backtop></backtop>
                    @include('components.message')
                    @yield('content')
                </el-main>
                <el-footer class="bg-secondary-900" height="fit-content">
                    @include('layouts.footer')
                </el-footer>
            </el-container>
        </el-container>
    </div>
</body>

</html>
