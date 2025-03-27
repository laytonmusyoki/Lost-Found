@extends('admin.app')

@section('content')
<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">

<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <table class="table" id="example4">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                    <tr>
                        <td>{{ $item->fullname }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            @if($item->status == 'pending')
                            <span class="badge bg-warning">{{ $item->status }}</span>
                            @else
                            <span class="badge bg-success">{{ $item->status }}</span>
                            @endif
                        </td>
                        <td class="d-flex gap-2">
                            @if($item->status == 'pending')
                            <a href="#" class="btn btn-success update-btn"
                               data-id="{{ $item->item_id }}" data-status="{{ $item->status }}"
                               data-toggle="modal" data-target="#updateStatusModal">
                                Reply
                            </a>
                            @else
                            <a href="#" class="btn btn-primary">
                                Replied
                            </a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <p>
                {{ $items->links() }}
            </p>
        </div>
    </div>
</div>

<!-- Status Update Modal -->
<div class="modal fade" id="updateStatusModal" tabindex="-1" aria-labelledby="updateStatusModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateStatusModalLabel">Update Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('items.claimreview')}}" method="POST">
                    @csrf
                    <input type="hidden" name="item_id" id="modalItemId">
                    <div class="form-group">
                        <label for="status">Select Status</label>
                        <select class="form-control" name="status" id="modalStatus">
                            <option value="" selected disabled>Select status</option>
                            <option value="pending">Pending</option>
                            <option value="replied">Replied</option>
                        </select>
                        <label for="">Claim review</label>
                        <textarea name="message" class="form-control" placeholder="Enter review message" id=""></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Status</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.update-btn').forEach(button => {
        button.addEventListener('click', function () {
            let itemId = this.getAttribute('data-id');
            let currentStatus = this.getAttribute('data-status');

            document.getElementById('modalItemId').value = itemId;
            document.getElementById('modalStatus').value = currentStatus;
        });
    });
</script>

@endsection
