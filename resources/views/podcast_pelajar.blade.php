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
               <br>
               <h2> PODCAST</h2>
               <center>
                  <hr style="width: 50px; border: 3px solid #fff; border-radius: 5px;" class="text-center">
               </center>
            </div>
         </div>
      </div>

      <div class="row justify-content-center">

         <ul class="nav nav-pills nav-justified mb-3">
            <a class="nav-link text-white " href="/voting-podcast/mahasiswa">Mahasiswa</a>
            <a class="nav-link active" href="">Pelajar</a>
         </ul>



         <!--====== CARD PART START ======-->

         <section class="card-area pb-5">
            <div class="container">
               <div class="row justify-content-center">

                  @foreach ($result as $d)
                  <div class="col-lg-4 col-md-7 col-sm-9" style="max-width: 350px">
                     <div class="single-card card-style-one">
                        <div class="card-content text-center">
                           <audio controls>
                              <source src="{{ url(asset('assets/sound'))}}/{{ $d->sound_path }}" type="audio/mpeg">
                              Your browser does not support the audio element.
                           </audio>
                           <h4 class="card-title">
                              {{ $d->judul }}
                              <br><br>
                           </h4>
								    @if(Session::has('email'))
    								    @php $hasvote = FALSE; @endphp
    								    @foreach($voting_podcast as $vp)
    								    @if($vp->tingkatan == 'pelajar')
    								        @php $hasvote = TRUE; @endphp
    								    @endif
    								    @endforeach
    								    @if(!$hasvote)
                           <form action="/voting/podcast/pelajar/{{ $d->id_podcast }}" enctype="multipart/form-data" method="post">
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