<!doctype html>
<html lang="id">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Pagelaran Kawolu</title>
    <meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <meta name="dicoding:email" content="rendiputrapradana@gmail.com"> -->

    <link rel="icon" href="{{ asset('images/brush.ico')}}" type="image/x-icon">
    <!-- Google font (font-family: 'Lato', sans-serif;) -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,900" rel="stylesheet">
    <!-- Google font (font-family: 'Raleway', sans-serif;) -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700,800" rel="stylesheet">

    <!-- Stylesheets -->
	<!-- {{ asset('')}} -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}"> 
    <link rel="stylesheet" href="{{ asset('css/plugins.css')}}">
    <link rel="stylesheet" href="{{ asset('style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/vote.scss')}}">

    <!-- Modernizer js -->
    <script src="{{ asset('js/vendor/modernizr-3.5.0.min.js')}}"></script>
</head>

<body>
    <div id="wrapper" class="wrapper">

        <div class="header header-style-1 header-transparent sticky-header">
            <div class="container">
				<div class="mobile-menu d-block d-lg-none">
					<a href="/" class="logo">
						<img src="{{ asset('images/logo/fix.png')}}" width="90" alt="logo theme">
					</a>
				</div>
                <div class="header-inner d-none d-lg-flex">
                    <a href="/" class="logo">
                        <img src="{{ asset('images/logo/fix.png')}}" width="100" alt="logo theme">
					</a>
					
					<!-- Nagivation -->
					<nav class="bn-navigation text-right">
						<ul>
							<li><a href="/">home</a></li>
							<li><a href="/voting-foto">Fotografi</a></li>
							<li><a href="/podcast">Podcast</a></li>                             
                            
						</ul>
					</nav>
                </div>
            </div>
        </div>

        <div class="banner-area banner-slider-active">

            <!-- Single Banner -->
            <div class="banner bg-image-3 justify-content-center align-items-center" data-black-overlay="5">
                <div class="container">
                    <div class="banner-text banner-text-white">
					@php
						$date = date("Ymd", strtotime("29-07-2022"));
						$dateNow = date("Ymd", strtotime(now()));
						//dd($dateNow);
					@endphp
					@if	($dateNow<$date)
                        <div class="banner-countbox event-countdown" data-countdown="2022/07/29"></div>
					@endif
                        <h1>Pagelaran Kawolu</h1>
                        <p>Pagelaran Kawolu yang merupakan acara rutin dua tahun sekali yang dilaksanakan oleh Program Studi Program Studi Penyuluhan dan Komunikasi Pertanian (PKP) yang saat ini sudah memasuki edisi ke-8. Sementara itu, Pagelaran berasal dari kata Pameran dan Gelaran yang menampilkan hasil praktikum dari berbagai MK di Prodi PKP, perlombaan, dan acara talkshow bertema penyuluhan pertanian. Diselenggarakannya Pagelaran Kawolu bertujuan untuk ajang promosi Program Studi PKP, sarana apresiasi dan publikasi karya mahasiswa, serta menjaga eksistensi Program Studi PKP.</p>
@guest	
						<a href="/register" class="cr-btn cr-btn-lg cr-btn-blue">
							<span>Vote Sekarang</span>
						</a>
@endguest
                    </div>
                </div>
            </div>

        </div>
        <!--// Header Banner -->

        <!-- Page Content -->
        <main id="page-content">
            
			<!-- Koleksi Area -->
			<section class="cr-section portfolio-area bg-white section-padding-md">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-8 col-md-10 col-12">
							<div class="section-title text-center">
								<h2>Pilihan Voting </h2>
								<center><hr style="width: 50px; border: 3px solid rgb(0, 0, 0); border-radius: 5px;" class="text-center"></center>
							</div>
						</div>
					</div>
					<div class="row justify-content-center portfolios portfolio-popup-gallery-active">

						<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 text-center" >
							<a href="" class="portfolio">
								<div class="portfolio-thumb">
									<img src="{{asset('images/bg/bg-image-3.jpg')}}">
								</div>
								<div class="portfolio-content">
									<h5>Judul Voting</h5><br>
									<!-- <h6>Deskkripsi Voting</h6> -->
                                   
								</div>
							</a>
                            <form class="myform">
                            <button class="vote-btn" data-default-text="Voting Sekarang"
          data-alt-text="Terima kasih sudah Voting">
    <span class="text">Voting Sekarang</span>
  </button></form>
						</div>

	
					</div>
					<div class="button-group pt-4 text-center" >
						<a href="/galeri" class="cr-btn cr-btn-blue">
							<span>Lihat Lebih Banyak</span>
						</a>	
					</div>
				</div>
			</section>
			<!--// Koleksi Area -->




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


    <!-- JS Files -->
    <script src="{{ asset('js/vendor/jquery-3.2.1.min.js')}}"></script>
    <script src="{{ asset('js/popper.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/plugins.js')}}"></script>
    <script src="{{ asset('js/active.js')}}"></script>
    <script src="{{ asset('js/scripts.js')}}"></script>
    <script src="{{ asset('js/vote.js')}}"></script>
</body>
</html>