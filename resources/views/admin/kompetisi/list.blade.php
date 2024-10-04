@extends('layouts.app')
@section('content')
    <div class="container-fluid ml-6">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card">
                        <div class="card-title">
                            <h4>{{ $title }}</h4>
                        </div>
                        <button href="#modalcreate" type="button" class="btn btn-primary" data-toggle="modal">+
                          TAMBAH DATA</button>

                          {{-- @foreach ($kompetisi as $a)
                            
                          
                          <div class="modal fade" id="modalcreate" tabindex="-1" role="dialog" aria-labelledby="modalcreateLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalcreateLabel">Tambah Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="/kompetisi/store/">
                                            @csrf
                                            <div class="form-group">
                                                <label for="nama_barang">Nama Barang</label>
                                                <input type="text" class="form-control" name="nama_barang" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="foto">Foto</label>
                                                <input type="file" class="form-control" name="foto" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="id_jenis">Jenis Barang</label>
                                                <select class="form-control" name="id_jenis" required>
                                                    <option value="" hidden>-- Nama Jenis Barang --</option>
                                                    @foreach ($kompetisi as $b)
                                                        <option value="{{ $b->id }}">{{ $b->nama_kompetisi }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="harga">Harga</label>
                                                <input type="number" class="form-control" name="harga" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="stok">Stok</label>
                                                <input type="number" class="form-control" name="stok" required>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-undo"></i> Cancel</button>
                                        <button type="submit" class="btn btn-primary"><i class="fa-save"></i> Save Changes</button>
                                    </div>
                                        </form>
                                </div>
                            </div>
                        </div>
                        @endforeach --}}
                        




                          {{-- <div class="modal fade" id="modalcreate">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title">Tambah Data</h1>
                                        <button type="button" class="btn-close" data-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="/kompetisi/store/">
                                            @csrf
                                            <div class="form-group mb-2">
                                                <label>Nama Barang</label>
                                                <input type="text" class="form-control" name="nama_barang"required>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="foto">Foto</label>
                                                <input type="file" class="form-control" name="foto"required>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label>Jenis Barang</label>
                                                <select class="form-control" name="id_jenis">
                                                    <option value="" hidden>-- Nama Jenis Barang --</option>
                                                    @foreach ($kompetisi as $b)
                                                        <option value="{{ $b->id }}">{{ $b->nama_kompetisi }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label>Harga</label>
                                                <input type="number" class="form-control" name="harga"required>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label>Stok</label>
                                                <input type="number" class="form-control" name="stok"required>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                                                class="fas fa-undo"></i></button>
                                        <button type="submit" class="btn btn-primary" class="fas fa-save">Save Changes</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div> --}}
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="text-center">
                                        <th>ID</th>
                                        <th>Nama Kompetisi</th>
                                        <th>deskripsi</th>
                                        <th>tgl kompetisi</th>
                                        <th>Tgl Buka Regist</th>
                                        <th>Tgl Tutup Regist</th>
                                        <th>Gambar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kompetisi as $kompetisi)
                                        <tr class="text-center">
                                            <th>{{ $kompetisi->id }}</th>
                                            <td>{{ $kompetisi->nama_kompetisi }}</td>
                                            <td>{{ $kompetisi->deskripsi }}</td>
                                            <td>{{ $kompetisi->tgl_kompetiisi }}</td>
                                            <td>{{ $kompetisi->tgl_buka_regist}}</td>
                                            <td>{{ $kompetisi->tgl_tutup_regist }}</td>
                                            <td><img src="{{ asset('storage/kompetisi/' . $kompetisi->gambar) }}"
                                                    alt="image" height="50" width="50"></td>
                                            <td>
                                                <span>

                                                    <div class="bootstrap-modal">
                                                        <a href="#modaledit{{ $kompetisi->id }}"
                                                            class="fa fa-pencil color-muted m-r-5" data-toggle="modal"
                                                            data-original-title="Edit"></a>

                                                        @foreach ($kompetisi as $d)
                                                            <div class="modal fade" id="modaledit{{ $kompetisi->id }}">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Modal title</h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal"><span>&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">edit it???</div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">Close</button>
                                                                            <button type="button"
                                                                                class="btn btn-primary">Save
                                                                                changes</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach

                                                        <a href="#modaldelete{{ $kompetisi->id }}"
                                                            class="fa  fa-trash color-muted m-r-5" data-toggle="modal"
                                                            data-original-title="Delete"></a>

                                                        @foreach ($kompetisi as $c)
                                                            <div class="bootstrap-modal">
                                                                <div class="modal fade" id="modaldelete{{ $kompetisi->id }}">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title">Delete it?</h5>
                                                                                <button type="button" class="close"
                                                                                    data-dismiss="modal"><span>&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <form method="GET" action="/kompetisi/destroy/{{ $c->id }}">
                                                                                    @csrf
                                                                                <div class="modal-body"> are you sure want to delete it??</div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                    <button type="submit"class="btn btn-primary">Delete</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        @endforeach
                                                    </div>
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-end">
                                <li class="page-item"> <a class="page-link" href="#">&laquo;</a> </li>
                                <li class="page-item"> <a class="page-link" href="#">1</a> </li>
                                <li class="page-item"> <a class="page-link" href="#">2</a> </li>
                                <li class="page-item"> <a class="page-link" href="#">3</a> </li>
                                <li class="page-item"> <a class="page-link" href="#">&raquo;</a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection






























{{-- @extends('layouts.app')
@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data {{ $title }}</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">KOMPETISI GACOR</li>
            </ol>
            <div class="row">
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data {{ $title }}
                </div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalcreate">+ TAMBAH DATA</button>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kompetisi</th>
                                <th>Action</th>
                            </tr>
                        </thead>          
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                          @foreach ( $kompetisi as $row )
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $row->nama_kompetisi }}</td>
                                <td>
                                    <a href=#modaledit {{ $row->id }} data-bs-toggle="modal" class="btn btn-primary"><i class="fas fa-edit"></i>Edit</a>
                                    <a href=#modaldelete {{ $row->id }} data-bs-toggle="modal" class="btn btn-danger"><i class="fas fa-trash"></i>Delete</a>
                                </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>
<div class="modal fade" id="modalcreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Tambah Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" action="/kompetisi/store/">
        @csrf
        <div class="form-group">
          <label>Nama Jenis</label>
          <input type="text" class="form-control" name="nama_kompetisi"required>  
        </div>              
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-undo"></i></button>
        <button type="submit" class="btn btn-primary" class="fas fa-save">Save Changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

@foreach ( $kompetisi as $d )
<div class="modal fade" id="modaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Edit {{ $title }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="/kompetisi/update/{{ $d->id }}">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Jenis</label>
            <input type="text" value="{{ $d->nama_kompetisi }}" class="form-control" name="nama_kompetisi"required>  
          </div>                
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-undo">Close</i></button>
          <button type="submit" class="btn btn-primary" class="fas fa-save">Save Changes</button>
        </div>
    </form>
    </div>
  </div>
</div>
@endforeach

@foreach ( $kompetisi as $c )
<div class="modal fade" id="modaldelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Hapus {{ $title }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="GET" action="/kompetisi/destroy/{{ $c->id }}">
        @csrf
      <div class="form-group">
        <h5>Apakah anda yakin ingin menghapus data ini?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-undo">Close</i></button>
        <button type="submit" class="btn btn-danger" class="fas fa-trash">Delete</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endforeach
@endsection --}}