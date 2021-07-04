@extends('layout.v_template')

@section('title', 'Dosen')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-body">
            <h5 class="text-center my-4">Daftar Dosen</h5>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dosen as $m)
                    <tr>
                        <td>
                                    {{ $m->id}}
                        </td>
                        <td>
                                    {{ $m->nama}}
                        </td>
                        <td>
                                    {{ $m->alamat}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection