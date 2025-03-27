@extends('admin.app')

@section('content')
<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <div class="content-wrapper">
        <div class="card">

            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($items as $item)
                        <tr>
                            <td>{{$item->item_name}}</td>
                            <td>{{$item->description}}</td>
                            <td><img src="{{Storage::url($item->image)}}" alt=""></td>
                            <td><p class="badge bg-warning">Pending</p></td>
                            <td>
                                <a href="{{route('items.seeStatus',$item->id)}}" class="btn btn-success">Update</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <p>
                    {{$items->links()}}
                </p>
            </div>
        </div>
    </div>
@endsection
