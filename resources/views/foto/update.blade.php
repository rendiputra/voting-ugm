@extends('layouts.stisla')

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Foto</h1>
  </div>

  <div class="section-body">

    <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <form action="/foto/update/{{ $result->id_foto }}" enctype="multipart/form-data" method="post">
            <input class="form-control" type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="card-header">
              <h4>Update Foto Baru</h4>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label>Judul</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" id="customFile" name="judul" placeholder="Judul" value="{{ $result->judul }}">
                <input type="hidden" class="form-control" name="_id" placeholder="Judul" value="{{ $result->id_foto }}">
                @error('judul')
                  <div class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <label>Gambar</label>
                <div class="custom-file ">
                  <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="customFile" name="image">
                  <label class="custom-file-label" for="customFile">{{ $result->image_path }}</label>
                </div>
                @error('image')
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

