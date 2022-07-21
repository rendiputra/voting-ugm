@extends('layouts.admin')
@section('title','Galeri')

@section('content')
 <!-- Typical Author Area -->
 <section class="cr-section authors-area bg-image-2 section-padding-md" data-black-overlay="8">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-8 col-md-10 col-12">
							<div class="section-title section-title-white text-center">
								<br><h2> FOTOGRAFI</h2>
								<center><hr style="width: 50px; border: 3px solid #fff; border-radius: 5px;" class="text-center"></center>
							</div>
						</div>
					</div>
					
					<div class="row no-gutters justify-content-center">



						<div class="card mr-2 mt-2 ml-2 mb-2 col-xl-3 col-lg-4 col-md-4 col-sm-12 col-12" style="width: 18rem; max-height: 30rem;">
							<a href="#">
								<img class="card-img-top" src="https://drive.google.com/thumbnail?id=1-Hyi9FIIlb9ns3gCgy_KE41dR6-cHb6F&sz=w200-h200"  style="max-height: 18rem; ">
									<div class="card-body " style="max-height: 10rem;">
										<h5 class="card-title text-center">Juudl Makk</h5>
									<div class="text-center">
                                    <form class="myform">
                            <button class="vote-btn" data-default-text="Voting Sekarang"
          data-alt-text="Terima kasih sudah Voting">
    <span class="text">Voting Sekarang</span>
  </button></form>
                                    </div>
									</div>
							</a>
						</div>


					</div>
				
					<div class="d-flex justify-content-center">
					
					</div>
				</div>
				
				<div class="spacee"></div>
			</section>
			<!--// Typical Author Area -->
@endsection