@extends('layouts.app')
@section('content')

<div id="main-wrapper" class="show menu-toggle">    

    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body" style="width:100%;">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">           
            @foreach ($kompetisi as $kompe)
                <div class="col-10">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <span class="display-4"><img src="{{ asset ('storage/'.$kompe->gambar) }}" class="rounded"
                                    style="width: 150px"></span>
                                <h2 class="mt-3">{{ $kompe->nama_kompetisi }}</h2>
                                <a href="/juara/{{ $kompe->id }}" class="btn gradient-9 btn-lg border-0 btn-rounded px-5">Lihat Peringkat</a>
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