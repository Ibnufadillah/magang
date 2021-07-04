@extends('layout.v_template')

@section('title', 'Add Mahasiswa')


@section('content')
<div class="container-fluid">

    <h1 class="my-4">Add @yield('mode')</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/">Admin</a></li>
        <li class="breadcrumb-item active">@yield('title')s</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sequi ut id, numquam sint eum placeat a beatae iusto in quod nam nostrum dolores dolore saepe exercitationem adipisci dicta, quasi aspernatur?</a>
            
        </div>
    </div>
    <form method="POST" enctype="multipart/form-data" action="/admin/mhs/insert">
        @csrf
        <div class="row">
            
            <div class="col-md-5 border-right form-group">
                <div class="p-3 pt-5 pb-2">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile</h4>
                    </div>
                    <div class="row mt-2">
                        {{-- <div class="col-md-12"><label class="labels">ID</label><input type="text" class="form-control @error('id') is-invalid @enderror" placeholder="ID Number" value="{{ old('id') }}" name="id"  maxlength="10" >
                            <div class="invalid-feedback">
                                @error('id')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div> --}}
                        <div class="col-md-12">
                            <label class="labels">Nama</label><input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama" value="{{ old('name') }}" name="name">
                            <div class="invalid-feedback">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">Tempat Lahir</label><input type="text" class="form-control @error('birthplace') is-invalid @enderror" value="{{ old('birthplace') }}" placeholder="" name="birthplace">
                            <div class="invalid-feedback">
                                @error('birthplace')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6"><label class="labels">Tanggal Lahir</label><input type="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date') }}" name="date">
                            <div class="invalid-feedback">
                                @error('date')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Address</label><textarea class="form-control @error('address') is-invalid @enderror" rows="3" placeholder="Alamat" name="address">{{ old('address') }}</textarea>
                            <div class="invalid-feedback">
                                @error('address')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">
                    {{-- <div class="d-flex justify-content-between align-items-center experience"><span>Akademik</span></div><br>
                    <div class="col-md-12"><label class="labels">Subject</label>
                        <select class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject">
                            <option value="" selected disabled hidden>Choose here</option>
                                <option>History of Magic</option>
                                <option>Charms</option>
                                <option>Potions</option>
                                <option>Transfiguration</option>
                                <option>Divination</option>
                                <option>Care of Magical Creatures</option>
                                <option>Defense against the Dark Arts</option>
                                <option>Herbology</option>
                            </select>
                            <div class="invalid-feedback">
                                @error('subject')
                                    {{ $message }}
                                @enderror
                            </div>
                    </div> <br> --}}
                    <div class="mt-5 text-center">
                        <button class="btn btn-success profile-button" name="add_record" type="submit" type="submit" value="add_record"><i class="fas fa-plus-circle"></i> Tambah</button>
                    </div>
    
                </div>
    
            </div>
        </div>
    </form>
</div>
@endsection