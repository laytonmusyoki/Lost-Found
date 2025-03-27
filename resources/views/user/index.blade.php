@extends('user.app')

@section('content')
<style>
    .placeholders {
        width: 100%;
        height: 200px;
    }
    .placeholders img {
        height: 100%;
        width: 100%;
    }
    .details {
        padding: 10px;
    }
    .search-input {
        display: flex;
    }
    .search-input input {
        width: 60%;
        height: 38px;
        padding-left: 12px;
        border-radius: 7px;
        border: 1px solid black;
        margin-bottom: 20px;
    }
    .search-input button {
        float: right;
        margin-left: 30px;
        height: 38px;
    }
</style>
<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row d-flex justify-content-between align-items-center">
                <div class="col-sm-8">
                    <h5 class="font-weight-bold">
                        Good
                        <script>
                            var hours = new Date().getHours();
                            var greeting;
                            if (hours >= 5 && hours < 12) {
                                greeting = 'Morning';
                            } else if (hours >= 12 && hours < 17) {
                                greeting = 'Afternoon';
                            } else if (hours >= 17 && hours < 21) {
                                greeting = 'Evening';
                            } else {
                                greeting = 'Night';
                            }
                            document.write(greeting);
                        </script>
                    </h5>
                </div>
                <div class="col-sm-4">
                    <div class="d-flex justify-content-sm-end">
                        <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                            <button class="btn btn-sm btn-light bg-white" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <i class="mdi mdi-calendar"></i> Today ({{ date('d M Y') }})
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div>

    <div class="search-input">
        <input type="search" name="search" placeholder="Search an item name here" id="search" width="50%">
        <button class="btn btn-success">Search</button>
    </div>

    <div class="row">
        @foreach($items as $item)
        <div class="col-lg-2">
            <div class="card" data-item="{{$item->item_name}}" id="item-{{$item->id}}" style="margin-bottom: 20px;">
                <div class="cards-body">
                    <div class="placeholders">
                        <img src="{{ Storage::url($item->image) }}" alt="">
                    </div>
                    <div class="details">
                        <h3 class="card-title">{{ $item->item_name }}</h3>
                        <a href="{{ route('user.view', $item->id) }}" class="btn btn-outline-secondary">View</a>
                        <button class="btn btn-success claim-btn" data-id="{{ $item->id }}" data-name="{{ $item->id }}" data-toggle="modal" data-target="#claimModal" style="float: right;">Claim</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Claim Modal -->
<div class="modal fade" id="claimModal" tabindex="-1" aria-labelledby="claimModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="claimModalLabel">Claim Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.claim') }}" method="POST">
                    @csrf
                    <input type="hidden" name="item_id" id="modalItemId">
                    <div class="form-group">
                        <label for="fullname">Full Name</label>
                        <input type="text" class="form-control" name="fullname" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Claim</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Live search functionality
    document.getElementById('search').addEventListener('input', function () {
        let search = this.value.toLowerCase();
        let cards = document.querySelectorAll('.card');

        cards.forEach(card => {
            let item = card.getAttribute('data-item').toLowerCase();
            card.style.display = item.includes(search) ? '' : 'none';
        });
    });

    // Show modal and populate data dynamically
    document.querySelectorAll('.claim-btn').forEach(button => {
        button.addEventListener('click', function () {
            let itemId = this.getAttribute('data-id');
            let itemName = this.getAttribute('data-name');

            document.getElementById('modalItemId').value = itemId;
            document.getElementById('modalItemName').value = itemName;
        });
    });
</script>

@endsection
