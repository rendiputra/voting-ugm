@extends('layouts.admin')
@section('title','Detail Galeri')
@section('css')
.spacee{
    width: 100%;
    height: 100px;
}
.body{
    font-family: 'Nunito', sans-serif;
}
p{
    font-size: 1.23rem;
}

#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
  }
  
  #myImg:hover {opacity: 0.7;}
  
  /* The Modal (background) */
  .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 155px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
  }
  
  /* Modal Content (image) */
  .modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
  }
  
  /* Caption of Modal Image */
  #caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
  }
  
  /* Add Animation */
  .modal-content, #caption {  
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
  }
  
  @-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
  }
  
  @keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
  }
  
  /* The Close Button */
  .close {
    position: absolute;
    top: 85px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
  }
  
  .close:hover,
  .close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
  }
  
  /* 100% Image Width on Smaller Screens */
  @media only screen and (max-width: 700px){
    .modal-content {
      width: 100%;
    }
  }

  .modal-backdrop {
    z-index: -1;
  }
@endsection
@section('content')
<section class="cr-section authors-area bg-image-2 section-padding-md" data-black-overlay="8">
    <div class="container">
        <div class="row justify-content-center " >
            <div class="col-lg-8 col-md-10 col-12">
                <div class="section-title section-title-white text-center">
                    <br><h2 style="font-size: 1.23rem">DETAIL KARYA</h2>
                    <center><hr style="width: 50px; border: 3px solid rgb(255, 255, 255); border-radius: 5px;" class="text-center"></center>
                </div>
            </div>
        </div>
        <div class="card text-center">
            <div class="card-header " style="background-color: #043353">
                {{-- <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" style="font-size: 1.23rem">Detail</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" style="font-size: 1.23rem">Diskusi</a>
                    </li>
                </ul> --}}
                <h3 style="font-size: 1.93rem" class="mt-2 text-white">{{$data->nama_karya}}</h3>
            </div>
            <div class="card-body">
                  
                  <center>
                  <div class="text-center col-md-9 col-xl-10">
                      @if (\Session::has('error'))
                          <div class="alert alert-warning alert-dismissible">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              <strong>Peringatan!</strong> {{\Session::get('error')}}
                          </div>
                      @elseif (\Session::has('sukses'))
                          <div class="alert alert-success alert-dismissible">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              <strong>Sukses!</strong> {{\Session::get('sukses')}}
                          </div>
                      @endif
                      {{-- <img src="{{ asset('foto_karya')}}/{{ $data->gambar}}" class="rounded img-fluid" alt="{{$data->nama_karya}}" style="max-width: 700px;"> --}}
                      <!-- The Modal -->
                      <div id="myModal" class="modal">
                          <span class="close">&times;</span>
                          <img class="modal-content" id="img01">
                          <div id="caption"></div>
                      </div>
                      <img id="myImg" src="{{ asset('foto_karya')}}/{{ $data->gambar}}" class="img-fluid rounded" alt="{{$data->nama_karya}}" >
                  </div>
                  </center>
                  <br>
                  <div class="row justify-content-center text-center">
                      <div class="col-auto">
                          <table style="margin-left: auto; margin-right: auto; font-size: 1.23rem;">
                              <tr>
                                <td>Seniman</td>
                                <td>:</td>
                                <td><strong>{{$data->nama_seniman}}</strong></td>
                              </tr>
                              <tr>
                                <td>Tahun</td>
                                <td>:</td>
                                <td><strong>{{$data->tahun_karya}}</strong></td>
                              </tr>
                              <tr>
                                <td>Media</td>
                                <td>:</td>
                                <td><strong>{{$data->media}}</strong></td>
                              </tr>
                              <tr>
                                <td>Ukuran</td>
                                <td>:</td>
                                <td><strong style="font-size: 1.23rem">{{$data->dimensi}}</strong></td>
                              </tr>
                              <tr>
                            </table>
                      </div>
                  </div>
                  @php
                      $str = $data->deskripsi;
                      // $len = strlen($str);
                  @endphp
                  <div class="ml-4 mr-5 @if (strlen($str) <= 100) text-center @else  text-justify @endif" style="font-size: 15.9rem" >
                      <br>{!! $data->deskripsi !!}
                  </div>
                  <div class="text-left mt-5">
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
                      Laporkan
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Laporkan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form method="POST" action="{{ route('laporkan') }}">
                              @csrf
                              <div class="form-group">
                                <label>Alasan Laporan</label>
                                <input type="text" name="pesan" class="form-control"  aria-describedby="pesanHelp" placeholder="Alasan">
                                <input type="hidden" name="id" value="{{$data->id_karya}}"> 
                                <small id="pesanHelp" class="form-text text-muted">Wajib mengisi bidang.</small>
                              </div>
                            
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                          </form>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="spacee"></div>
        </div>
        
        
    </section>
    
@endsection

@section('js')
<script>
    // Get the modal
    var modal = document.getElementById("myModal");
    
    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById("myImg");
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function(){
      modal.style.display = "block";
      modalImg.src = this.src;
      captionText.innerHTML = this.alt;
    }
    
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() { 
      modal.style.display = "none";
    }
</script>
@endsection