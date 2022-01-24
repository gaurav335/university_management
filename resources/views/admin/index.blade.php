@extends('admin-layout.master')
<title>University | Dashboard</title>
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="float-right mt-2">
                            <i class="fas fa-university" style="font-size:40px; color:#7095eb;"></i>
                        </div>
                        <div>
                            <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{$college}}</span></h4>
                        </div>
                        <p class="text-muted mt-3 mb-0"><span class="text-success mr-1"><i class="mdi mdi-arrow-up-bold ml-1"></i></span>Colleges</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="float-right mt-2">
                            <i class="fas fa-book-reader" style="font-size:40px; color:#7095eb;"></i>
                        </div>
                        <div>
                            <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{$course}}</span></h4>
                        </div>
                        <p class="text-muted mt-3 mb-0"><span class="text-success mr-1"><i class="mdi mdi-arrow-up-bold ml-1"></i></span>Course</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="float-right mt-2">
                            <i class="fas fa-book" style="font-size:40px; color:#7095eb;"></i>
                        </div>
                        <div>
                            <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{$subject}}</span></h4>
                        </div>
                        <p class="text-muted mt-3 mb-0"><span class="text-success mr-1"><i class="mdi mdi-arrow-up-bold ml-1"></i></span>Subjects</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="float-right mt-2">
                            <i class="fas fa-users" style="font-size:40px; color:#7095eb;"></i>
                        </div>
                        <div>
                            <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{$user}}</span></h4>
                        </div>
                        <p class="text-muted mt-3 mb-0"><span class="text-success mr-1"><i class="mdi mdi-arrow-up-bold ml-1"></i></span>Students</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('admin-script')

@endpush