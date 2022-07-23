@extends('layouts.admin')
@section('title','Galeri')

@section('content')
 <!-- Typical Author Area -->
 <section class="cr-section authors-area bg-image-3 section-padding-md" data-black-overlay="8">
				<div class="container">
				    @if(Session::has('sukses'))
				    <div class="row justify-content-center">
                        <div class="alert alert-success mt-5" role="alert">
                            {!! Session::get('sukses') !!}
                        </div>
				    </div>
				    @endif
				    @if(Session::has('gagal'))
				    <div class="row justify-content-center">
                        <div class="alert alert-danger mt-5" role="alert">
                            {!! Session::get('gagal') !!}
                        </div>
				    </div>
				    @endif
					<div class="row justify-content-center mt-5">
						<div class="col-lg-8 col-md-10 col-12">
							<div class="section-title section-title-white text-center">
								<br><h2> PODCAST</h2>
								<center><hr style="width: 50px; border: 3px solid #fff; border-radius: 5px;" class="text-center"></center>
							</div>
						</div>
					</div>
					
					<div class="row no-gutters justify-content-center">
					     <ul class="nav nav-pills nav-justified">
            <a class="nav-link active" href="#">Mahasiswa</a>
            <a class="nav-link text-white" href="/voting-podcast/pelajar">Pelajar</a>
         </ul>



						<!-- <div class="card mr-2 mt-2 ml-2 mb-2 col-xl-3 col-lg-4 col-md-4 col-sm-12 col-12" style="width: 18rem; max-height: 30rem;">
							
                        <iframe width="340" height="215" src="https://www.youtube.com/embed/bXXS1RxCHQI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
								<!-- <img class="card-img-top" src="https://drive.google.com/thumbnail?id=1-Hyi9FIIlb9ns3gCgy_KE41dR6-cHb6F&sz=w200-h200"  style="max-height: 18rem; "> -->
									<!-- <div class="card-body " style="max-height: 10rem;">
										<h5 class="card-title text-center">Juudl Makk</h5>
									
									</div> --> 
<!-- 
                                    <div class="card d-flex mr-auto " style="width: 20rem;">
                        <iframe width="340" height="215" src="https://www.youtube.com/embed/bXXS1RxCHQI" title="YouTube video player" frameborder="1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="card-img-top"></iframe>
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div> -->


<!--====== CARD PART START ======-->

<section class="card-area pb-5">
   <div class="container">
      <div class="row justify-content-center">
          
        @foreach ($result as $d)
         <div class="col-lg-4 col-md-7 col-sm-9" style="max-width: 350px">
            <div class="single-card card-style-one">
               <div class="card-content text-center">
                   <audio controls>
                      <source src="{{ url(asset('assets/sound')) }}/{{ $d->sound_path }}" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                      <h4 class="card-title">
                            {{ $d->judul }}
                            <br><br>
                      </h4>
								    @if(Session::has('email'))
    								    @php $hasvote = FALSE; @endphp
    								    @foreach($voting_podcast as $vp)
    								    @if($vp->tingkatan == 'mahasiswa')
    								        @php $hasvote = TRUE; @endphp
    								    @endif
    								    @endforeach
    								    @if(!$hasvote)
                    <form  action="/voting/podcast/mahasiswa/{{ $d->id_podcast }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <input type="hidden" name="_id{{ $d->id_podcast }}" value="{{ $d->id_podcast }}">
                        <button type="submit" class="vote-btn">
                                <span class="text">Voting Sekarang</span>
                        </button>
                    </form>
                                    @else
                                    <button type="button" class="btn btn-danger disabled" disabled>
                                            <span class="text">Anda sudah voting</span>
                                    </button>
                                    @endif
                                      @else
                                            <button type="button" class="vote-btn" data-toggle="modal" data-target="#exampleModal">
                                                    <span class="text">Voting Sekarang</span>
                                            </button>
                                    @endif
               </div>
            </div>
            <!-- single-card -->
         </div>
         @endforeach
         
         
         <!-- col -->
      </div>
       
      <!-- row -->
   </div>
   <!-- container -->
</section>
<!--====== CARD PART ENDS ======-->
			
			 <div class="d-flex justify-content-center">
    	<br>
        <br>
        <br>
        <br>
        <br>
          {!! $result->links() !!}
    	</div>
						</div>
                      


					</div>
				
					<div class="d-flex justify-content-center">
					
					</div>
				</div>
				
				<div class="spacee"></div>
			</section>
			<!--// Typical Author Area -->
@endsection