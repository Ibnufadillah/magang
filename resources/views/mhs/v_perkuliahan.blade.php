@extends('layout.v_template')

@section('title', 'Perkuliahan')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-body">
            <h5 class="text-center my-4">Daftar Kelas</h5>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Mata Kuliah</th>
                        <th>Dosen Pengampu</th>
                        <th class="text-center">SKS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mahasiswa->mata_kuliah as $h)
                    <tr>
                        <td>
                            <a href="#">{{ $h->nama }} </a>
                        </td>
                        <td>
                            {{ $h->dosen->nama }}
                        </td>
                        <td class="text-center">
                            {{ $h->sks }}
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td>
                            <b>Total SKS</b>
                        </td>
                        <td>
                            
                        </td>
                        <td class="text-center">
                            {{ $h->sum('sks') }}
                        </td>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection