@extends('admin.app')

@section('content')
<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <div class="content-wrapper">
        <div class="card">

            <div class="card-body">
                <a href="{{route('items.create')}}" style="width: 25%; margin: 10px; float: right;" class="btn btn-success">Upload item</a>
                <table class="table" id="example4">
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
                            <td><a href="{{route('items.show',$item->id)}}"><img src="{{Storage::url($item->image)}}" alt=""></a></td>
                            <td ><span class="badge bg-primary">{{$item->status}}</span></td>
                            <td class="d-flex gap-2">
                                <a href="{{route('items.edit',$item->id)}}" class="btn btn-success">Edit</a>
                                <form action="{{route('items.destroy',$item->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" onclick="return(confirm('Are you sure you want to delete item'))"  class="btn btn-danger">Delete</button>
                                </form>
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
