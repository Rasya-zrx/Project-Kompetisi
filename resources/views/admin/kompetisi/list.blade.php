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
                        <button type="button" class="btn mb-1 btn-rounded btn-primary" data-toggle="modal"
                            data-original-title="create" data-target="#modalcreate">+ TAMBAH DATA</button>

                        <!-- Modal Create -->
                        <div class="bootstrap-modal">
                            <div class="modal fade" id="modalcreate">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Tambah Data</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card-body pt-5">
                                                <form class="mt-5 mb-5" action="/kompetisi/store" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text" class="form-control" name="nama_kompetisi"
                                                            placeholder="Nama Kompetisi" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Deskripsi</label>
                                                        <input type="text" class="form-control" name="deskripsi"
                                                            placeholder="Deskripsi" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tanggal Kompetisi</label>
                                                        <input type="date" class="form-control" name="tgl_kompetisi"
                                                            placeholder="Tanggal Kompetisi" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tanggal Buka Registrasi</label>
                                                        <input type="date" class="form-control" name="tgl_buka_regist"
                                                            placeholder="Tanggal Buka Registrasi" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tanggal Tutup Registrasi</label>
                                                        <input type="date" class="form-control" name="tgl_tutup_regist"
                                                            placeholder="Tanggal Tutup Registrasi" required>
                                                    </div>
                                        </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-outline-primary">Save Changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Table Data -->
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="text-center">
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Deskripsi</th>
                                        <th>Tanggal Kompetisi</th>
                                        <th>Tgl Buka Registrasi</th>
                                        <th>Tgl Tutup Registrasi</th>
                                        <th>Gambar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kompetisi as $kompe)
                                        <tr class="text-center">
                                            <th>{{ $kompe->id }}</th>
                                            <td>{{ $kompe->nama_kompetisi }}</td>
                                            <td>{{ $kompe->deskripsi }}</td>
                                            <td>{{ $kompe->tgl_kompetisi }}</td>
                                            <td>{{ $kompe->tgl_buka_regist }}</td>
                                            <td>{{ $kompe->tgl_tutup_regist }}</td>
                                            <td>{{ $kompe->gambar }}</td>
                                            <td>
                                                <!-- Edit Button -->
                                                <a href="#modaledit{{ $kompe->id }}" class="fa fa-pencil color-muted m-r-5"
                                                    data-toggle="modal" data-original-title="Edit"></a>

                                                <!-- Modal Edit -->
                                                <div class="modal fade" id="modaledit{{ $kompe->id }}">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Kompetisi</h5>
                                                                <button type="button" class="close" data-dismiss="modal">
                                                                    <span>&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="card-body pt-5">
                                                                    <form class="mt-5 mb-5"
                                                                        action="/kompetisi/update/{{ $kompe->id }}" method="post">
                                                                        @csrf
                                                                        <div class="form-group">
                                                                            <label>Nama</label>
                                                                            <input type="text" class="form-control"
                                                                                name="nama_kompetisi" value="{{ $kompe->nama_kompetisi }}"
                                                                                required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Deskripsi</label>
                                                                            <input type="text" class="form-control"
                                                                                name="deskripsi" value="{{ $kompe->deskripsi }}" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Tanggal Kompetisi</label>
                                                                            <input type="date" class="form-control"
                                                                                name="tgl_kompetisi" value="{{ $kompe->tgl_kompetisi }}" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Tanggal Buka Registrasi</label>
                                                                            <input type="date" class="form-control"
                                                                                name="tgl_buka_regist" value="{{ $kompe->tgl_buka_regist }}" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Tanggal Tutup Registrasi</label>
                                                                            <input type="date" class="form-control"
                                                                                name="tgl_tutup_regist" value="{{ $kompe->tgl_tutup_regist }}" required>
                                                                        </div>
                                                            </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-outline-primary">Save Changes</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Delete Button -->
                                                <a href="#modaldelete{{ $kompe->id }}" class="fa fa-trash color-muted m-r-5"
                                                    data-toggle="modal" data-original-title="Delete"></a>

                                                <!-- Modal Delete -->
                                                <div class="modal fade" id="modaldelete{{ $kompe->id }}">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Delete Kompetisi?</h5>
                                                                <button type="button" class="close" data-dismiss="modal">
                                                                    <span>&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="/kompetisi/destroy/{{ $kompe->id }}" method="GET">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    Are you sure you want to delete this competition?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Delete</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-end">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
