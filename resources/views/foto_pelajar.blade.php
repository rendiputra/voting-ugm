@extends('layouts.admin')
@section('title','Fotografi pelajar')

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
               <h2> FOTOGRAFI</h2>
               <center>
                  <hr style="width: 50px; border: 3px solid #fff; border-radius: 5px;" class="text-center">
               </center>
            </div>
         </div>
      </div>
  
					<div class="row justify-content-center">
      <ul class="nav nav-pills nav-justified mb-3">
         <a class="nav-link text-white" href="/voting-foto/mahasiswa">Mahasiswa</a>
         <a class="nav-link active" href="">Pelajar</a>
      </ul>
    </div>

      {{--<div class="row no-gutters justify-content-center">


                    @foreach ($result as $d)
						<div class="card mr-2 mt-2 ml-2 mb-2 col-xl-3 col-lg-4 col-md-4 col-sm-12 col-12" style="width: 18rem; max-height: 30rem;">
							<a href="#">
								<img class="card-img-top" src="{{ url(asset('assets/foto')) }}/{{ $d->image_path }}" style="max-height: 18rem; ">
      <div class="card-body " style="max-height: 10rem;">
         <h5 class="card-title text-center">{{ $d->judul }}</h5>
         <div class="text-center">
            <form class="myform" action="/voting/foto/pelajar/{{ $d->id_foto }}">
               @csfr
               <input name="_id{{ $d->id_foto }}" value="{{ $d->id_foto }}" <button type="submit" class="vote-btn" data-default-text="Voting Sekarang" data-alt-text="Terima kasih sudah Voting">
               <span class="text">Voting Sekarang</span>
               </button>
            </form>
         </div>
      </div>
      </a>
   </div>
   @endforeach
   </div>--}}
   <div class="row row-cols-1 row-cols-md-3 g-4">

      <div class="card-columns">
          <div class="col-sm-12">
         @foreach ($result as $d)
         <div class="card my-2">
            <img src="{{ url(asset('assets/foto')) }}/{{ $d->image_path }}" class="card-img-top" alt="...">
            <div class="card-body">
               <h5 class="card-title text-center">{{ $d->judul }}</h5>
               <div class="text-center">
								    @if(Session::has('email'))
    								    @php $hasvote = FALSE; @endphp
    								    @foreach($voting_foto as $vp)
    								    @if($vp->tingkatan == 'pelajar')
    								        @php $hasvote = TRUE; @endphp
    								    @endif
    								    @endforeach
    								    @if(!$hasvote)
                  <form action="{{ route('voting_foto_email_pelajar',$d->id_foto) }}" enctype="multipart/form-data" method="post">
                     @csrf
                     <input type="hidden" name="_id{{ $d->id_foto }}" value="{{ $d->id_foto }}">
                     <button type="submit" class="vote-btn" data-default-text="Voting Sekarang" data-alt-text="Terima kasih sudah Voting">
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
         </div>
         @endforeach
      </div>
      </div>
   </div>
   <div class="d-flex justify-content-center">
      <br>
      <br>
      <br>
      <br>
      {!! $result->links() !!}
   </div>
   </div>

   <div class="spacee"></div>
</section>
<!--// Typical Author Area -->
@endsection