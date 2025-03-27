@extends('user.app')

@section('content')
<style>
    form{
        border-radius: 5px;
        padding:  20px;
        background: white;
    }

    .form-inputs input{
        width: 100%;
        margin-bottom: 20px;
        height: 50px;
        padding-left: 10px;
        border-radius: 5px;
    }
    .form-inputs textarea{
        width: 100%;
        margin-bottom: 20px;
        height: 100px;
        padding-left: 10px;
        border-radius: 5px;
    }

    .form-inputs input:focus{
        border: 1px solid rgb(69, 69, 69);
    }
    .form-inputs button{
        margin-top: 5px;
    }
</style>
<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{route('user.store')}}" enctype="multipart/form-data" method="post" class="w-100">
                    @csrf
                    <div class="form-inputs" >
                        <label for="">Item Name</label>
                        <input type="text" name="item_name" placeholder="Enter item name">
                        <label for="">Description</label>
                        <textarea name="description" placeholder="Enter item description" id=""></textarea>
                        <label for="">Image</label>
                        <input type="file" name="image">
                        <button class="btn btn-success" type="submit">Save item</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
