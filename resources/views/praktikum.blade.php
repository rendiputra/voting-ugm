@extends('layouts.admin')
@section('title','Praktikum')

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
                        @foreach ($kategori_praktikum as $p)
					<div class="row justify-content-center mt-5">
						<div class="col-lg-8 col-md-10 col-12">
							<div class="section-title section-title-white text-center">
								<br><h2>{{ $p->nama_praktikum }}</h2>
								<center><hr style="width: 50px; border: 3px solid #fff; border-radius: 5px;" class="text-center"></center>
							</div>
						</div>
					</div>
					<div class="row justify-content-center">
					    
					    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
					            @foreach($kategori_sub_praktikum as $s)
					            @php
					            $active = FALSE;
					            //dd($all);
					            if($s->id_kategori == $p->id)
					            {
					            if($s->sub_praktikum == "Audio Video" OR $s->sub_praktikum == "Creative Photo" OR $s->sub_praktikum == "Jurnalisme Pertanian" OR  $s->sub_praktikum == "Karang Taruna" OR  $s->sub_praktikum == "Manajemen Penerbitan" OR  $s->sub_praktikum == "Video Siaran" OR $s->sub_praktikum == "MTPKP" OR  $s->sub_praktikum == "Periklanan" OR  $s->sub_praktikum == "PKP")
					            {
					                $active = TRUE;
					            }
					            @endphp
                          <li class="nav-item bg-white rounded" role="presentation">
                            <button class="nav-link @if($active == 1) active @endif" id="{{ $s->id }}-tab" data-toggle="pill" data-target="#{{ $s->id }}" type="button" role="tab" aria-controls="{{ $s->id }}" aria-selected="true">{{ $s->sub_praktikum }}</button>
                          </li>
                                @php
                                }
                                @endphp
                                @endforeach
                        </ul>
                        </div>
                        <div class="row justify-content-center">
    					    <div class="col-sm-12">
                                <div class="tab-content" id="pills-tabContent">
    					            @foreach($kategori_sub_praktikum as $s)
    					            @php
    					            $active = FALSE;
    					            if($s->id_kategori == $p->id)
    					            {
    					            if($s->sub_praktikum == "Audio Video" OR $s->sub_praktikum == "Creative Photo" OR $s->sub_praktikum == "Jurnalisme Pertanian" OR  $s->sub_praktikum == "Karang Taruna" OR  $s->sub_praktikum == "Manajemen Penerbitan" OR  $s->sub_praktikum == "Video Siaran" OR $s->sub_praktikum == "MTPKP" OR  $s->sub_praktikum == "Periklanan" OR  $s->sub_praktikum == "PKP")
    					            {
    					                $active = TRUE;
    					            }
    					            @endphp
                                        <div class="tab-pane fade @if($active == 1) show active @endif" id="{{ $s->id }}" role="tabpanel" aria-labelledby="{{ $s->id }}-tab">
                                            
                                         <div class="card-columns">
                                            @foreach($all as $a)
                                                @if($p->id == $a->id_kategori_praktikum && $s->id == $a->id_kategori_sub_praktikum)
                                              <div class="card my-2 text-center">
                                                  @if (strpos($a->data, 'iframe') !== false)
                                                  {!! $a->data !!}
                                                  @endif
                                                  
                                                  @if (strpos($a->data, '.mp3') !== false)
                                                  <center>
                                                   <audio controls class="mt-4">
                                                      <source src="{{asset('assets/sound/'.$a->data)}}" type="audio/mpeg">
                                                        Your browser does not support the audio element.
                                                    </audio>
                                                    </center>
                                                  @endif
                                                  @if (strpos($a->data, '.webp') !== false)
                                                    <img src="{{ asset('assets/foto') }}/{{ $a->data }}" class="card-img-top">
                                                  @endif
                                                  @if (strpos($a->data, '.pdf') !== false)
                                                  <object data="{{ asset('assets/sound')."/".$a->data }}" style="width: 100%; height: 315px;" type="application/pdf">
                                                      <embed src="{{ asset('assets/sound')."/".$a->data }}" type="application/pdf" style="width: 100%; height: 315px;" />
                                                    </object>
    
                                                  @endif
                                                {{--<img src="{{ asset('assets/foto') }}/{{ $a->image_path }}" class="card-img-top" alt="...">--}}
                                                <div class="card-body">
                                                  <h5 class="card-title text-center">{{ $a->nama }}</h5>
                        								<div class="text-center">
                        								    @if(Session::has('email'))
                        								    @php $hasvote = FALSE; @endphp
                        								    @foreach($voting_praktikum as $vp)
                        								    @if($vp->id_kategori == $a->id_kategori_praktikum && $vp->id_sub_kategori == $a->id_kategori_sub_praktikum)
                        								        @php $hasvote = TRUE; @endphp
                        								    @endif
                        								    @endforeach
                        								    @if(!$hasvote)
                                                            <form action="/voting-praktikum/{{ $a->id_kategori_praktikum }}/{{ $a->id }}/{{ $a->id_kategori_sub_praktikum }}" enctype="multipart/form-data" method="post">
                                                                    <input name="id_kategori" value="{{ $a->id }}" type="hidden">
                                                                    @csrf
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
                                              @endif
                                              @endforeach
                                        </div>
                                        </div>
                                    @php
                                    }
                                    @endphp
                                    @endforeach
                            </div>
                            </div>
                        </div>
                    
                  @endforeach
					<div class="d-flex justify-content-center">
					<br>
                    <br>
                    <br>
                    <br>
					</div>
				</div>
				
				<div class="spacee"></div>
			</section>
			<!--// Typical Author Area -->
@endsection