@extends('layout.v_template')

@section('title', 'Add Matkul')


@section('content')
<div class="container-fluid">

    <h1 class="my-4">Add @yield('mode')</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/">Admin</a></li>
        <li class="breadcrumb-item active">@yield('title')s</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sequi ut id, numquam sint eum placeat a beatae iusto in quod nam nostrum dolores dolore saepe exercitationem adipisci dicta, quasi aspernatur?</a>
            
        </div>
    </div>
    <form method="POST" enctype="multipart/form-data" action="/admin/matkul/insert">
        @csrf
        <div class="row">
            
            <div class="col-md-5 border-right form-group">
                <div class="p-3 pt-5 pb-2">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Detail Mata Kuliah</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <label class="labels">Mata Kuliah</label><input type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama" value="{{ old('nama') }}" name="nama">
                            <div class="invalid-feedback">
                                @error('nama')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">SKS</label><input type="text" class="form-control @error('sks') is-invalid @enderror" value="{{ old('sks') }}" placeholder="SKS" name="sks">
                            <div class="invalid-feedback">
                                @error('sks')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col"><label class="labels">Dosen Pengampu</label>
                        <select class="form-control @error('id_dosen') is-invalid @enderror" id="subject" name="id_dosen">
                            <option value="" selected disabled hidden>Choose here</option>
                            @foreach($dosen as $m)
                                <option value="{{ $m->id }}">{{ $m->nama }}</option>
                            @endforeach
                                 <option value="">-------</option>
                            </select>
                            <div class="invalid-feedback">
                                @error('id_dosen')
                                    {{ $message }}
                                @enderror
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">
                    <div class="mt-5 text-center">
                        <button class="btn btn-success profile-button" name="add_record" type="submit" type="submit" value="add_record"><i class="fas fa-plus-circle"></i> Tambah</button>
                    </div>
    
                </div>
    
            </div>
        </div>
    </form>
</div>
@endsection