@extends('college-layout.master')
<title>College | Dashboard</title>
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="float-right mt-2">
                            <i class="fas fa-users" style="font-size:40px; color:#a6bded;"></i>
                        </div>
                        <div>
                            <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{$totleAdmission}}</span></h4>
                        </div>
                        <p class="text-muted mt-3 mb-0"><span class="text-danger mr-1"><i class="mdi mdi-arrow-up-bold ml-1"></i></span>Totel Student</p></br>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="float-right mt-2">
                            <i class="fas fa-users" style="font-size:40px; color:#a6bded;"></i>
                        </div>
                        <div>
                            <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{$collegeMerit}}</span></h4>
                        </div>
                        <p class="text-muted mt-3 mb-0"><span class="text-danger mr-1"><i class="mdi mdi-arrow-up-bold ml-1"></i></span>Totel Student MeritBase Addmission</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="float-right mt-2">
                            <i class="fas fa-users" style="font-size:40px; color:#a6bded;"></i>
                        </div>
                        <div>
                            <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{$collegeRevserd}}</span></h4>
                        </div>
                        <p class="text-muted mt-3 mb-0"><span class="text-danger mr-1"><i class="mdi mdi-arrow-up-bold ml-1"></i></span>Totel Student ReseverdBase Addmission</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="float-right mt-2">
                            <i class="fas fa-book-reader" style="font-size:40px; color:#a6bded;"></i>
                        </div>
                        <div>
                            <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{$course}}</span></h4>
                        </div>
                        <p class="text-muted mt-3 mb-0"><span class="text-danger mr-1"><i class="mdi mdi-arrow-up-bold ml-1"></i></span>College Course</p></br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('college-script')

@endpush