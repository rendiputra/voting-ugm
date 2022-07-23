<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admin </title>

  <!-- Favicons -->
  <link href="/image/favicon.ico" rel="icon">
  <link href="/image/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


  <!-- Template CSS -->
  <link rel="stylesheet" href="/public/assets/assets-stisla/css/style.css">
  <link rel="stylesheet" href="/public/assets/assets-stisla/css/components.css">
  <link href="/public/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/public/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">

  <!-- plugin -->
  <script src="/public/assets/vendor/ckeditor/ckeditor.js"></script>
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">

          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <!--<img alt="image" src="../assets/assets-stisla/img/avatar/avatar-1.png" class="rounded-circle mr-1">-->
              <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name}}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item has-icon text-danger" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                  <i class="fas fa-sign-out-alt"></i>{{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="/">UGM</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="/">UGM</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Admin Panel</li>
            <li class="@if(Request::is('home','home/*')) active @endif"><a class="nav-link " href="{{ route('home') }}"><i class="bi bi-file-person"></i><span>Top Vote</span></a></li>
            <li class="nav-item dropdown @if(Request::is('foto.index','foto.index')) active @endif">
              <a href="#" class="nav-link has-dropdown"><i class="bi bi-card-image"></i> <span>Foto</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('foto.index') }}">List Foto</a></li>
                <li><a class="nav-link" href="{{ route('foto.show') }}">Tambah Foto Baru</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown @if(Request::is('podcast.index','podcast*')) active @endif">
              <a href="#" class="nav-link has-dropdown"><i class="bi bi-chat-left-text"></i><span>Podcast</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('podcast.index') }}">List Podcast</a></li>
                <li><a class="nav-link" href="{{ route('podcast.show') }}">Tambah Podcast Baru</a></li>
              </ul>
            </li>
          </ul>

          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="/" class="btn btn-primary btn-lg btn-block btn-icon-split">
              <i class="fas fa-rocket"></i> Home
            </a>
          </div>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2022 <div class="bullet"></div> Pagelaran Kawolu
        </div>
        <div class="footer-right">
          V 1.0.1
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="/public/assets/assets-stisla/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="../node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
  <script src="../node_modules/chart.js/dist/Chart.min.js"></script>
  <script src="../node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
  <script src="../node_modules/summernote/dist/summernote-bs4.js"></script>
  <script src="../node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

  <!-- Template JS File -->
  <script src="/public/assets/assets-stisla/js/scripts.js"></script>
  <script src="/public/assets/assets-stisla/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="/public/assets/assets-stisla/js/page/index.js"></script>
  <script>
    CKEDITOR.replace('editor1');
  </script>
</body>

</html>