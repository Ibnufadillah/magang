@extends('layout.v_template')

@section('title', ' Dosen | Tambah Matkul')

@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 style="font-size: 2.5rem!important;">Mata Kuliah</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb mt-3 float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Mata Kuliah</li>
          </ol>
        </div>
      </div>
    </div>
    @if (session('pesan'))
    <div class="alert alert-success" role="alert">
        {{ session('pesan') }}
    </div>
@endif<!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="card ">
        <div class="card-body">
            <h5 class="text-center my-4">Assign Mata Kuliah</h5>
            <form method="POST" enctype="multipart/form-data" action="/dosen/mata-kuliah/tambah">
                @csrf            

            <div class="col"><label class="labels">Subject</label>
                <select class="form-control @error('id_matkul') is-invalid @enderror" id="subject" name="id_matkul">
                    @if (@empty($mata_kuliah->id))
                    <option value="" selected disabled hidden>Choose here</option>
                    @foreach($mata_kuliah as $m)
                        <option value="{{ $m->id }}">{{ $m->nama }}</option>
                    @endforeach
                    @else
                    <option value="" selected disabled>Tidak ada mata kuliah tersisa</option>
                    @endif
                    </select>
                    <div class="invalid-feedback">
                        @error('id_matkul')
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
                        <th class="text-center">SKS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(auth()->user()->dosen->mata_kuliah as $h)
                    <tr>
                        <td>
                                    {{ $h->nama }}
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

                        <td class="text-center">
                            {{ auth()->user()->dosen->mata_kuliah->sum('sks') }}
                        </td>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
  </section>

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