@extends('layout.v_template')

@section('title', 'Add Mahasiswa')


@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 style="font-size: 2.5rem!important;">Add Mahasiswa</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb mt-3 float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/admin/mhs">Mahasiswa</a></li>
            <li class="breadcrumb-item active">Add</li>
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
            <form method="POST" enctype="multipart/form-data" action="/admin/mhs/insert">
        @csrf
        <div class="row">
            
            <div class="col-md-5 border-right form-group">
                <div class="p-3 pt-5 pb-2">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <label class="labels">Nama</label><input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama" value="{{ old('name') }}" name="name">
                            <div class="invalid-feedback">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">Tempat Lahir</label><input type="text" class="form-control @error('birthplace') is-invalid @enderror" value="{{ old('birthplace') }}" placeholder="" name="birthplace">
                            <div class="invalid-feedback">
                                @error('birthplace')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6"><label class="labels">Tanggal Lahir</label><input type="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date') }}" name="date">
                            <div class="invalid-feedback">
                                @error('date')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Address</label><textarea class="form-control @error('address') is-invalid @enderror" rows="3" placeholder="Alamat" name="address">{{ old('address') }}</textarea>
                            <div class="invalid-feedback">
                                @error('address')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">
                    <div class="form-group">
						<b>File Gambar</b><br/>
						<input type="file" class="form-control" name="foto_mhs">
                        <div class="text-danger">
                            @error('foto_mhs')
                                {{ $message }}
                            @enderror
                        </div>
					</div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-success profile-button" name="add_record" type="submit" type="submit" value="add_record"><i class="fas fa-plus-circle"></i> Tambah</button>
                    </div>
    
                </div>
    
            </div>
        </div>
    </form>
</div>
<!-- /.card -->
</section>
</div>
<div class="form-group d-flex align-items-center justify-content-between mb-4 ml-4">
<a class="btn btn-primary" href="/admin/mhs/add"><i class="fas fa-user-plus"></i> Tambah Data</a>
                  </div>
@endsection