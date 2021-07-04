@extends('layout.v_template')

@section('title', 'Detail Dosen')


@section('content')
<div class="container">
    @if (session('pesan'))
    <div class="alert alert-success" role="alert">
        {{ session('pesan') }}
    </div>
    @endif
  <div class="card mt-5">
      <div class="card-body">
          <h5 class="text-center my-4">Profile</h5>
          <h5>Nama</h5>
          <p>{{ $dosen->nama }}</p>
          <h5>Alamat</h5>
          <p>{{ $dosen->alamat }}</p>
          <h5>Mata kuliah:</h5>
          @foreach ($dosen->mata_kuliah as $m)
              <p>{{ $m->nama }}</p>
          @endforeach
      </div>
  </div>
  <div class="col-sm-3">
    <div class="mt-5 text-left">
        <a class="btn btn-success" href='/admin/dosen/edit/{{ $dosen->id }}'><i class="far fa-edit"></i> Edit</a>
    </div>
  </div>
</div>
@endsection
