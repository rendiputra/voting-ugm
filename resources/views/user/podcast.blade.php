@extends('layouts.admin')
@section('title','Galeri')

@section('content')
 <!-- Typical Author Area -->
 <section class="cr-section authors-area bg-image-2 section-padding-md" data-black-overlay="8">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-8 col-md-10 col-12">
							<div class="section-title section-title-white text-center">
								<br><h2> PODCAST</h2>
								<center><hr style="width: 50px; border: 3px solid #fff; border-radius: 5px;" class="text-center"></center>
							</div>
						</div>
					</div>
					
					<div class="row no-gutters justify-content-center">



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
         <div class="col-lg-4 col-md-7 col-sm-9">
            <div class="single-card card-style-one">
               <div class="card-image">
                 <iframe width="500" height="275" src="https://www.youtube.com/embed/bXXS1RxCHQI" title="YouTube video player" frameborder="1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
               </div>
               <div class="card-content text-center">
                  <h4 class="card-title">
                  Item title is here
                     <br><br>
                  </h4>
                  <form class="myform">
                            <button class="vote-btn" data-default-text="Voting Sekarang"
          data-alt-text="Terima kasih sudah Voting">
    <span class="text">Voting Sekarang</span>
  </button></form>
               </div>
            </div>
            <!-- single-card -->
         </div>
         <!-- col -->
         <div class="col-lg-4 col-md-7 col-sm-9">
            <div class="single-card card-style-one">
               <div class="card-image">
                  <img src="https://cdn.ayroui.com/1.0/images/card/card-2.jpg" alt="Image" />
               </div>
               <div class="card-content">
                  <h4 class="card-title">
                     <a href="javascript:void(0)">Item title is here</a>
                  </h4>
                  <p class="text">
                     Short description for the ones who look for something new
                  </p>
               </div>
            </div>
            <!-- single-card -->
         </div>
         <!-- col -->
         <div class="col-lg-4 col-md-7 col-sm-9">
            <div class="single-card card-style-one">
               <div class="card-image">
                  <img src="https://cdn.ayroui.com/1.0/images/card/card-3.jpg" alt="Image" />
               </div>
               <div class="card-content">
                  <h4 class="card-title">
                     <a href="javascript:void(0)">Item title is here</a>
                  </h4>
                  <p class="text">
                     Short description for the ones who look for something new
                  </p>
               </div>
            </div>
            <!-- single-card -->
         </div>
         <!-- col -->
      </div>
      <!-- row -->
   </div>
   <!-- container -->
</section>
<!--====== CARD PART ENDS ======-->
			
						</div>
                      


					</div>
				
					<div class="d-flex justify-content-center">
					
					</div>
				</div>
				
				<div class="spacee"></div>
			</section>
			<!--// Typical Author Area -->
@endsection