@extends('layout.v_template')

@section('title', 'Detail Matkul')


@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 style="font-size: 2.5rem!important;">Detail Mata Kuliah</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb mt-3 float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/admin/matkul">Mata Kuliah</a></li>
            <li class="breadcrumb-item active">Detail Mata Kuliah</li>
          </ol>
        </div>
      </div>
    </div>
    @if (session('pesan'))
    <div class="alert alert-success" role="alert">
        {{ session('pesan') }}
    </div>
@endif<!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
          
    <div class="card p-4">
  <div class="card mt-5">
      <div class="card-body">
          <h5 class="text-center my-4">Detail Mata Kuliah</h5>
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
</section>

@endsection
