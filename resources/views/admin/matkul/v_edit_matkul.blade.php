@extends('layout.v_template')

@section('title', 'Edit Matkul')


@section('content')
<div class="container-fluid">

    <h1 class="my-4">Edit @yield('mode')</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/">Admin</a></li>
        <li class="breadcrumb-item active">@yield('title')s</li>
    </ol>
    @if (session('pesan'))
        <div class="alert alert-success" role="alert">
            {{ session('pesan') }}
        </div>
    @endif
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
                            <label class="labels">Dosen</label>
                            @if(!empty($matkul->dosen->nama))
                            <input type="text" class="form-control @error('dosen') is-invalid @enderror" placeholder="Dosen Pengampu" value="{{ $matkul->dosen->nama }}" name="dosen">
                            @else
                            <input type="text" class="form-control @error('dosen') is-invalid @enderror" placeholder="Dosen Pengampu" value="-" name="dosen">
                            @endif
                            <div class="invalid-feedback">
                                @error('dosen')
                                    {{ $message }}
                                @enderror
                            </div>
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

@endsection
