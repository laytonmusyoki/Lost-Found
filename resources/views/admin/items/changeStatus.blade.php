@extends('admin.app')

@section('content')
<style>
    form{
        border-radius: 5px;
        padding:  20px;
        background: white;
    }
    select{
        width: 100%;
    }
    button{
        margin-top: 15px;
    }

</style>
<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <div class="content-wrapper">
        <div class="card w-100">
            <div class="card-body">
                <form action="{{route('items.changeStatus',$data)}}" method="post">
                    @csrf
                    <label for="">Status</label>
                    <select name="status">
                        <option value="" selected disabled>Select status</option>
                        <option value="claim" {{ old('status', $data->status) == 'claim' ? 'selected' : '' }}>Claim</option>
                        <option value="collected" {{ old('status', $data->status) == 'collected' ? 'selected' : '' }}>Collected</option>
                        <option value="pending" {{ old('status', $data->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
