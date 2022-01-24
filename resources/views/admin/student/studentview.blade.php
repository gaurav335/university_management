@extends('admin-layout.master')
<title>University | Student View</title>
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Student View</h5>
                        <div class="row">
                            <div class="col-md-8 col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <h4 class="mb-1 mt-1">{{ $student->name }}</h4>
                                            <p class="text-muted mb-0">Student Name</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <h4 class="mb-1 mt-1">{{ $student->email }}</h4>
                                            <p class="text-muted mb-0">Student Email</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8 col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        @if($student->contact_no != Null)
                                        <div>
                                            <h4 class="mb-1 mt-1"> {{ $student->contact_no }}</h4>
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
                            <div class="col-md-8 col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <h4 class="mb-1 mt-1">{{ $student->dob }}</h4>
                                            <p class="text-muted mb-0">Student Date Of Birth</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8 col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        @if($student->adhaar_card_no != Null)
                                        <div>
                                            <h4 class="mb-1 mt-1"> {{ $student->adhaar_card_no }}</h4>
                                            <p class="text-muted mb-0">Adhaar Card No.</p>
                                        </div>
                                        @else
                                        <div>
                                            <h4 class="mb-1 mt-1">----------------</h4>
                                            <p class="text-muted mb-0">Adhaar Card No.</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        @if($student->gender == "M")
                                        <div>
                                            <h4 class="mb-1 mt-1">Male</h4>
                                            <p class="text-muted mb-0">Student Gender</p>
                                        </div>
                                        @elseif($student->gender == "F")
                                        <div>
                                            <h4 class="mb-1 mt-1">Female</h4>
                                            <p class="text-muted mb-0">Student Gender</p>
                                        </div>
                                        @elseif($student->gender == "O")
                                        <div>
                                            <h4 class="mb-1 mt-1">Other</h4>
                                            <p class="text-muted mb-0">Student Gender</p>
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
                                            <h4 class="mb-1 mt-1">{{ $student->address }}</h4>
                                            <p class="text-muted mb-0">Student Address</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5>Student Addmission Form</h5>
                        @foreach($addmisssion as $add)
                        <div class="row">
                            <div class="col-md-8 col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <h4 class="mb-1 mt-1">{{ $add->merit }}</h4>
                                            <p class="text-muted mb-0">Student Merit</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <h4 class="mb-1 mt-1">{{ $add->addmission_date }}</h4>
                                            <p class="text-muted mb-0">Addmission Date</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="row">
                            <div class="col-md-12 col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            @foreach($college as $clg)
                                            <h4 class="mb-1 mt-1">{{ $clg->name }}</h4>
                                            @endforeach
                                            <p class="text-muted mb-0">Colleges</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($course as $cou)
                            <div class="col-md-12 col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <h4 class="mb-1 mt-1">{{ $cou->name }}</h4>
                                            <p class="text-muted mb-0">Course</p>
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
@endsection