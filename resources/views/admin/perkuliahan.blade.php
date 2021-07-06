@extends('layout.v_template')

@section('title', 'Perkuliahan')

@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 style="font-size: 2.5rem!important;">Perkuliahan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb mt-3 float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Perkuliahan</li>
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
    
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Table Perkuliahan</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
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
                <tfoot>
                    <tr>
                        <th>Nama</th>
                        <th>Mtkul</th>
                        <th>SKS</th>
                        <th width="1%">Jumlah SKS</th>
                    </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->      
              </div>
              <!-- /.card -->
</div>
    <!-- /.card -->
</section>

 

@endsection