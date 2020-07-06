<!DOCTYPE html>
<html lang="en"  dir="rtl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>

  <link rel="stylesheet" href="{{ asset('/css/all.min.css')}}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{ asset('/css/tempusdominus-bootstrap-4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('/css/icheck-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('/css/jqvmap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('/css/OverlayScrollbars.min.css')}}">
  <link rel="stylesheet" href="{{ asset('/css/daterangepicker.css')}}">
  <link rel="stylesheet" href="{{ asset('/css/summernote-bs4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('/css/select2-bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('/css/select2.min.css')}}">
  <link rel="stylesheet"href="{{ asset('/taginput/tagsinput.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/adminlte.min.css')}}">
  <style>
      @font-face {
    font-family: 'Almarai';
    src: url('/fonts/Almarai-Bold.ttf');
    src: url('/fonts/Almarai-ExtraBold.ttf');
    src: url('/fonts/Almarai-Light.ttf');
    src: url('/fonts/Almarai-Regular.ttf');
     }
    @font-face {
    font-family: 'Ubuntu';
    src: url('/fonts/Ubuntu-Bold.ttf');
    src: url('/fonts/Ubuntu-BoldItalic.ttf');
    src: url('/fonts/Ubuntu-Italic.ttf');
    src: url('/fonts/Ubuntu-Light.ttf');
    src: url('/fonts/Ubuntu-LightItalic.ttf');
    src: url('/fonts/Ubuntu-Medium.ttf');
    src: url('/fonts/Ubuntu-MediumItalic.ttf');
    src: url('/fonts/Ubuntu-Regular.ttf');
     }
      body
      {
        font-family: 'Ubuntu','Almarai';
      }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav p-0">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <ul class="navbar-nav mr-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">

        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="/storage/user/1.jpg" alt="User Avatar" height="50px" width="50px" class="img-size-50 ml-3  img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title text-right">
                  علي محمد
                  <span class="float-left text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm text-right">ملابس جاهزة جاهزة</p>
                <p class="text-sm text-muted text-right"><i class="far fa-clock mr-1"></i> منذ 4 ساعات</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">شاهد كل الرسائل</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" onclick="event.preventDefault();
        document.getElementById('logout').submit();" href="#"><i class="fas fa-lock"></i></a>
        <form id="logout" action="/logout" method="post" style="display: none;">
          @csrf
        </form>
      </li>

    </ul>

  </nav>


  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="right: 0">
    <a href="/admin" class="brand-link text-center ">
      <span class="brand-text font-weight-light">Ecommerce 2</span>
    </a>

    <div class="sidebar">

      <div class="user-panel mt-3 pb-3 mb-3 d-flex text-center">
        <div class="image mr-3 pl-0">
          <img src="/storage/user/1.jpg" class="img-circle elevation-2" height="40px" width="40px">
        </div>
        <div class="info">
          <a href="#" class="d-block "> {{auth()->user()->name}}</a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column p-0" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item text-right">
             <a href="/admin/dashboard" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i><p >الرئيسية</p>
             </a>
          </li>
          <li class="nav-item text-right">
            <a href="/admin/category" class="nav-link">
              <i class="nav-icon fas fa-copy"></i><p > الاقسام</p>
            </a>
          </li>
          <li  class="nav-item text-right">
            <a href="/admin/product" class="nav-link">
                <i class="nav-icon fas fa-th"></i><p > المنتجات</p>
            </a>
          </li>
          <li  class="nav-item text-right">
            <a href="/admin/attribute" class="nav-link">
                <i class="nav-icon fas fa-th"></i><p >الخصائص </p>
            </a>
          </li>
          <li  class="nav-item text-right">
            <a href="/admin/offer" class="nav-link">
                <i class="nav-icon fas fa-th"></i><p >العروض </p>
            </a>
          </li>
          <li  class="nav-item text-right">
            <a href="/admin/orders" class="nav-link">
                <i class="nav-icon fas fa-shopping-cart"></i><p > الطلبات</p>
            </a>
          </li>
          <li  class="nav-item text-right">
            <a href="/admin/clients" class="nav-link">
                <i class="nav-icon fas fa-users"></i><p > العملاء</p>
            </a>
          </li>
        </ul>
      </nav>

    </div>
  </aside>

  <div class="content-wrapper p-3" >
      <x-alert/>
      @yield('content')
  </div>
</div>

<script src="/js/jquery.min.js"></script>
<script src="/js/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="{{ asset('/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('/js/Chart.min.js')}}"></script>
<script src="{{ asset('/js/sparkline.js')}}"></script>
<script src="{{ asset('/js/jquery.knob.min.js')}}"></script>
<script src="{{ asset('/js/moment.min.js')}}"></script>
<script src="{{ asset('/js/daterangepicker.js')}}"></script>
<script src="{{ asset('/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{ asset('/js/summernote-bs4.min.js')}}"></script>
<script src="{{ asset('/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{ asset('/js/adminlte.js')}}"></script>
<script src="{{ asset('/js/dashboard.js')}}"></script>
<script src="{{ asset('/js/select2.full.min.js')}}"></script>
<script src="{{ asset('/js/jquery.vmap.min.js')}}"></script>
<script src="{{ asset('/js/jquery.vmap.usa.js')}}"></script>
<script src="{{ asset('/taginput/tagsinput.js') }}" type="text/javascript" ></script>
<script src="{{ asset('/js/demo.js')}}"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

  });
</script>
</body>
</html>
