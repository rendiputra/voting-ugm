@extends('layouts.stisla')

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Podcast</h1>
  </div>

  <div class="section-body">

    <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <form action="{{ route('podcast.insert') }}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="card-header">
              <h4>Tambah Podcast Baru</h4>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label>Judul</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" id="customFile" name="judul" placeholder="Judul">
                @error('judul')
                  <div class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <label>Upload file suara</label>
                <div class="custom-file ">
                  <input type="file" class="custom-file-input @error('sound') is-invalid @enderror" id="customFile" name="sound">
                  <label class="custom-file-label" for="customFile">Choose file mp3</label>
                </div>
                @error('sound')
                  <div class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                  </div>
                @enderror
              </div>
            </div>
            <div class="card-footer text-right">
              <input type="submit" value="Submit" name="submit" class="btn btn-primary">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

