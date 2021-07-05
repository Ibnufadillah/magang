@extends('layout.v_template')

@section('title', 'Edit Matkul')


@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 style="font-size: 2.5rem!important;">Edit Mata Kuliah</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb mt-3 float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/admin/matkul">Mata Kuliah</a></li>
            <li class="breadcrumb-item"><a href="/admin/matkul/detail/{{ $matkul->id }}">Detail</a></li>
            <li class="breadcrumb-item active">Edit</li>
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
    <form method="POST" enctype="multipart/form-data" action="/admin/matkul/update/{{ $matkul->id }}">
        @csrf
        <div class="row">
            <div class="col-md-5 border-right form-group">
                <div class="p-3 pb-2">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Detail Mata kuliah</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12"><label class="labels">ID</label><input type="text" class="form-control @error('id') is-invalid @enderror" placeholder="ID Number" value="{{ $matkul->id }}" name="id"  maxlength="10" readonly>
                            <div class="invalid-feedback">
                                @error('id')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Mata Kuliah</label><input type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama" value="{{ $matkul->nama }}" name="nama">
                            <div class="invalid-feedback">
                                @error('nama')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="labels">SKS</label><input type="text" class="form-control @error('sks') is-invalid @enderror" placeholder="SKS" value="{{ $matkul->sks }}" name="sks">
                            <div class="invalid-feedback">
                                @error('sks')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col"><label class="labels">Dosen Pengampu</label>
                                <select class="form-control @error('id_dosen') is-invalid @enderror" id="subject" name="id_dosen">
                                    @if(!empty($matkul->dosen->nama))
                                    <option value="{{ $matkul->dosen->id }}" selected disabled hidden>{{ $matkul->dosen->nama }}</option>
                                    @else
                                    <option value="" selected disabled hidden>Choose here</option>
                                    @endif
                                    @foreach($dosen as $m)
                                        <option value="{{ $m->id }}">{{ $m->nama }}</option>
                                    @endforeach
                                         <option value="">--- Kosong ---</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        @error('id_dosen')
                                            {{ $message }}
                                        @enderror
                                    </div>
                            </div>
                            {{-- <label class="labels">Dosen</label>
                            @if(!empty($matkul->dosen->nama))
                            <input type="text" class="form-control @error('dosen') is-invalid @enderror" placeholder="Dosen Pengampu" value="{{ $matkul->dosen->nama }}" name="dosen">
                            @else
                            <input type="text" class="form-control @error('dosen') is-invalid @enderror" placeholder="Dosen Pengampu" value="-" name="dosen">
                            @endif
                            <div class="invalid-feedback">
                                @error('dosen')
                                    {{ $message }}
                                @enderror
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">
                    
                    <div class="mt-5 text-center">
                        <button class="btn btn-success profile-button" name="save_record" type="submit" value="save_record"><i class="far fa-edit"></i> Ubah</button>
                    </div>
    
                </div>
    
            </div>
        </div>
    </form>    
</div>
</section>

@endsection
