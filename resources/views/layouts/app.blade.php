<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.html-head')

<body>
    <div id="app">
        <el-container>
            <el-aside width="64px">
                <sidebar></sidebar>
                <sidebar-drawer></sidebar-drawer>
            </el-aside>
            <el-container>
                <el-header height="auto">
                    @include('layouts.nav')
                </el-header>
                <el-main style="min-height: 100vh;">
                    <vue-snotify></vue-snotify>
                    <backtop></backtop>
                    @include('components.message')
                    @yield('content')
                </el-main>
                <el-footer height="fit-content">
                    @include('layouts.footer')
                </el-footer>
            </el-container>
        </el-container>
    </div>
</body>

</html>
