@extends('layouts.app')
@section('content')

<div id="main-wrapper" class="show">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $title }}</h4>
                        <div class="form-validation">
                            @if (Session::get('error'))
                                <div class="alert alert-danger">
                                    {{ Session::get('error') }}
                                </div>  
                            @endif
                            <form class="form-valide" action="/registrasi/store" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email" placeholder="Your valid email.." required>
                                </div>
                                <input type="hidden" name="id_kompetisi" value="{{ $kompetisi->id }}">
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection