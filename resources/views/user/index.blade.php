@extends('admin.app')

@section('content')
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
                            {{-- {{ Auth::user()->name }}! --}}
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
        
    </div>
@endsection
