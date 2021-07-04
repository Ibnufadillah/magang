@extends('layout.template')

@section('title', 'Kelas')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-body">
            <h5 class="text-center my-4">Nama Kelas</h5>
            <p>{{ $matkul->nama }}</p>
            <h5 class="text-center my-4">Nama Dosen</h5>
            <p>{{ $matkul->dosen->nama }}</p>
            <h5 class="text-center my-4">Nama Mahasiswa</h5>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($matkul->mahasiswa as $m)
                    <tr>
                        <td>
                                    {{ $m->id}}
                        </td>
                        <td>
                                    {{ $m->nama}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection