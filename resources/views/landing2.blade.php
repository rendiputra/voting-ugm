<!doctype html>
<html lang="id">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Pameran Karya Untuk Indonesia</title>
    <meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="dicoding:email" content="rendiputrapradana@gmail.com">

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
    <link rel="stylesheet" href="http://127.0.0.1:5500/assets/vendor/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="http://127.0.0.1:5500/assets/css/style.css">

    <style>
        .faq .faq-list {
        padding: 0 100px;
        }
        .faq .faq-list ul {
        padding: 0;
        list-style: none;
        }

        .faq .faq-list li + li {
        margin-top: 15px;
        }

        .faq .faq-list li {
        padding: 20px;
        background: #fff;
        border-radius: 4px;
        position: relative;
        }

        .faq .faq-list a {
        display: block;
        position: relative;
        font-family: "Poppins", sans-serif;
        font-size: 16px;
        line-height: 24px;
        font-weight: 500;
        padding: 0 30px;
        outline: none;
        }

        .faq .faq-list .icon-help {
        font-size: 24px;
        position: absolute;
        right: 0;
        left: 20px;
        color: #76b5ee;
        }

        .faq .faq-list .icon-show, .faq .faq-list .icon-close {
        font-size: 24px;
        position: absolute;
        right: 0;
        top: 0;
        }

        .faq .faq-list p {
        margin-bottom: 0;
        padding: 10px 0 0 0;
        }

        .faq .faq-list .icon-show {
        display: none;
        }

        .faq .faq-list a.collapsed {
        color: #343a40;
        }

        .faq .faq-list a.collapsed:hover {
        color: #1977cc;
        }

        .faq .faq-list a.collapsed .icon-show {
        display: inline-block;
        }

        .faq .faq-list a.collapsed .icon-close {
        display: none;
        }

        @media (max-width: 1200px) {
        .faq .faq-list {
            padding: 0;
        }
        }

        section {
  padding: 60px 0;
  overflow: hidden;
}

.section-bg {
  background-color: #f1f7fd;
}

.section-title {
  text-align: center;
  padding-bottom: 30px;
}

.section-title h2 {
  font-size: 32px;
  font-weight: bold;
  margin-bottom: 20px;
  padding-bottom: 20px;
  position: relative;
  color: #2c4964;
}

.section-title h2::before {
  content: '';
  position: absolute;
  display: block;
  width: 120px;
  height: 1px;
  background: #ddd;
  bottom: 1px;
  left: calc(50% - 60px);
}

.section-title h2::after {
  content: '';
  position: absolute;
  display: block;
  width: 40px;
  height: 3px;
  background: #1977cc;
  bottom: 0;
  left: calc(50% - 20px);
}

.section-title p {
  margin-bottom: 0;
}
.bx{font-family:'boxicons'!important;font-weight:normal;font-style:normal;font-variant:normal;line-height:1;display:inline-block;text-transform:none;speak:none;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.bx-ul{margin-left:2em;padding-left:0;list-style:none}.bx-ul>li{position:relative}.bx-ul .bx{font-size:inherit;line-height:inherit;position:absolute;left:-2em;width:2em;text-align:center}
.bx-help-circle:before{content:"\ea6f"}
@-webkit-keyframes fade-up{0%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}75%{-webkit-transform:translateY(-20px);transform:translateY(-20px);opacity:0}}@keyframes fade-up{0%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}75%{-webkit-transform:translateY(-20px);transform:translateY(-20px);opacity:0}}
.bx-chevron-down:before{content:"\e9ac"}.bx-chevron-down-circle:before{content:"\e9ad"}.bx-chevron-down-square:before{content:"\e9ae"}.bx-chevron-left:before{content:"\e9af"}




    </style>

    <!-- Modernizer js -->
    <script src="{{ asset('js/vendor/modernizr-3.5.0.min.js')}}"></script>
</head>

<body>
    <div id="wrapper" class="wrapper">

        <div class="header header-style-1 header-transparent sticky-header">
            <div class="container">
				<div class="mobile-menu d-block d-lg-none">
					<a href="index.html" class="logo">
						<img src="{{ asset('images/logo/logo3.png')}}" alt="logo theme">
					</a>
				</div>
                <div class="header-inner d-none d-lg-flex">
                    <a href="index.html" class="logo">
                        <img src="images/logo/logo3.png" alt="logo theme">
					</a>
					
					<!-- Nagivation -->
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

        <div class="banner-area banner-slider-active">

            <!-- Single Banner -->
            <div class="banner bg-image-3 justify-content-center align-items-center" data-black-overlay="5">
                <div class="container">
                    <div class="banner-text banner-text-white">
					@php
						$date = date("Ymd", strtotime("01-03-2021"));
						$dateNow = date("Ymd", strtotime(now()));
						//dd($dateNow);
					@endphp
					@if	($dateNow<$date)
                        <div class="banner-countbox event-countdown" data-countdown="2021/03/01"></div>
					@endif
                        <h1>Pameran karya untuk Indonesia</h1>
                        <h4>01-28 Februari 2021 | {{$jml_karya}} Karya {{$jml_user}} Seniman</h4>
@guest	
						<a href="/register" class="cr-btn cr-btn-lg cr-btn-blue">
							<span>Daftar Sekarang</span>
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
								<h2>KOLEKSI POPULER</h2>
								<center><hr style="width: 50px; border: 3px solid rgb(0, 0, 0); border-radius: 5px;" class="text-center"></center>
							</div>
						</div>
					</div>
					<div class="row justify-content-center portfolios portfolio-popup-gallery-active">

@foreach ($data as $d)
						<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12" >
							<a href="{{ asset('foto_karya')}}/{{ $d->gambar}}" class="portfolio">
								<div class="portfolio-thumb">
									<img src="{{ asset('foto_karya')}}/{{ $d->gambar}}" alt="{{ substr($d->nama_karya, 0,  50) }} - {{ substr($d->nama_seniman, 0,  50) }}">
								</div>
								<div class="portfolio-content">
									<h5>{{ substr($d->nama_karya, 0,  20) }}</h5>
									<h6>{{ substr($d->nama_seniman, 0,  20) }} - {{$d->tahun_karya}}</h6>
								</div>
							</a>
						</div>
@endforeach
	
					</div>
					<div class="button-group pt-4 text-center" >
						<a href="/galeri" class="cr-btn cr-btn-blue">
							<span>Lihat Lebih Banyak</span>
						</a>	
					</div>
				</div>
			</section>
			<!--// Koleksi Area -->

			<!-- Tentang Area -->
            <section class="cr-section about-area   mb-5 mt-3" style="background-color: #f5f5f5"><br><br>
                <div class="container align-content-center">
					<div class="card col-md-12" style="box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);">
						<div class="card-body">
							<div class="about-text text-center">
								<br><br>
								<h2 class="">Pameran Kui</h2>
								<center><hr style="width: 50px; border: 3px solid rgb(0, 0, 0); border-radius: 5px;" ></center>
								<p class="text-justify" style="font-size: 1.1rem"><span class="text-primary">Pameran KUI(Karya Untuk Indonesia)</span> adalah aplikasi yang dibuat untuk mendukung para seniman untuk terus aktif dan produktif meski saat ini dihadapkan dengan pandemi COVID-19 yang berimbas ke hampir seluruh sektor. Dengan ada nya aplikasi ini diharapkan para seniman dan terutama seniman pemula dapat dengan mudah untuk menampilkan karya-karya nya dan juga dapat mempermudah para penikmat karya seni untuk melihat karya para seniman. Dan harapannya kedepan akan dapat menghasilkan transaksi antara seniman dan kolektor seni yang berkontrikbusi kepada ekonomi nasional.</p>
								<p class="text-justify" style="font-size: 1.1rem">Aplikasi ini juga diikut sertakan dalam Event Re-Cloud Challenges Indonesia dalam kategori <span class="text-primary"> Entertainment </span> yang diselenggarakan oleh <a href="https://alibabacloud.com/" class="text-primary text-bold" target="_BLANK">Alibaba Cloud</a> dan <a href="https://www.codepolitan.com/" target="_BLANK" class="text-primary text-bold">Codepolitan</a>. </p>

								<div class="button-group">
									<a href="/tentang" class="cr-btn cr-btn-blue">
										<span>Lihat Selengkapnya</span>
									</a>
								</div>
							</div>
							
					  </div>
					  
                    
                </div>
            </section>
            <!--// Tentang Area -->
            
            <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
        <div class="container">
  
          <div class="section-title">
            <h2>Frequently Asked Questions</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
          </div>
  
          <div class="faq-list">
            <ul>
              <li data-aos="fade-up">
                <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" class="collapse" href="#faq-list-1">Non consectetur a erat nam at lectus urna duis? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="faq-list-1" class="collapse show" data-parent=".faq-list">
                  <p>
                    Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                  </p>
                </div>
              </li>
  
              <li data-aos="fade-up" data-aos-delay="100">
                <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-2" class="collapsed">Feugiat scelerisque varius morbi enim nunc? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="faq-list-2" class="collapse" data-parent=".faq-list">
                  <p>
                    Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                  </p>
                </div>
              </li>
  
              <li data-aos="fade-up" data-aos-delay="200">
                <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-3" class="collapsed">Dolor sit amet consectetur adipiscing elit? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="faq-list-3" class="collapse" data-parent=".faq-list">
                  <p>
                    Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                  </p>
                </div>
              </li>
  
              <li data-aos="fade-up" data-aos-delay="300">
                <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-4" class="collapsed">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="faq-list-4" class="collapse" data-parent=".faq-list">
                  <p>
                    Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in.
                  </p>
                </div>
              </li>
  
              <li data-aos="fade-up" data-aos-delay="400">
                <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-5" class="collapsed">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="faq-list-5" class="collapse" data-parent=".faq-list">
                  <p>
                    Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque.
                  </p>
                </div>
              </li>
  
            </ul>
          </div>
  
        </div>
      </section>


        </main>
        <!--// Page Content -->

        <!-- Footer -->
        <div class="footer">
			<div class="footer-copyright-area " style="background-color: #18212e">
				<div class="container">
					<div class="footer-copyright text-center">
						<p style="font-size: 1.23rem">Copyright ©2021 | Re-Cloud Challenge</p>
					</div>
				</div>
			</div>
        </div>
        <!--// Footer -->

    </div>


    <!-- JS Files -->
    <script src="js/vendor/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/active.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>