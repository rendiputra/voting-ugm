
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
            <div class="card-header">
              <h4>List Podcast</h4>
            </div>
            <div class="card-body">
              <a href="{{ route('podcast.show') }}" class="btn btn-primary mb-3">Tambah Podcast Baru</a>
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Tingkatan</th>
                      <th scope="col">Sound</th>
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
                        <td>{{ $d->tingkatan }}</td>
                        <td> <a href="/public/assets/sound/{{ $d->sound_path }}" class="btn btn-info mr-2"  target="_BLANK">
                            Dengarkan Podcast
                          </a></td>
                        <td>
                          <a href="/admin/podcast/edit/{{ $d->id_podcast }}" class="btn btn-info mr-2">
                            Update
                          </a>
                          {{-- <a href="/podcast/hapus/{{ $d->id_podcast }}" class="btn btn-info mr-2" onclick="return confirm('Apakah yakin untuk menghapus podcast ini?');">
                            Delete
                          </a> --}}
                          <form id="delete{{ $no }}" action="{{ route('podcast.delete', $d->id_podcast) }}" method="POST" >
                            @csrf
                            <input type="submit" class="btn btn-danger mr-2" value="Delete"  onclick="return confirm('Apakah yakin untuk menghapus podcast ini?');"> 
                          </form>
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
        </div>
      </div>
    </div>
  </div>
</section>
@endsection