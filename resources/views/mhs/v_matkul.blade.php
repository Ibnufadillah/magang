@extends('layout.v_template')

@section('title', 'Tambah Matkul')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-body">
            <h5 class="text-center my-4">Tambah Mata Kuliah</h5>
            @if (session('pesan'))
            <div class="alert alert-success" role="alert">
                {{ session('pesan') }}
            </div>
            @endif
            @if (session('alert'))
            <div class="alert alert-danger" role="alert">
                {{ session('alert') }}
            </div>
            @endif
        
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
                    <?php $flag = 1; ?>
                    @foreach ($m->mahasiswa as $mm)
                        @if ($mm->id != auth()->user()->level)
                        <?php $flag = 0; ?>
                        @break
                        @endif

                    @endforeach

                    @if ($flag == 1)
                        
                        
                    <form method="POST" enctype="multipart/form-data" action="/mahasiswa/mata-kuliah/tambah">
                        @csrf            
        
                    <tr>
                        <td>
                            <input type="text" class="form-control @error('id') is-invalid @enderror"  value="{{ $m->id }}" name="id"readonly>
                            <div class="invalid-feedback">
                                @error('id')
                                    {{ $message }}
                                @enderror
                            </div>
                        </td>
                        <td>
                            {{ $m->nama }}
                        </td>
                        <td>
                                    {{ $m->sks}}
                        </td>
                        <td>
                                <button class="btn btn-success profile-button" name="add_record" type="submit" type="submit" value="add_record"><i class="fas fa-plus-circle"></i> Tambah</button>
                                        </td>
                    </tr>
                </form>
                @endif

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
                        <th class="text-center">SKS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mahasiswa->mata_kuliah as $h)
                    <tr>
                        <td>
                                    {{ $h->nama }}
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
                            {{ $mahasiswa->mata_kuliah->sum('sks') }}
                        </td>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection