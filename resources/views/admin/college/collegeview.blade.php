@extends('admin-layout.master')
<title>University | College View</title>
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5>College View</h5>

                        <center>
                            <div class="col-md-20 col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        @if($college->logo != Null)
                                        <div>
                                            <center><img src="{{ $college->logo }}" height='100px' width='100px'>
                                            </center>
                                            <p class="text-muted mb-0">College Logo</p>
                                        </div>
                                        @else
                                        <div>
                                            <center><img
                                                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRmyZt9_xdY4Jw36tIbiNswLWBuuxmhlHTv1A&usqp=CAU"
                                                    height='100px' width='100px'></center>
                                            <p class="text-muted mb-0">College Logo</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </center>

                        <div class="row">
                            <div class="col-md-8 col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <h4 class="mb-1 mt-1">{{ $college->name }}</h4>
                                            <p class="text-muted mb-0">College Name</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <h4 class="mb-1 mt-1">{{ $college->email }}</h4>
                                            <p class="text-muted mb-0">College Email</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        @if($college->contact_no != Null)
                                        <div>
                                            <h4 class="mb-1 mt-1"> {{ $college->contact_no }}</h4>
                                            <p class="text-muted mb-0">Mobile No.</p>
                                        </div>
                                        @else
                                        <div>
                                            <h4 class="mb-1 mt-1">----------------</h4>
                                            <p class="text-muted mb-0">Mobile No.</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12 col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <h4 class="mb-1 mt-1">{{ $college->address }}</h4>
                                            <p class="text-muted mb-0">College Address</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                        @foreach($collegecourse as $clgcourse)
                            <div class="col-md-4 col-xl-2">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <h4 class="mb-1 mt-1">{{$clgcourse->courseName->name}}</h4>
                                            <p class="text-muted mb-0">Course Name</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-xl-2">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <h4 class="mb-1 mt-1">{{$clgcourse->seat_no}}</h4>
                                            <p class="text-muted mb-0">Total Seat</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-xl-2">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <h4 class="mb-1 mt-1">{{$clgcourse->merit_seat}}</h4>
                                            <p class="text-muted mb-0">Merit Seat</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-xl-2">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <h4 class="mb-1 mt-1">{{$clgcourse->reserved_seat}}</h4>
                                            <p class="text-muted mb-0">Reserved Seat</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-xl-2">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <h4 class="mb-1 mt-1">0</h4>
                                            <p class="text-muted mb-0">Pending Seat</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-xl-2">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <h4 class="mb-1 mt-1">0</h4>
                                            <p class="text-muted mb-0">Filled Seat</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection