@extends('layouts.stisla')

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Galerry</h1>
  </div>

  <div class="section-body">

    <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <form action="buat_gallery_act.php" enctype="multipart/form-data" method="post">
            <div class="card-header">
              <h4>List Gallery</h4>
            </div>
            <div class="card-body">
              <a href="{{ route('foto.show') }}" class="btn btn-primary mb-3">Tambah Foto Baru</a>
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Gambar</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $no = 1;
                    @endphp
                    @foreach ($result as $d)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $d->judul }}</td>
                        <td><img src="{{ asset('assets/foto/')}}/{{ $d->image_path}}" alt="" width="100px"></td>
                        <td>
                          <button type="button" class="btn btn-danger mr-2">
                            hapus
                          </button>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                <br>
                <br>
                <div class="d-flex justify-content-center">
                  {!! $result->links() !!}
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection