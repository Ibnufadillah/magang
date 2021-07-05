@extends('layout.v_template')

@section('title', 'Matkul')

@section('content')

<div class="container">
    @if (session('pesan'))
    <div class="alert alert-success" role="alert">
        {{ session('pesan') }}
    </div>
@endif
    <div class="card mt-5">
        <div class="card-body">
            <h5 class="text-center my-4">Daftar Matkul</h5>
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
                    @foreach($matkul as $m)
                    <tr>
                        <td>
                                    {{ $m->getMatkulID()}}
                        </td>
                        <td>
                                    {{ $m->nama}}
                        </td>
                        <td>
                                    {{ $m->sks}}
                        </td>
                        <td>
                            <a class="btn btn-info" href='/admin/matkul/detail/{{ $m->id }}'><i class="far fa-edit"></i> Detail</a>
                            <a class="btn btn-secondary" href='/admin/matkul/edit/{{ $m->id }}'><i class="far fa-edit"></i> Edit</a>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $m->id }}">
                                <i class="fas fa-trash-alt"></i> Hapus
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
        <div class="form-group d-flex align-items-center justify-content-between mb-4 ml-4">
            <a class="btn btn-primary" href="/admin/matkul/add"><i class="fas fa-user-plus"></i> Tambah Data</a>
                                            </div>
    
    </div>
</div>
@foreach ($matkul as $data)
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
          <a href="/admin/matkul/delete/{{ $data->id }}" class="btn btn-danger">Yes</a>
        </div>
      </div>
    </div>
</div>
    
@endforeach
@endsection