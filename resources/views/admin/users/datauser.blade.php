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
                                        <form class="mt-5 mb-5" action="/user/store" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" name="name" placeholder="Your Name" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email" placeholder="email@gmail.com" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Role</label>
                                                <select class="form-control" name="role" required>
                                                    <option value="admin">Admin</option>
                                                    <option value="visitor">Visitor</option>
                                                </select>
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


                    <div>
                        <a class="btn mb-1 ml-3 mr-3 btn-rounded btn-secondary" href="/user/export">Export</a>
                    </div>
                    

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="text-center">
                                        <th>{{ $user->id }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>
                                            <!-- Edit Button -->
                                            <a href="#modaledit{{ $user->id }}" class="fa fa-edit color-muted mr-3" data-toggle="modal"></a>

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
                                                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Role</label>
                                                                        <select name="role" class="form-control" required>
                                                                            <option value="" hidden>-- pilih role --</option>
                                                                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>
                                                                                admin</option>
                                                                            <option value="visitor" {{ $user->role == 'visitor' ? 'selected' : '' }}>
                                                                                visitor</option>
                                                                        </select>
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
                                            <a href="#modaldelete{{ $user->id }}" class="fa fa-trash color-muted" data-toggle="modal"></a>

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
                                                        @if(!$user->is_admin)
                                                        <form action="/user/destroy/{{ $user->id }}" method="GET";>
                                                            @csrf
                                                            <div class="modal-body">
                                                                Are you sure you want to delete this user?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Delete</button>
                                                            </div>
                                                        </form>
                                                        @else
                                                        <span>Admin</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @if($errors->any())
            <div class="alert alert-danger">
                {{-- <div class="card"> --}}
                    <div class="card-body">
                        <h5 class="card-title">Error</h5>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                {{-- </div> --}}
            </div>
        @endif
            </div>
        </div>
    </div>
@endsection