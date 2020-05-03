<!doctype html>
<html lang="{{ app()->getLocale() }}">

@include('layouts.html-head')

<body>
  <div class="container-fluid">
    <div class="row vh-100">
      <div class="col-auto col-md-4 col-lg-7 d-none d-md-flex p-0">
        @yield('background_image')
      </div>
      <div class="col-12 col-md-8 col-lg-5 d-flex flex-wrap align-content-center bg-dark border-left border-primary">
        <div class="col-12 logo">
          <a href="/home" data-toggle="tooltip" data-placement="bottom" title="На главную">
            Еда
          </a>
        </div>
        <div class="col-12 card bg-transparent border-0">
          <div class="card-body px-0 py-3">
            @yield('form')
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
