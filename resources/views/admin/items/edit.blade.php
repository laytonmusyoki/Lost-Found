@extends('admin.app')

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
    .form-inputs  select{
        width: 100%;
    }
</style>
<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{route('items.update',$data)}}" enctype="multipart/form-data" method="post" class="w-100">
                    @csrf
                    @method('put')
                    <div class="form-inputs" >
                        <label for="">Item Name</label>
                        <input type="text" name="item_name" value="{{$data->item_name}}" placeholder="Enter item name">
                        <label for="">Description</label>
                        <textarea name="description" placeholder="Enter item description" id="">{{$data->description}}</textarea>
                        <label>Status</label>
                        <select name="status">
                            <option value="" selected disabled>Select status</option>
                            <option value="claim" {{ old('status', $data->status) == 'claim' ? 'selected' : '' }}>Claim</option>
                            <option value="collected" {{ old('status', $data->status) == 'collected' ? 'selected' : '' }}>Collected</option>
                            <option value="pending" {{ old('status', $data->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                        </select>
                        <button class="btn btn-success" type="submit">Save item</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
