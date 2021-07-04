@extends('layout.v_template')

@section('title', 'Perkuliahan')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-body">
            <h5 class="text-center my-4">Perkuliahan</h5>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Mtkul</th>
                        <th>SKS</th>
                        <th width="1%">Jumlah SKS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mahasiswa as $a)
                    <tr>
                        <td>{{ $a->nama }}</td>
                        <td>
                            <ul>
                                @foreach($a->mata_kuliah as $h)
                                <li> {{ $h->nama }} </li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <ul>
                                @foreach($a->mata_kuliah as $h)
                                <li> {{ $h->sks }} </li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="text-center">
                            {{ $a->mata_kuliah->sum('sks') }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection