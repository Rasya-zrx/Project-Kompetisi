@extends('layouts.app')

@section('content')
    <div class="container-fluid ml-6">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title mt-3 ml-3">
                        <h4>{{ $title }}</h4>
                    </div>
                    
                    @if (Auth::user()->role == 'admin')
                    <!-- Button to trigger modal -->
                    <button type="button" class="btn mb-1 ml-3 mr-3 btn-rounded btn-primary" data-toggle="modal" data-target="#modalcreate">
                        + TAMBAH DATA
                    </button>

                    <!-- Modal Create -->        
                    <div class="modal fade" id="modalcreate">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Data</h5>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card-body pt-5">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <h3 class="text-center">Tambah Data</h3>
                                        @if (Session::get('error'))
                                <div class="alert alert-danger">
                                    {{ Session::get('error') }}
                                </div>  
                            @endif
                                        <form class="mt-5 mb-5" action="/juara/store" method="post">
                                            @csrf
                                            <input type="hidden" name="kompetisi_id" value="{{ $kompetisi->id }}">
                                            <div class="form-group">
                                                <label>Regist</label>
                                                <select class="form-control" name="registrasi_id" required>
                                                    <option value="">-- pilih id regist --</option>
                                                    @foreach ($registrasi as $regist)
                                                    <option value="{{ $regist->id }}">{{ $regist->id }}</option>
                                                    @endforeach
                                            </div>
                                            <div class="form-group">
                                                <label>peringkat</label>
                                                <input type="text" class="form-control" name="keterangan_peringkat" placeholder="keterangan peringkat" required>
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
                    </div>
                    @endif

                    <div>
                        <a class="btn mb-1 ml-3 mr-3 btn-rounded btn-secondary" href="/juara/export">Export</a>
                    </div>

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    @if (Auth::user()->role == 'admin')
                                    <th>id</th>  
                                    @endif                                 
                                    <th>peringkat User</th>
                                    <th>regist id</th>
                                    <th>Nama Kompetisi</th>
                                    @if (Auth::user()->role == 'admin')
                                    <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($peringkat as $data)
                                    <tr class="text-center">
                                        @if (Auth::user()->role == 'admin')
                                        <th>{{ $data->id }}</th>
                                        @endif
                                        <th>{{ $data->keterangan_peringkat }}</th>
                                        <td>{{ $data->registrasi_id }}</td>
                                        <td>{{ $data->registrasi->kompetisi->nama_kompetisi }}</td>
                                        @if (Auth::user()->role == 'admin')
                                        <td> 
                                            <!-- Edit Button -->
                                            <a href="#modaledit{{ $data->id }}" class="fa fa-edit color-muted m-r-5" data-toggle="modal"></a>

                                            <!-- Modal Edit -->
                                            <div class="modal fade" id="modaledit{{ $data->id }}">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                <span>&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="card-body pt-5">
                                                                <form action="/juara/update/{{ $data->id }}" method="post">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label>registrasi id</label>
                                                                        <input type="text" class="form-control" name="registrasi_id" placeholder="regist id" value="{{ $data->registrasi_id }}" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>keterangan peringkat</label>
                                                                        <input type="text" class="form-control" name="keterangan_peringkat" placeholder="keterangan peringkat" value="{{ $data->keterangan_peringkat }}" required>
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
                                            </div>

                                            <!-- Delete Button -->
                                            <a href="#modaldelete{{ $data->id }}" class="fa fa-trash color-muted m-r-7" data-toggle="modal"></a>

                                            <!-- Modal Delete -->
                                            <div class="modal fade" id="modaldelete{{ $data->id }}">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Delete Data?</h5>
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                <span>&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="/juara/destroy/{{ $data->id }}" method="GET">
                                                            @csrf
                                                            <div class="modal-body">
                                                                Are you sure you want to delete this data?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Delete</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>  
                                        @endif                                   
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
