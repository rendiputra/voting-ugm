<!doctype html>
<html class="no-js" lang="zxx">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title') - Pameran Kuy</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="dicoding:email" content="rendiputrapradana@gmail.com">

    <link rel="icon" href="{{ asset('images/brush.ico')}}" type="image/x-icon">

    <!-- Google font (font-family: 'Lato', sans-serif;) -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,900" rel="stylesheet">
    <!-- Google font (font-family: 'Raleway', sans-serif;) -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700,800" rel="stylesheet">
    {{-- <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
	<!-- {{ asset('')}} -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}"> 
    <link rel="stylesheet" href="{{ asset('css/plugins.css')}}">
    <link rel="stylesheet" href="{{ asset('style.css')}}">

    <!-- Cusom css -->
    <link rel="stylesheet" href="{{ asset('css/custom.css')}}">

    <!-- Modernizer js -->
    <script src="{{ asset('js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <style>
        .min-h{
            min-height: 800px;
        }
        .spacer{
            width: 100%;
        	height: 140px;
        }
        @yield('css');
    </style>
</head>

<body>
    <div id="wrapper" class="wrapper">

        <div class="header header-style-1 header-transparent sticky-header" style="background-color: #18212e">
            <div class="container">
				<div class="mobile-menu d-block d-lg-none">
					<a href="/" class="logo">
						<img src="{{ asset('images/logo/logo3.png')}}" >
					</a>
				</div>
                <div class="header-inner d-none d-lg-flex">
                    <a href="/" class="logo">
                        <img src="/images/logo/logo3.png" >
					</a>

					<nav class="bn-navigation text-right">
						<ul>
							<li><a href="/">home</a></li>
							<li><a href="/galeri">Galeri</a></li>
							<li><a href="/tentang">Tentang Kami</a></li>
							@guest
                            <li><a href="/login" class="btn btn-outline-primary pt-2 pb-2 mr-2 text-white" >Login</a></li>
                            <li><a href="/register" class=" btn btn-primary pt-2 pb-2 ml-2 text-white">Daftar</a></li>
                            @else
                                <li><a href="#" class="text-danger">{{ substr(Auth::user()->name, 0,  20) }}</a>
                                    <ul>
                                        <li><a href="/home">Dashbord</a></li>
                                        @if(Auth::user()->isSuperAdmin == 1)
                                            <li><a href="/admin/list_antrian_karya">List Antrian Post</a></li>
                                            <li><a href="/admin/list_laporan">List Laporan Post</a></li>
                                        @endif
                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                        
                                        
                                    </ul>
                                </li>
                            @endguest
                            
						</ul>
					</nav>
                </div>
            </div>
        </div>


        <!-- Page Content -->
        <main id="page-content">
        @yield('content')
			

        </main>
        <!--// Page Content -->

        <!-- Footer -->
        <div class="footer">
			<div class="footer-copyright-area " style="background-color: #18212e">
				<div class="container">
					<div class="footer-copyright text-center">
						<p style="font-size: 1.23rem">Copyright ©2021 | Re-Cloud Challange</p>
					</div>
				</div>
			</div>
        </div>
        <!--// Footer -->

    </div>


    <!-- JS Files -->
    <script src="/js/vendor/jquery-3.2.1.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/plugins.js"></script>
    <script src="/js/active.js"></script>
    <script src="/js/scripts.js"></script>
    @yield('js')
</body>
</html>