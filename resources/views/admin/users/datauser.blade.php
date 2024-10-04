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
                            data-target="#modalcreate">+ TAMBAH DATA</button>
                            
                        <div class="bootstrap-modal">
                            @foreach ($users as $a)
                                <div class="modal fade" id="modalcreate">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Tambah Data</h5>
                                                <button type="button" class="close"
                                                    data-dismiss="modal"><span>&times;</span>
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
                                                    <a class="text-center">
                                                        <h4>Tambah Data</h4>
                                                    </a>

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
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-outline-primary"
                                                    class="fas fa-save">Save Changes</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

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
                                                <td><span>{{ $user->email }}</span>
                                                </td>
                                                <td>{{ $user->password }}</td>
                                                <td>
                                                    <span>


                                                        <a href="#modaledit{{ $user->id }}"
                                                            class="fa fa-pencil color-muted m-r-5" data-toggle="modal"
                                                            data-original-title="Edit"></a>

                                                        @foreach ($users as $d)
                                                            <div class="modal fade" id="modaledit{{ $d->id }}">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Edit User</h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal"><span>&times;</span>
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
                                                                                <a class="text-center">
                                                                                    <h4>Edit Data</h4>
                                                                                </a>

                                                                                <form class="mt-5 mb-5"
                                                                                    action="/user/update/{{ $d->id }}"
                                                                                    method="post">

                                                                                    @csrf
                                                                                    <div class="form-group">
                                                                                        <label>Name</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="name"
                                                                                            placeholder="Your Name"
                                                                                            required>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label>Password</label>
                                                                                        <input type="password"
                                                                                            class="form-control"
                                                                                            name="password"
                                                                                            placeholder="Password" required>
                                                                                    </div>

                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">Close</button>
                                                                            <button type="submit"
                                                                                class="btn btn-outline-primary"
                                                                                class="fas fa-save">Save Changes</button>
                                                                        </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                            </div>
                        </div>
                        @endforeach

                        <a href="#modaldelete{{ $user->id }}" class="fa  fa-trash color-muted m-r-5"
                            data-toggle="modal" data-original-title="Delete"></a>

                        @foreach ($users as $c)
                            <div class="bootstrap-modal">
                                <div class="modal fade" id="modaldelete{{ $c->id }}">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete User?</h5>
                                                <button type="button" class="close"
                                                    data-dismiss="modal"><span>&times;</span>
                                                </button>
                                            </div>
                                            <form action="/user/destroy/{{ $c->id }}" method="GET">
                                                @csrf
                                                <div class="modal-body"> are you sure want
                                                    to delete this user??</div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
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
@endforeach

@foreach ($users as $c)
    <div class="modal fade" id="modaldelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="GET" action="user/destroy/{{ $c->id }}">
                    @csrf
                    <div class="modal-body">
                        ...

                        <div class="form-group">
                            <h5>Apakah anda yakin ingin menghapus data ini?</h5>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach --}}
@endsection
