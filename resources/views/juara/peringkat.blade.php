@extends('layouts.app')

@section('content')
    <div class="container-fluid ml-6">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title mt-3 ml-3">
                        <h4>{{ $title }}</h4>
                    </div>
                    
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
                                        <form class="mt-5 mb-5" action="/juara/store" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label>Regist</label>
                                                <input type="text" class="form-control" name="registrasi_id" placeholder="Regist ID" required>
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

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th>id</th>
                                    <th>peringkat User</th>
                                    <th>regist id</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($peringkat as $data)
                                    <tr class="text-center">
                                        <th>{{ $data->id }}</th>
                                        <th>{{ $data->keterangan_peringkat }}</th>
                                        <td>{{ $data->registrasi_id }}</td>
                                        {{-- <td> 
                                            <!-- Edit Button -->
                                            <a href="#modaledit{{ $user->id }}" class="fa fa-edit color-muted m-r-5" data-toggle="modal"></a>

                                            <!-- Modal Edit -->
                                            <div class="modal fade" id="modaledit{{ $user->id }}">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit User</h5>
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                <span>&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="card-body pt-5">
                                                                <form action="/user/update/{{ $user->id }}" method="post">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label>Name</label>
                                                                        <input type="text" class="form-control" name="name" placeholder="Your Name" value="{{ $user->name }}" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Email</label>
                                                                        <input type="email" class="form-control" name="email" placeholder="email@gmail.com" value="{{ $user->email }}" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Password</label>
                                                                        <input type="password" class="form-control" name="password" placeholder="Password" required>
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
                                            <a href="#modaldelete{{ $user->id }}" class="fa fa-trash color-muted m-r-7" data-toggle="modal"></a>

                                            <!-- Modal Delete -->
                                            <div class="modal fade" id="modaldelete{{ $user->id }}">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Delete User?</h5>
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                <span>&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="/user/destroy/{{ $user->id }}" method="GET">
                                                            @csrf
                                                            <div class="modal-body">
                                                                Are you sure you want to delete this user?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Delete</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </td>
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
