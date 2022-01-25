@extends('student-layout.master')
<title>Student | Lecturers</title>
@section('content')
<div class="inner-page-banner-area" style="background-image: url('student/img/banner/5.jpg');">
            <div class="container">
                <div class="pagination-area">
                    <h1>Gallery</h1>
                    <ul>
                        <li><a href="{{ route('home')}}">Home</a> -</li>
                        <li>Gallery</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Inner Page Banner Area End Here -->
        <!-- Gallery Area 2 Start Here -->
        <div class="gallery-area2">
            <div class="container" id="inner-isotope">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="isotop-classes-tab isotop-btn">
                            <a href="#" data-filter="*">All</a>
                            <a href="#" data-filter=".library"> Library</a>
                            <a href="#" data-filter=".room" class="current">Room</a>
                            <a href="#" data-filter=".auditoriam">Auditoriam</a>
                            <a href="#" data-filter=".campus">Campus</a>
                            <a href="#" data-filter=".class">Class</a>
                        </div>
                    </div>
                </div>
                <div class="row featuredContainer gallery-wrapper">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 library auditoriam">
                        <div class="gallery-box">
                            <img src="{{ asset('student/img/gallery/6.jpg')}}" class="img-responsive" alt="gallery">
                            <div class="gallery-content">
                                <a href="{{ asset('student/img/gallery/6.jpg')}}" class="zoom"><i class="fa fa-link" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 room auditoriam campus">
                        <div class="gallery-box">
                            <img src="{{ asset('student/img/gallery/7.jpg')}}" class="img-responsive" alt="gallery">
                            <div class="gallery-content">
                                <a href="{{ asset('student/img/gallery/7.jpg')}}" class="zoom"><i class="fa fa-link" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 library room campus">
                        <div class="gallery-box">
                            <img src="{{ asset('student/img/gallery/8.jpg')}}" class="img-responsive" alt="gallery">
                            <div class="gallery-content">
                                <a href="{{ asset('student/img/gallery/8.jpg')}}" class="zoom"><i class="fa fa-link" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 library auditoriam">
                        <div class="gallery-box">
                            <img src="{{ asset('student/img/gallery/9.jpg')}}" class="img-responsive" alt="gallery">
                            <div class="gallery-content">
                                <a href="{{ asset('student/img/gallery/9.jpg')}}" class="zoom"><i class="fa fa-link" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 room auditoriam class">
                        <div class="gallery-box">
                            <img src="{{ asset('student/img/gallery/10.jpg')}}" class="img-responsive" alt="gallery">
                            <div class="gallery-content">
                                <a href="{{ asset('student/img/gallery/10.jpg')}}" class="zoom"><i class="fa fa-link" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 library campus class">
                        <div class="gallery-box">
                            <img src="{{ asset('student/img/gallery/11.jpg')}}" class="img-responsive" alt="gallery">
                            <div class="gallery-content">
                                <a href="{{ asset('student/img/gallery/11.jpg')}}" class="zoom"><i class="fa fa-link" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 room auditoriam campus">
                        <div class="gallery-box">
                            <img src="{{ asset('student/img/gallery/12.jpg')}}" class="img-responsive" alt="gallery">
                            <div class="gallery-content">
                                <a href="{{ asset('student/img/gallery/12.jpg')}}" class="zoom"><i class="fa fa-link" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 library room auditoriam">
                        <div class="gallery-box">
                            <img src="{{ asset('student/img/gallery/13.jpg')}}" class="img-responsive" alt="gallery">
                            <div class="gallery-content">
                                <a href="{{ asset('student/img/gallery/13.jpg')}}" class="zoom"><i class="fa fa-link" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 auditoriam campus">
                        <div class="gallery-box">
                            <img src="{{ asset('student/img/gallery/14.jpg')}}" class="img-responsive" alt="gallery">
                            <div class="gallery-content">
                                <a href="{{ asset('student/img/gallery/14.jpg')}}" class="zoom"><i class="fa fa-link" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 library room auditoriam">
                        <div class="gallery-box">
                            <img src="{{ asset('student/img/gallery/15.jpg')}}" class="img-responsive" alt="gallery">
                            <div class="gallery-content">
                                <a href="{{ asset('student/img/gallery/15.jpg')}}" class="zoom"><i class="fa fa-link" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 library campus class">
                        <div class="gallery-box">
                            <img src="{{ asset('student/img/gallery/16.jpg')}}" class="img-responsive" alt="gallery">
                            <div class="gallery-content">
                                <a href="{{ asset('student/img/gallery/16.jpg')}}" class="zoom"><i class="fa fa-link" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 library room auditoriam campus">
                        <div class="gallery-box">
                            <img src="{{ asset('student/img/gallery/17.jpg')}}" class="img-responsive" alt="gallery">
                            <div class="gallery-content">
                                <a href="{{ asset('student/img/gallery/17.jpg')}}" class="zoom"><i class="fa fa-link" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
