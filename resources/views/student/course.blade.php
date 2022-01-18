@extends('student-layout.master')
<title>Student | Course</title>
@section('content')
<div class="inner-page-banner-area" style="background-image: url('student/img/banner/5.jpg');">
    <div class="container">
        <div class="pagination-area">
            <h1>Courses</h1>
            <ul>
                <li><a href="{{ route('home')}}">Home</a> -</li>
                <li>Courses</li>
            </ul>
        </div>
    </div>
</div>
<div class="courses-page-area2">
    <div class="container" id="inner-isotope">
        <div class="row featuredContainer">
            @foreach($course as $cou)
            <form action="{{route('admissionform')}}" method="POST">
                @csrf
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mathematics english">
                    <input type="hidden" name="id" value="{{$cou->id}}">
                    <input type="hidden" name="name" value="{{$cou->name}}">
                    <div class="courses-box1">
                        <div class="single-item-wrapper">
                            <div class="courses-img-wrapper hvr-bounce-to-bottom">
                                <img class="img-responsive" src="{{ asset('student/img/course/7.jpg')}}" alt="courses">
                                <button type="submit"><a href="#"><i class="fa fa-link" aria-hidden="true"></i></a></button>
                            </div>
                            <div class="courses-content-wrapper">
                                <h3 class="item-title">{{$cou->name}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @endforeach
        </div>
    </div>
</div>
@endsection