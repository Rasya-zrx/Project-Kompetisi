@extends('layouts.app')
@section('content')

<div id="main-wrapper" class="show menu-toggle">    

    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body" style="width:100%;">
        <h3>{{ $title }}</h3>
        <!-- row -->
        <div class="container">
            <div class="row">

                <div class="ml-2 col-lg-3 col-sm-6">
                    <div class="card gradient-1">
                        <a href="/kompetisi">
                        <div class="card-body">
                            <h1 class="card-title text-white">Jumlah Kompetisi</h1>
                            <div class="d-inline-block">
                                <h1 class="text-white">{{ $jumlahkompe }}</h1>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-gamepad"></i></span>
                        </div></a>
                    </div>
                </div>


                <div class="ml-2 col-lg-3 col-sm-6">
                    <div class="card gradient-3">
                        <a href="/user">
                        <div class="card-body">
                            <h1 class="card-title text-white">Jumlah User</h1>
                            <div class="d-inline-block">
                                <h1 class="text-white">{{ $jumlahuser }}</h1>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                        </div></a>
                    </div>
                </div>
                @if (Session::get('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('sucscess') }}
                                </div>  
                            @endif
            @foreach ($kompetisi as $kompe)
            <div class="col-6 justify-content-center">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <span class="display-4">
                                <img src="{{ asset('storage/'.$kompe->gambar) }}" class="rounded" style="width: 150px">
                            </span>
                            <h2 class="mt-3">{{ $kompe->nama_kompetisi }}</h2>
                            <p>{{ $kompe->deskripsi }}</p>
                            <a href="/registrasi/{{ $kompe->id }}" class="btn gradient-9 btn-lg border-0 btn-rounded px-5">Regist Now!</a>
                        </div>
                    </div>
                </div>
            </div>
            

            @endforeach 
            </div>
        </div>
    </div>
        <!-- #/ container -->
    </div>
    <!--**********************************
        Content body end
    ***********************************-->
</div>
@endsection