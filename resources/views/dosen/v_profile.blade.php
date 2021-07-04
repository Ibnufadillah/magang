@extends('layout.v_template')

@section('title', 'Profile Dosen')

@section('content')
<div class="container">
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
</div>

@endsection