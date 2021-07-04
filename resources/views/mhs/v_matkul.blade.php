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
            <form method="POST" enctype="multipart/form-data" action="/mahasiswa/mata-kuliah/tambah">
                @csrf            

            <div class="col"><label class="labels">Subject</label>
                <select class="form-control @error('id_matkul') is-invalid @enderror" id="subject" name="id_matkul">
                    <option value="" selected disabled hidden>Choose here</option>
                    @foreach($mata_kuliah as $m)
                        <option value="{{ $m->id }}">{{ $m->nama }}</option>
                    @endforeach
                    </select>
                    <div class="invalid-feedback">
                        @error('id_matkul')
                            {{ $message }}
                        @enderror
                    </div>
                    <input class="input @error('id') is-invalid @enderror" hidden name="id" id="id_mhs_matkul" type="text" value="">
                    <div class="invalid-feedback">
                        @error('id')
                            {{ $message }}
                        @enderror
                    </div>
            </div>
            <div class="mt-1 text-center">
                <button class="btn btn-success profile-button" name="add_record" type="submit" type="submit" value="add_record"><i class="fas fa-plus-circle"></i> Tambah</button>
            </div>
            </form>
        </div>
    </div>
    <div class="card mt-2">
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

@section('script')
<script>
$('#subject').on('change',function(){
    var id_matkul = $(this).children('option:selected').val();
    var id_mhs = {{ auth()->user()->mahasiswa_id }};
    var id = id_matkul+'MK'+id_mhs;
    $('#id_mhs_matkul').val(id);
});

</script>
@endsection