@extends('student-layout.master')
<title>Student | Event</title>
@section('content')
<div class="inner-page-banner-area" style="background-image: url('student/img/banner/5.jpg');">
    <div class="container">
        <div class="pagination-area">
            <h1>Our Upcoming Events</h1>
            <ul>
                <li><a href="{{ route('home')}}">Home</a> -</li>
                <li>Events</li>
            </ul>
        </div>
    </div>
</div>
<div class="event-page-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12">
                <div class="row event-inner-wrapper">
                    <div class="col-xl-12 col-lg-6 col-md-12 col-sm-6">
                        <div class="single-item">
                            <div class="item-img">
                                <a href="#"><img src="{{ asset('student/img/event/1.jpg')}}" alt="event" class="img-responsive"></a>
                            </div>
                            <div class="item-content">
                                <h3 class="sidebar-title"><a href="#">WordPress MeetUp Conference 2021</a></h3>
                                <p>Bimply dummy text of the printing and typesetting istryrem Ipsum has been the
                                    industry's standard dummy text ever when an unknown printer.</p>
                                <ul class="event-info-block">
                                    <li><i class="fa fa-calendar" aria-hidden="true"></i>22 December, 2020</li>
                                    <li><i class="fa fa-map-marker" aria-hidden="true"></i>NewYork Tower, Melbourne</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-6 col-md-12 col-sm-6">
                        <div class="single-item">
                            <div class="item-img">
                                <a href="#"><img src="{{ asset('student/img/event/2.jpg')}}" alt="event" class="img-responsive"></a>
                            </div>
                            <div class="item-content">
                                <h3 class="sidebar-title"><a href="#">WordPress MeetUp Conference 2021</a></h3>
                                <p>Bimply dummy text of the printing and typesetting istryrem Ipsum has been the
                                    industry's standard dummy text ever when an unknown printer.</p>
                                <ul class="event-info-block">
                                    <li><i class="fa fa-calendar" aria-hidden="true"></i>22 December, 2020</li>
                                    <li><i class="fa fa-map-marker" aria-hidden="true"></i>NewYork Tower, Melbourne</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-6 col-md-12 col-sm-6">
                        <div class="single-item">
                            <div class="item-img">
                                <a href="#"><img src="{{ asset('student/img/event/3.jpg')}}" alt="event" class="img-responsive"></a>
                            </div>
                            <div class="item-content">
                                <h3 class="sidebar-title"><a href="#">WordPress MeetUp Conference 2021</a></h3>
                                <p>Bimply dummy text of the printing and typesetting istryrem Ipsum has been the
                                    industry's standard dummy text ever when an unknown printer.</p>
                                <ul class="event-info-block">
                                    <li><i class="fa fa-calendar" aria-hidden="true"></i>22 December, 2020</li>
                                    <li><i class="fa fa-map-marker" aria-hidden="true"></i>NewYork Tower, Melbourne</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-6 col-md-12 col-sm-6">
                        <div class="single-item">
                            <div class="item-img">
                                <a href="#"><img src="{{ asset('student/img/event/4.jpg')}}" alt="event" class="img-responsive"></a>
                            </div>
                            <div class="item-content">
                                <h3 class="sidebar-title"><a href="#">WordPress MeetUp Conference 2021</a></h3>
                                <p>Bimply dummy text of the printing and typesetting istryrem Ipsum has been the
                                    industry's standard dummy text ever when an unknown printer.</p>
                                <ul class="event-info-block">
                                    <li><i class="fa fa-calendar" aria-hidden="true"></i>22 December, 2020</li>
                                    <li><i class="fa fa-map-marker" aria-hidden="true"></i>NewYork Tower, Melbourne</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <ul class="pagination-center">
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                <div class="sidebar">
                    <div class="sidebar-box">
                        <div class="sidebar-box-inner">
                            <h3 class="sidebar-title">Search</h3>
                            <div class="sidebar-find-course">
                                <form id="checkout-form">
                                    <div class="form-group course-name">
                                        <input id="first-name" placeholder="Type Here . . .." class="form-control"
                                            type="text" />
                                    </div>
                                    <div class="form-group">
                                        <button class="sidebar-search-btn-full disabled" type="submit"
                                            value="Login">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-box">
                        <div class="sidebar-box-inner">
                            <h3 class="sidebar-title">Categories</h3>
                            <ul class="sidebar-categories">
                                <li><a href="#">GMAT</a></li>
                                <li><a href="#">IELTS</a></li>
                                <li><a href="#">Regular MBA</a></li>
                                <li><a href="#">BBA</a></li>
                                <li><a href="#">CSE</a></li>
                                <li><a href="#">Diploma</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-box">
                        <div class="sidebar-box-inner">
                            <h3 class="sidebar-title">Popular Tags</h3>
                            <ul class="product-tags">
                                <li><a href="#">Education</a></li>
                                <li><a href="#">Study</a></li>
                                <li><a href="#">Class</a></li>
                                <li><a href="#">Lecturers</a></li>
                                <li><a href="#">Events</a></li>
                                <li><a href="#">University</a></li>
                                <li><a href="#">Date</a></li>
                                <li><a href="#">Campus</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection