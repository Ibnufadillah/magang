@extends('layout.v_template')

@section('title', 'Perkuliahan')

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
        @if (session('pesan'))
        <div class="alert alert-success" role="alert">
            {{ session('pesan') }}
        </div>
    @endif
    
    <div class="card p-4">
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
    <!-- /.card -->
</section>

 

@endsection