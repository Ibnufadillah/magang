@extends('layout.v_template')

@section('title', 'Tambah Matkul')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-body">
            <h5 class="text-center my-4">Daftar Mata Kuliah</h5>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Kode MK</th>
                        <th>Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mata_kuliah as $m)
                    <tr>
                        <td>
                                    {{ $m->id}}
                        </td>
                        <td>
                                    {{ $m->nama}}
                        </td>
                        <td>
                                    {{ $m->sks}}
                        </td>
                        <td>
                                   Tambah
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card mt-5">
        <div class="card-body">
            <h5 class="text-center my-4">Mata Kuliah yang diambil</h5>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Mata Kuliah</th>
                        <th>Dosen Pengampu</th>
                        <th>SKS</th>
                        <th width="1%">Jumlah SKS</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr>
                        <td>
                            <ul>
                                @foreach($mahasiswa->mata_kuliah as $h)
                                <li> 
                                    {{ $h->nama }}
                                </li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <ul>
                                @foreach($mahasiswa->mata_kuliah as $h)
                                <li> {{ $h->dosen->nama }} </li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <ul>
                                @foreach($mahasiswa->mata_kuliah as $h)
                                <li> {{ $h->sks }} </li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="text-center">
                            {{ $mahasiswa->mata_kuliah->sum('sks') }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection