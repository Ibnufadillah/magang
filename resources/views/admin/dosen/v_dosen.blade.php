@extends('layout.v_template')

@section('title', 'Dosen')

@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 style="font-size: 2.5rem!important;">Dosen</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb mt-3 float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Dosen</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
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
          <h3 class="card-title">Table Dosen</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Matkul</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dosen as $m)
                    <tr>
                        <td>
                                    {{ $m->getDosenID()}}
                        </td>
                        <td>
                                    {{ $m->nama}}
                        </td>
                        <td>
                                    {{ $m->alamat}}
                        </td>
                        <td>
                          <ul style="padding-left:1em;">
                                @foreach ($m->mata_kuliah as $m)
                                    <li>{{ $m->nama }}</li>
                                    @endforeach
                                </ul>
                            </td>
                        <td>
                            <a class="btn btn-info" href='/admin/dosen/detail/{{ $m->id }}'><i class="far fa-edit"></i> Detail</a>
                            <a class="btn btn-secondary" href='/admin/dosen/edit/{{ $m->id }}'><i class="far fa-edit"></i> Edit</a>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $m->id }}">
                                <i class="fas fa-trash-alt"></i> Hapus
                            </button>
                        </td>
                    </tr>
                    @endforeach                    
            </tbody>
            <tfoot>
                <tr>
                  <th>NIP</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Matkul</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
              
            </div>
            <!-- /.card-body -->
            <div class="form-group d-flex align-items-center justify-content-between mb-4 ml-4">
              <a class="btn btn-primary" href="/admin/dosen/add"><i class="fas fa-user-plus"></i> Tambah Data</a>
          </div>
  
          </div>
          <!-- /.card -->
</section>

            
        </div>
        <div class="form-group d-flex align-items-center justify-content-between mb-4 ml-4">
            <a class="btn btn-primary" href="/admin/dosen/add"><i class="fas fa-user-plus"></i> Tambah Data</a>
                                            </div>
    
    </div>
</div>
@foreach ($dosen as $data)
<div class="modal fade" id="delete{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="confirmModalLabel">Delete confirmation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure want to delete {{ $data->name }} ??
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          <a href="/admin/dosen/delete/{{ $data->id }}" class="btn btn-danger">Yes</a>
        </div>
      </div>
    </div>
</div>
    
@endforeach
@endsection