@extends('layouts.app')

@section('content')
    <div class="container-fluid ml-6">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">
                        <h4>{{ $title }}</h4>
                    </div>
                    
                    <!-- Button to trigger modal -->
                    <button type="button" class="btn mb-1 btn-rounded btn-primary" data-toggle="modal" 
                            data-original-title="create" data-target="#modalcreate">+ TAMBAH DATA</button>

                    <!-- Modal Create -->
                    <div class="bootstrap-modal">
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
                                            <h4 class="text-center">Tambah Data</h4>
                                            <form class="mt-5 mb-5" action="/user/store" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" class="form-control" name="name"
                                                           placeholder="Your Name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" name="email"
                                                           placeholder="email@gmail.com" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" class="form-control" name="password"
                                                           placeholder="Password" required>
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
                                            <a href="#modaledit{{ $user->id }}" class="fa fa-pencil color-muted m-r-5"
                                                data-toggle="modal" data-original-title="Edit"></a>

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
                                                                <form class="mt-5 mb-5"
                                                                    action="/user/update/{{ $user->id }}" method="post">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label>Name</label>
                                                                        <input type="text" class="form-control" name="name"
                                                                               placeholder="Your Name" value="{{ $user->name }}" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Email</label>
                                                                        <input type="email" class="form-control" name="email"
                                                                               placeholder="email@gmail.com" value="{{ $user->email }}" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Password</label>
                                                                        <input type="password" class="form-control" name="password"
                                                                               placeholder="Password" required>
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
                                            <a href="#modaldelete{{ $user->id }}" class="fa fa-trash color-muted m-r-7"
                                                data-toggle="modal" data-original-title="Delete"></a>

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
@endsection


    <!-- Modal -->

 {{-- @foreach ($users as $d)
    <div class="modal fade" id="modaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Edit</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/user/update/{{ $d->id }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Lengkap </label>
                            <input type="text" value="{{ $d->name }}" class="form-control" name="name"
                                placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" value="{{ $d->email }}" class="form-control" name="email"
                                placeholder="admin@gmail.com" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="password"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <select class="form-control" name="role" required>
                                <option value="" hidden>-- pilih role --</option>
                                <option <?php if ($d['role'] == 'admin') {
                                    echo 'selected';
                                }
                                ?>>Admin</option>
                                <option <?php if ($d['role'] == 'operator') {
                                    echo 'selected';
                                }
                                ?>>Operator</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                                class="fas fa-undo">Close</i></button>
                        <button type="submit" class="btn btn-primary" class="fas fa-save">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach --}}
