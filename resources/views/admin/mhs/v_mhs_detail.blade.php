@extends('layout.v_template')

@section('title', 'Detail Mahasiswa')


@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 style="font-size: 2.5rem!important;">Detai Mahasiswa</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb mt-3 float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/admin/mhs">Mahasiswa</a></li>
            <li class="breadcrumb-item active">Detail Mahasiswa</li>
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
  <div>
      <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card "  style="height: 100%">
            <div class="card-body" style="padding-top:3rem">
              <div class="d-flex flex-column align-items-center text-center">
                <img src="{{ url('foto_mhs/'.$mhs->img_url) }}" alt="Foto" class="rounded-circle" width="150">
                <div class="mt-3">
                  <h4>{{ $mhs->nama }}</h4>
                  <p class="text-secondary mb-1">{{ $mhs->getMhsID() }}</p>
                  <p class="text-muted font-size-sm"><i class="fas fa-university"></i> {{ $mhs->mata_kuliah->sum('sks') }} SKS</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <ul class="nav nav-pills" id="mytab">
            <li class="nav-item">
              <a href="#biodata" data-toggle="tab" class="nav-link m-l active" aria-expanded="true">Biodata Pribadi</a>
            </li>      
          </ul>
          <div class="tab-content">
            <div class="panel tab-pane wrapper-lg  active" id="biodata">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nama Lengkap</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ $mhs->nama }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Tempat Tanggal Lahir</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ $mhs->tmp_lahir }} , {{ $mhs->tgl_lahir }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Alamat</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ $mhs->alamat }}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-3">
                      <div class="mt-5 text-left">
                        <a class="btn btn-success" href='/admin/mhs/edit/{{ $mhs->id }}'><i class="far fa-edit"></i> Edit</a>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
  </div>
      
    </div>
  </section>
@endsection
