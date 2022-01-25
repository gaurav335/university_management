@extends('student-layout.master')
<title>Student | Lecturers</title>
@section('content')
<div class="inner-page-banner-area" style="background-image: url('student/img/banner/5.jpg');">
    <div class="container">
        <div class="pagination-area">
            <h1>Lecturers</h1>
            <ul>
                <li><a href="{{ route('home')}}">Home</a> -</li>
                <li>Lecturers</li>
            </ul>
        </div>
    </div>
</div>
<div class="lecturers-page2-area">
    <div class="container" id="inner-isotope">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="isotop-classes-tab isotop-btn-accent">
                    <a href="#" data-filter="*" class="current">All</a>
                    <a href="#" data-filter=".diploma">Diploma</a>
                    <a href="#" data-filter=".cse">CSS</a>
                    <a href="#" data-filter=".english">English</a>
                    <a href="#" data-filter=".medical">Medical</a>
                </div>
            </div>
        </div>
        <div class="row featuredContainer">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 diploma cse">
                <div class="single-item">
                    <div class="lecturers-item-wrapper">
                        <a href="#"><img class="img-responsive" src="{{ ('student/img/team/14.jpg')}}" alt="team"></a>
                        <div class="lecturers-content-wrapper">
                            <h3><a href="#">Rosy Janner</a></h3>
                            <span>Senior Finance Lecturer</span>
                            <p>Eimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                                industummy text.</p>
                            <ul class="lecturers-social">
                                <li><a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 cse english">
                <div class="single-item">
                    <div class="lecturers-item-wrapper">
                        <a href="#"><img class="img-responsive" src="{{ ('student/img/team/15.jpg')}}" alt="team"></a>
                        <div class="lecturers-content-wrapper">
                            <h3><a href="#">Tom Steven</a></h3>
                            <span>Senior Finance Lecturer</span>
                            <p>Eimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                                industummy text.</p>
                            <ul class="lecturers-social">
                                <li><a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 diploma english">
                <div class="single-item">
                    <div class="lecturers-item-wrapper">
                        <a href="#"><img class="img-responsive" src="{{ ('student/img/team/16.jpg')}}" alt="team"></a>
                        <div class="lecturers-content-wrapper">
                            <h3><a href="#">Luice Nishaa</a></h3>
                            <span>Senior Finance Lecturer</span>
                            <p>Eimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                                industummy text.</p>
                            <ul class="lecturers-social">
                                <li><a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 cse medical">
                <div class="single-item">
                    <div class="lecturers-item-wrapper">
                        <a href="#"><img class="img-responsive" src="{{ ('student/img/team/17.jpg')}}" alt="team"></a>
                        <div class="lecturers-content-wrapper">
                            <h3><a href="#">Mike Hussy</a></h3>
                            <span>Senior Finance Lecturer</span>
                            <p>Eimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                                industummy text.</p>
                            <ul class="lecturers-social">
                                <li><a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 diploma english">
                <div class="single-item">
                    <div class="lecturers-item-wrapper">
                        <a href="#"><img class="img-responsive" src="{{ ('student/img/team/18.jpg')}}" alt="team"></a>
                        <div class="lecturers-content-wrapper">
                            <h3><a href="#">Daziy Millar</a></h3>
                            <span>Senior Finance Lecturer</span>
                            <p>Eimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                                industummy text.</p>
                            <ul class="lecturers-social">
                                <li><a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 cse english medical">
                <div class="single-item">
                    <div class="lecturers-item-wrapper">
                        <a href="#"><img class="img-responsive" src="{{ ('student/img/team/19.jpg')}}" alt="team"></a>
                        <div class="lecturers-content-wrapper">
                            <h3><a href="#">David Lipu</a></h3>
                            <span>Senior Finance Lecturer</span>
                            <p>Eimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                                industummy text.</p>
                            <ul class="lecturers-social">
                                <li><a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection