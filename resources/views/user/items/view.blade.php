@extends('user.app')

@section('content')
<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <img height="300" width="500" src="{{Storage::url($data->image)}}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <p>Name : {{$data->item_name}}</p>
                        <p>Description : {{$data->description}}</p>
                    </div>
                    <div class="col-lg-3">
                        <a href="{{route('user.dashboard')}}" class="btn btn-success" style="margin-bottom: 10px;">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
