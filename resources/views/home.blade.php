
@extends('layouts.stisla')

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Top Vote</h1>
  </div>

  <div class="section-body">

    <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
              <h4>Fotografi tingkat mahasiswa</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Tingkatan</th>
                      <th scope="col">Total vote valid</th>
                      <th scope="col">File</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $no = 1;
                    @endphp
                @if(!empty($jml_foto_populer_mahasiswa))
                    @foreach ($foto_populer_mahasiswa as $fm)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $fm->judul }}</td>
                        <td>{{ $fm->tingkatan }}</td>
                        <td>{{ $fm->num_votes }}</td>
                        <td> <a href="/public/assets/foto/{{ $fm->image_path }}" class="btn btn-info mr-2"  target="_BLANK">
                            Lihat foto
                          </a></td>
                      </tr>
                  
                    @endforeach
                @else
                  <tr><th colspan="5" class="text-center">--- Tidak ada data ---</th></tr> 
                @endif
                  </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>
      
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
              <h4>Fotografi tingkat pelajar</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Tingkatan</th>
                      <th scope="col">Total vote valid</th>
                      <th scope="col">File</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $no = 1;
                    @endphp
                @if(!empty($jml_foto_populer_pelajar))
                    @foreach ($foto_populer_pelajar as $fp)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $fp->judul }}</td>
                        <td>{{ $fp->tingkatan }}</td>
                        <td>{{ $fp->num_votes }}</td>
                        <td> <a href="/public/assets/foto/{{ $fp->image_path }}" class="btn btn-info mr-2"  target="_BLANK">
                            Lihat foto
                          </a></td>
                      </tr>
                    @endforeach
                @else
                  <tr><th colspan="5" class="text-center">--- Tidak ada data ---</th></tr> 
                @endif
                  </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>
      
      
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
              <h4>Podcast tingkat mahasiswa</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Tingkatan</th>
                      <th scope="col">Total vote valid</th>
                      <th scope="col">File</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $no = 1;
                    @endphp
                @if(!empty($jml_podcast_populer_mahasiswa))
                    @foreach ($podcast_populer_mahasiswa as $pm)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $pm->judul }}</td>
                        <td>{{ $pm->tingkatan }}</td>
                        <td>{{ $pm->num_votes }}</td>
                        <td> <a href="/public/assets/sound/{{ $pm->sound_path }}" class="btn btn-info mr-2"  target="_BLANK">
                            Dengarkan podcast
                          </a></td>
                      </tr>
                    @endforeach
                @else
                  <tr><th colspan="5" class="text-center">--- Tidak ada data ---</th></tr> 
                @endif
                  </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>
      
      
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
              <h4>Podcast tingkat pelajar</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Tingkatan</th>
                      <th scope="col">Total vote valid</th>
                      <th scope="col">File</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $no = 1;
                    @endphp
                @if(!empty($jml_podcast_populer_pelajar))
                    @foreach ($podcast_populer_pelajar as $pp)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $pp->judul }}</td>
                        <td>{{ $pp->tingkatan }}</td>
                        <td>{{ $pp->num_votes }}</td>
                        <td> <a href="/public/assets/sound/{{ $pp->sound_path }}" class="btn btn-info mr-2"  target="_BLANK">
                            Dengarkan podcast
                          </a></td>
                      </tr>
                    @endforeach
                @else
                  <tr><th colspan="5" class="text-center">--- Tidak ada data ---</th></tr> 
                @endif
                  </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>
      
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
              <h4>Praktikum Kategori Audio Video</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Total vote valid</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $no = 1;
                    @endphp
                @if(!empty($jml_praktikum_populer_audio_video))
                    @foreach ($praktikum_populer_audio_video as $d)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->num_votes }}</td>
                      </tr>
                    @endforeach
                @else
                  <tr><th colspan="5" class="text-center">--- Tidak ada data ---</th></tr> 
                @endif
                  </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>
      
      
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
              <h4>Praktikum Kategori Creative Photo</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Total vote valid</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $no = 1;
                    @endphp
                @if(!empty($jml_praktikum_populer_creative_photo))
                    @foreach ($praktikum_populer_creative_photo as $d)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->num_votes }}</td>
                      </tr>
                    @endforeach
                @else
                  <tr><th colspan="5" class="text-center">--- Tidak ada data ---</th></tr> 
                @endif
                  </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>
      
      
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
              <h4>Praktikum Kategori Foto Komposisi</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Total vote valid</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $no = 1;
                    @endphp
                @if(!empty($jml_praktikum_populer_foto_komposisi))
                    @foreach ($praktikum_populer_foto_komposisi as $d)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->num_votes }}</td>
                      </tr>
                    @endforeach
                @else
                  <tr><th colspan="5" class="text-center">--- Tidak ada data ---</th></tr> 
                @endif
                  </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>
      
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
              <h4>Praktikum Kategori Human Interest</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Total vote valid</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $no = 1;
                    @endphp
                @if(!empty($jml_praktikum_populer_human_interest))
                    @foreach ($praktikum_populer_human_interest as $d)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->num_votes }}</td>
                      </tr>
                    @endforeach
                @else
                  <tr><th colspan="5" class="text-center">--- Tidak ada data ---</th></tr> 
                @endif
                  </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>
      
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
              <h4>Praktikum Kategori Photo Series Photograph</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Total vote valid</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $no = 1;
                    @endphp
                @if(!empty($jml_praktikum_populer_photo_series))
                    @foreach ($praktikum_populer_photo_series as $d)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->num_votes }}</td>
                      </tr>
                    @endforeach
                @else
                  <tr><th colspan="5" class="text-center">--- Tidak ada data ---</th></tr> 
                @endif
                  </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>
      
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
              <h4>Praktikum Kategori Product Photo</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Total vote valid</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $no = 1;
                    @endphp
                @if(!empty($jml_praktikum_populer_product_photo))
                    @foreach ($praktikum_populer_product_photo as $d)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->num_votes }}</td>
                      </tr>
                    @endforeach
                @else
                  <tr><th colspan="5" class="text-center">--- Tidak ada data ---</th></tr> 
                @endif
                  </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>
      
      
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
              <h4>Praktikum Kategori Jurnalisme Pertanian</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Total vote valid</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $no = 1;
                    @endphp
                @if(!empty($jml_praktikum_populer_jurnalisme_pertanian))
                    @foreach ($praktikum_populer_jurnalisme_pertanian as $d)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->num_votes }}</td>
                      </tr>
                    @endforeach
                @else
                  <tr><th colspan="5" class="text-center">--- Tidak ada data ---</th></tr> 
                @endif
                  </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>
      
      
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
              <h4>Praktikum Kategori Manajemen Penerbitan</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Total vote valid</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $no = 1;
                    @endphp
                @if(!empty($jml_praktikum_populer_manajemen_penerbitan))
                    @foreach ($praktikum_populer_manajemen_penerbitan as $d)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->num_votes }}</td>
                      </tr>
                    @endforeach
                @else
                  <tr><th colspan="5" class="text-center">--- Tidak ada data ---</th></tr> 
                @endif
                  </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>
      
      
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
              <h4>Praktikum Kategori Video Siaran</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Total vote valid</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $no = 1;
                    @endphp
                @if(!empty($jml_praktikum_populer_video_siaran))
                    @foreach ($praktikum_populer_video_siaran as $d)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->num_votes }}</td>
                      </tr>
                    @endforeach
                @else
                  <tr><th colspan="5" class="text-center">--- Tidak ada data ---</th></tr> 
                @endif
                  </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>
      
      
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
              <h4>Praktikum Kategori Podcast Agricia</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Total vote valid</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $no = 1;
                    @endphp
                @if(!empty($jml_praktikum_populer_podcast_agricia))
                    @foreach ($praktikum_populer_podcast_agricia as $d)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->num_votes }}</td>
                      </tr>
                    @endforeach
                @else
                  <tr><th colspan="5" class="text-center">--- Tidak ada data ---</th></tr> 
                @endif
                  </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>
      
      
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
              <h4>Praktikum Kategori MTPKP</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Total vote valid</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $no = 1;
                    @endphp
                @if(!empty($jml_praktikum_populer_MTPKP))
                    @foreach ($praktikum_populer_MTPKP as $d)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->num_votes }}</td>
                      </tr>
                    @endforeach
                @else
                  <tr><th colspan="5" class="text-center">--- Tidak ada data ---</th></tr> 
                @endif
                  </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>
      
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
              <h4>Praktikum Kategori Periklanan</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Total vote valid</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $no = 1;
                    @endphp
                @if(!empty($jml_praktikum_populer_periklanan))
                    @foreach ($praktikum_populer_periklanan as $d)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->num_votes }}</td>
                      </tr>
                    @endforeach
                @else
                  <tr><th colspan="5" class="text-center">--- Tidak ada data ---</th></tr> 
                @endif
                  </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>
      
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
              <h4>Praktikum Kategori PKP</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Total vote valid</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $no = 1;
                    @endphp
                @if(!empty($jml_praktikum_populer_PKP))
                    @foreach ($praktikum_populer_PKP as $d)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->num_votes }}</td>
                      </tr>
                    @endforeach
                @else
                  <tr><th colspan="5" class="text-center">--- Tidak ada data ---</th></tr> 
                @endif
                  </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>
      
      
    </div>
  </div>
</section>
@endsection