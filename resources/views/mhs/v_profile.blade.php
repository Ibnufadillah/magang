@extends('layout.v_template')

@section('title', 'Profile')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-body">
            <h5 class="text-center my-4">Profile</h5>
            <img src="{{ url('foto_mhs/'.$mahasiswa->img_url) }}" alt="" srcset="" width="300px">
            <h5>Nama</h5>
            <p>{{ $mahasiswa->nama }}</p>
            <h5>Alamat</h5>
            <p>{{ $mahasiswa->alamat }}</p>
            <h5>SKS yang diambil</h5>
            {{ $mahasiswa->mata_kuliah->sum('sks') }}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="mt-5 text-left">
            <a class="btn btn-success" href='/mahasiswa/profile/edit'><i class="far fa-edit"></i> Edit</a>
        </div>
      </div>
</div>

@endsection