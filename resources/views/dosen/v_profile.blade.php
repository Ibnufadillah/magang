@extends('layout.v_template')

@section('title', 'Profile Dosen')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-body">
            <h5 class="text-center my-4">Profile</h5>
            <img src="{{ url('foto_dosen/'.$dosen->img_url) }}" alt="" srcset="" width="300px">
            <h5>Nama</h5>
            <p>{{ $dosen->nama }}</p>
            <h5>Alamat</h5>
            <p>{{ $dosen->alamat }}</p>
            <h5>Mata kuliah:</h5>
            @foreach ($dosen->mata_kuliah as $m)
                <p>{{ $m->nama }}</p>
            @endforeach
        </div>
        <div class="col-sm-3">
            <div class="mt-5 text-left">
                <a class="btn btn-success" href='/dosen/profile/edit'><i class="far fa-edit"></i> Edit</a>
            </div>
          </div>
    </div>
    
</div>

@endsection