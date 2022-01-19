@extends('student-layout.master')
<title>Student | My Addmission</title>
@section('content')
<div class="inner-page-banner-area" style="background-image: url('student/img/banner/5.jpg');">
    <div class="container">
        <div class="pagination-area">
            <h1>My Addmission</h1>
            <ul>
                <li><a href="{{route('home')}}">Home</a> -</li>
                <li>My Addmission</li>
            </ul>
        </div>
    </div>
</div>
<!-- Inner Page Banner Area End Here -->
<!-- Courses Page 1 Area Start Here -->
<div class="courses-page-area1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md12 col-sm-12 order-md-2">
                <div class="tab-content">
                    <div class="tab-pane tab-item animated fadeIn show active" id="menu-2" role="tabpanel"
                        aria-labelledby="menu-2-tab">
                        <h2>View Your Confirmation Colleges</h2>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                @foreach($addmissionconfirmation as $confirmation)
                                @foreach($confirmation as $con)
                                <div class="courses-box3">
                                    <div class="single-item-wrapper">
                                        <div class="courses-content-wrapper">
                                            <h2 class="item-content">{{$con->collegeName->name}}</h2>
                                            <h3 class="item-title">{{$con->admissionData->courseName->name}}</h3>
                                            <ul class="courses-info">
                                                <li>
                                                <li>Round Declaration Date
                                                    <br><span>
                                                        {{$con->roundDeclarationDate->merit_result_declare_date}}</span>
                                                </li>
                                                <li>Round No.
                                                    <br><span> Round {{$con->roundDeclarationDate->round_no}} </span>
                                                </li>
                                                <li>
                                            </ul>
                                            @if($con->status == 1)
                                            <h2>Your Addmission Confirm This {{$con->collegeName->name}}</h2>
                                            @else
                                            <div class="row">
                                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                                    <div class="pLace-order mt-30">
                                                        <button class="view-all-accent-btn disabled status"
                                                            data-status="0" data-sid="{{$con->admissionData->id}}"
                                                            type="submit">Next</button>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                                    <div class="pLace-order mt-30">
                                                        <button class="view-all-accent-btn disabled status"
                                                            data-status="1" data-sid="{{$con->admissionData->id}}"
                                                            type="submit">Confirm</button>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
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
@push('student-script')

<script>
//status
$(document).on('click', '.status', function() {

    var status = $(this).data('status');
    var id = $(this).data('sid');

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        url: '{{ route("confirmaddmission") }}',
        type: 'post',
        data: {
            'status': status,
            'id': id
        },
        success: function(res) {
            if (res == 0) {
                var $toast = toastr.success("Your Next Round Request Successfully");
                setTimeout(function() {
                    $toast.fadeOut(4000);
                    location.reload();
                }, 3000)
            }
            if (res == 1) {
                var $toast = toastr.success("Your Addmission is Confirm");
                setTimeout(function() {
                    $toast.fadeOut(4000);
                    location.reload();
                }, 3000)
            }
        }
    })
});
</script>
@endpush