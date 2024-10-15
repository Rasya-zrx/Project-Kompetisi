@extends('layouts.app')

@section('content')
    <div class="container-fluid ml-6">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">
                        <h4 class="card-title mt-3 ml-3">{{ $title }}</h4>
                    </div>

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th>ID Registrasi</th>
                                    <th>User ID</th>
                                    <th>ID Kompetisi</th>
                                    <th>Tgl Registrasi</th>
                                    @if (Auth::user()->role == 'admin')
                                    <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($registrasi as $registrasi)
                                    <tr class="text-center">
                                        <th>{{ $registrasi->id }}</th>
                                        <td>{{ $registrasi->user_id }}</td>
                                        <td>{{ $registrasi->kompetisi_id }}</td>
                                        <td>{{ $registrasi->tgl_registrasi }}</td>
                                        <td>
                                            {{-- <!-- Edit Button -->
                                            <a href="#modaledit{{ $registrasi->id }}" class="fa fa-edit color-muted m-r-5"
                                                data-toggle="modal" data-original-title="Edit"></a>

                                            <!-- Modal Edit -->
                                            <div class="modal fade" id="modaledit{{ $registrasi->id }}">
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
                                                                    action="/registrasi/update/{{ $registrasi->id }}" method="post">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label>Name</label>
                                                                        <input type="text" class="form-control" name="name"
                                                                               placeholder="Your Name" value="{{ $registrasi->name }}" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Email</label>
                                                                        <input type="email" class="form-control" name="email"
                                                                               placeholder="email@gmail.com" value="{{ $registrasi->email }}" required>
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
                                            </div> --}}

                                            <!-- Delete Button -->
                                            <a href="#modaldelete{{ $registrasi->id }}" class="fa fa-trash color-muted m-r-7"
                                                data-toggle="modal" data-original-title="Delete"></a>

                                            <!-- Modal Delete -->
                                            <div class="modal fade" id="modaldelete{{ $registrasi->id }}">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Delete Data?</h5>
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                <span>&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="/registrasi/destroy/{{ $registrasi->id }}" method="GET">
                                                            @csrf
                                                            <div class="modal-body">
                                                                Are you sure you want to delete this data?
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
                </div>
            </div>
        </div>
    </div>
@endsection