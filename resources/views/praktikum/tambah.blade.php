@extends('layouts.stisla')

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Praktikum</h1>
  </div>

  <div class="section-body">

    <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <form action="{{ route('praktikum.insert') }}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="card-header">
              <h4>Tambah Praktikum Baru</h4>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label>Nama Praktikum</label>
                <select name="nama_praktikum" class="form-control @error('nama_praktikum') is-invalid @enderror">
                    @foreach($kategori_praktikum as $kp)
                    <option value="{{ $kp->id }}">{{ $kp->nama_praktikum }}</option>
                    @endforeach
                </select>
                @error('nama_praktikum')
                  <div class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <label>Sub Praktikum</label>
                <select name="sub_praktikum" class="form-control @error('sub_praktikum') is-invalid @enderror">
                    @foreach($kategori_sub_praktikum as $ksp)
                    <option value="{{ $ksp->id }}">{{ $ksp->sub_praktikum }}</option>
                    @endforeach
                </select>
                @error('sub_praktikum')
                  <div class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <label>Nama Mahasiswa</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Nama Mahasiswa">
                @error('nama')
                  <div class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <label>Link Youtube</label>
                <input type="text" class="form-control @error('link') is-invalid @enderror" id="link" name="link" placeholder="Link Youtube">
                @error('link')
                  <div class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <label>Upload file suara</label>
                <div class="custom-file ">
                  <input type="file" class="custom-file-input @error('audio') is-invalid @enderror" id="customFile" name="audio">
                  <label class="custom-file-label" for="customFile">Choose file mp3</label>
                </div>
                @error('audio')
                  <div class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <label>Gambar</label>
                <div class="custom-file ">
                  <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="customFile" name="image">
                  <label class="custom-file-label" for="customFile">Choose image</label>
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

