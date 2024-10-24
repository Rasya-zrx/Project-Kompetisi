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
            <div class="row justify-content-center">
        
                <div class="ml-2 col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card gradient-1">
                        <a href="/kompetisi">
                            <div class="card-body">
                                <h1 class="card-title text-white">Jumlah Kompetisi</h1>
                                <h1 class="text-white">{{ $jumlahkompe }}</h1>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-gamepad"></i></span>
                            </div>
                        </a>
                    </div>
                </div>
        
                <div class="ml-2 col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card gradient-3">
                        <a href="/user">
                            <div class="card-body">
                                <h1 class="card-title text-white">Jumlah User</h1>
                                <h1 class="text-white">{{ $jumlahuser }}</h1>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        
            <div class="row justify-content-center">
                @foreach ($kompetisi as $kompe)
                    <div class="col-12 col-sm-6">
                        <div class="card">
                            <div class="card-body text-center">
                                <img src="{{ asset('storage/'.$kompe->gambar) }}" class="img-fluid rounded" style="max-height: 84px;">
                                <h2 class="mt-3">{{ $kompe->nama_kompetisi }}</h2>
                                <p>{{ $kompe->deskripsi }}</p>
                                <a href="/registrasi/{{ $kompe->id }}" class="btn gradient-9 btn-lg border-0 btn-rounded px-3">Regist Now!</a>
                            </div>
                        </div>
                    </div>
                @endforeach 
            </div>
        </div>
        
        
    </div>
        <!-- #/ container -->
    <!--**********************************
        Content body end
    ***********************************-->
</div>
@endsection