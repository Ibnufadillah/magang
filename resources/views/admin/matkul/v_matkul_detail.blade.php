@extends('layout.v_template')

@section('title', 'Detail Matkul')


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
          <h5>Mata Kuliah</h5>
          <p>{{ $matkul->nama }}</p>
          <h5>SKS</h5>
          <p>{{ $matkul->sks }}</p>
          <h5>Dosen Pengampu:</h5>
            @if (!empty($matkul->dosen))
                <p>{{ $matkul->dosen->nama }}</p>
            @else
                <p>-</p>
            @endif
      </div>
  </div>
  <div class="col-sm-3">
    <div class="mt-5 text-left">
        <a class="btn btn-success" href='/admin/matkul/edit/{{ $matkul->id }}'><i class="far fa-edit"></i> Edit</a>
    </div>
  </div>
</div>
@endsection
