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
                                    <th>Nama User</th>
                                    <th>Nama Kompetisi</th>
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
                                        <td>{{ $registrasi->user->name }}</td>
                                        <td>{{ $registrasi->kompetisi->nama_kompetisi }}</td>
                                        <td>{{ $registrasi->tgl_registrasi }}</td>
                                        <td>
    
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