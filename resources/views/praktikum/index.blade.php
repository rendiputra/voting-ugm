
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
            <div class="card-header">
              <h4>List Praktikum</h4>
            </div>
            <div class="card-body">
              <a href="{{ route('praktikum.show') }}" class="btn btn-primary mb-3">Tambah praktikum Baru</a>
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">ID Praktikum</th>
                      <th scope="col">Nama Mahasiswa</th>
                      <th scope="col">Data</th>
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
                        <td>{{ $d->id_kategori_praktikum."/"."$d->id_kategori_sub_praktikum" }}</td>
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->data }}</td>
                        <td>
                          {{-- <a href="/praktikum/edit/{{ $d->id }}" class="btn btn-primary mr-2">
                            Update
                          </a>
                          <a href="/praktikum/hapus/{{ $d->id }}" class="btn btn-danger mr-2" onclick="return confirm('Apakah yakin untuk menghapus praktikum ini?');">
                            Delete
                          </a> --}}
                          <form id="delete{{ $no }}" action="{{ route('praktikum.delete', $d->id) }}" method="POST" >
                            @csrf
                            <input type="submit" class="btn btn-danger mr-2" value="Delete"  onclick="return confirm('Apakah yakin untuk menghapus praktikum ini?');"> 
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