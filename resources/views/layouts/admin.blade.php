<!doctype html>
<html class="no-js" lang="zxx">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title') - Pagelaran Kawolu</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<meta name="dicoding:email" content="rendiputrapradana@gmail.com">-->

    <link rel="icon" href="{{ url(asset('images/favicon.ico'))}}" type="image/x-icon">

    <!-- Google font (font-family: 'Lato', sans-serif;) -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,900" rel="stylesheet">
    <!-- Google font (font-family: 'Raleway', sans-serif;) -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700,800" rel="stylesheet">
    {{-- <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ url(asset('css/bootstrap.min.css'))}}"> 
    <link rel="stylesheet" href="{{ url(asset('css/plugins.css'))}}">
    <link rel="stylesheet" href="{{ url(asset('style.css'))}}">

    <!-- Cusom css -->
    <link rel="stylesheet" href="{{ url(asset('css/custom.css'))}}">

    <!-- Modernizer js -->
    <script src="{{ url(asset('js/vendor/modernizr-3.5.0.min.js'))}}"></script>
    <style>
        .min-h{
            min-height: 800px;
        }
        .spacer{
            width: 100%;
        	height: 140px;
        }
		body { 
            /* font-family: 'Raleway', sans-serif;  */
        }
        @yield('css');
    </style>
</head>

<body>
    <div id="wrapper" class="wrapper">

 <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
              <a class="navbar-brand" href="/"><img src="{{ url(asset('images/logo/fix.png'))}}" alt="" height="90"></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                  <a class="nav-link" href="/">Home</a>
                  <a class="nav-link" href="/voting-foto/mahasiswa">Fotografi</a>
                  <a class="nav-link" href="/voting-podcast/mahasiswa">Podcast</a>
                  <a class="nav-link" href="/voting-praktikum">Praktikum</a>
                </div>
              </div>
          </div>
        </nav>


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
						<p style="font-size: 1rem">Copyright ©2022 | Pagelaran Kawolu</p>
					</div>
				</div>
			</div>
        </div>
        <!--// Footer -->

    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Masukkan Email anda</h5>
        <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
      </div>
      <div class="modal-body">
        <form action="{{ route('email') }}" method="POST">
            @csrf
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Email:</label>
            <input type="email" class="form-control" name="email" id="recipient-name">
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>

    <!-- JS Files -->
    <script src="/public/js/vendor/jquery-3.2.1.min.js"></script>
    <script src="/public/js/popper.min.js"></script>
    <script src="/public/js/bootstrap.min.js"></script>
    <script src="/public/js/plugins.js"></script>
    <script src="/public/js/active.js"></script>
    <script src="/public/js/scripts.js"></script>
    <script src="{{ url(asset('js/vote.js'))}}"></script>
    @yield('js')
    
    <script>
        $( document ).ready(function() {
            @php 
                if(!Session::has('email'))
                {
            @endphp
                $('#exampleModal').modal('show');
            @php
                }
            @endphp
        });
    </script>
</body>
</html>