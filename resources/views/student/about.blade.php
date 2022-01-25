@extends('student-layout.master')
<title>Student | About</title>
@section('content')
<div class="inner-page-banner-area" style="background-image: url('student/img/banner/5.jpg');">
    <div class="container">
        <div class="pagination-area">
            <h1>About us </h1>
            <ul>
                <li><a href="{{ route('home')}}">Home</a> -</li>
                <li>About</li>
            </ul>
        </div>
    </div>
</div>
<div class="about-page1-area">
    <div class="container">
        <div class="row about-page1-inner">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="about-page-content-holder">
                    <div class="content-box">
                        <h2>Who We Are</h2>
                        <p>Tmply dummy text of the printing and typesetting indust Lorem Ipsum has been theindustry's
                            standard dummy text ever since simply dummy text of the printing and etypesetting industry.
                            Lorem Ipsum has been the induststandard dummy text ever since en an unknown printer took a
                            galley of type scrambledmaining.</p>
                    </div>
                    <div class="content-box">
                        <h2>What We Do</h2>
                        <p>Tmply dummy text of the printing and typesetting indust Lorem Ipsum has been theindustry's
                            standard dummy text ever since simply dummy text of the printing and etypesetting industry.
                            Lorem Ipsum has been the induststandard dummy text ever since en an unknown printer took a
                            galley of type scrambledmaining.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="about-page-img-holder">
                    <img src="{{ asset('student/img/about/2.jpg')}}" class="img-responsive" alt="about">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="certificate-area">
    <div class="container">
        <div class="rc-carousel" data-loop="true" data-items="4" data-margin="30" data-autoplay="true"
            data-autoplay-timeout="10000" data-smart-speed="2000" data-dots="false" data-nav="false"
            data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="false" data-r-x-small-dots="false"
            data-r-x-medium="2" data-r-x-medium-nav="false" data-r-x-medium-dots="false" data-r-small="3"
            data-r-small-nav="false" data-r-small-dots="false" data-r-medium="4" data-r-medium-nav="false"
            data-r-medium-dots="false" data-r-large="4" data-r-large-nav="false" data-r-large-dots="false">
            <div class="single-item">
                <div class="single-item-wrapper">
                    <img src="{{ asset('student/img/certificate/1.jpg')}}" class="img-responsive" alt="certificate">
                </div>
            </div>
            <div class="single-item">
                <div class="single-item-wrapper">
                    <img src="{{ asset('student/img/certificate/2.jpg')}}" class="img-responsive" alt="certificate">
                </div>
            </div>
            <div class="single-item">
                <div class="single-item-wrapper">
                    <img src="{{ asset('student/img/certificate/3.jpg')}}" class="img-responsive" alt="certificate">
                </div>
            </div>
            <div class="single-item">
                <div class="single-item-wrapper">
                    <img src="{{ asset('student/img/certificate/4.jpg')}}" class="img-responsive" alt="certificate">
                </div>
            </div>
            <div class="single-item">
                <div class="single-item-wrapper">
                    <img src="{{ asset('student/img/certificate/1.jpg')}}" class="img-responsive" alt="certificate">
                </div>
            </div>
            <div class="single-item">
                <div class="single-item-wrapper">
                    <img src="{{ asset('student/img/certificate/2.jpg')}}" class="img-responsive" alt="certificate">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="lecturers-area">
    <div class="container">
        <h2 class="title-default-left">Our Skilled Lecturers</h2>
    </div>
    <div class="container">
        <div class="rc-carousel" data-loop="true" data-items="4" data-margin="30" data-autoplay="true"
            data-autoplay-timeout="10000" data-smart-speed="2000" data-dots="false" data-nav="true"
            data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true" data-r-x-small-dots="false"
            data-r-x-medium="2" data-r-x-medium-nav="true" data-r-x-medium-dots="false" data-r-small="3"
            data-r-small-nav="true" data-r-small-dots="false" data-r-medium="4" data-r-medium-nav="true"
            data-r-medium-dots="false" data-r-large="4" data-r-large-nav="true" data-r-large-dots="false">
            <div class="single-item">
                <div class="single-item-wrapper">
                    <div class="lecturers-img-wrapper">
                        <a href="#"><img class="img-responsive" src="{{ asset('student/img/team/1.jpg')}}" alt="team"></a>
                    </div>
                    <div class="lecturers-content-wrapper">
                        <h3 class="item-title"><a href="#">Rosy Janner</a></h3>
                        <span class="item-designation">Senior Finance Lecturer</span>
                        <ul class="lecturers-social">
                            <li><a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="single-item">
                <div class="single-item-wrapper">
                    <div class="lecturers-img-wrapper">
                        <a href="#"><img class="img-responsive" src="{{ asset('student/img/team/2.jpg')}}" alt="team"></a>
                    </div>
                    <div class="lecturers-content-wrapper">
                        <h3 class="item-title"><a href="#">Mike Hussy</a></h3>
                        <span class="item-designation">Senior Finance Lecturer</span>
                        <ul class="lecturers-social">
                            <li><a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="single-item">
                <div class="single-item-wrapper">
                    <div class="lecturers-img-wrapper">
                        <a href="#"><img class="img-responsive" src="{{ asset('student/img/team/3.jpg')}}" alt="team"></a>
                    </div>
                    <div class="lecturers-content-wrapper">
                        <h3 class="item-title"><a href="#">Daziy Millar</a></h3>
                        <span class="item-designation">Senior Finance Lecturer</span>
                        <ul class="lecturers-social">
                            <li><a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="single-item">
                <div class="single-item-wrapper">
                    <div class="lecturers-img-wrapper">
                        <a href="#"><img class="img-responsive" src="{{ asset('student/img/team/4.jpg')}}" alt="team"></a>
                    </div>
                    <div class="lecturers-content-wrapper">
                        <h3 class="item-title"><a href="#">Kazi Fahim</a></h3>
                        <span class="item-designation">Senior Finance Lecturer</span>
                        <ul class="lecturers-social">
                            <li><a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="single-item">
                <div class="single-item-wrapper">
                    <div class="lecturers-img-wrapper">
                        <a href="#"><img class="img-responsive" src="{{ asset('student/img/team/1.jpg')}}" alt="team"></a>
                    </div>
                    <div class="lecturers-content-wrapper">
                        <h3 class="item-title"><a href="#">Rosy Janner</a></h3>
                        <span class="item-designation">Senior Finance Lecturer</span>
                        <ul class="lecturers-social">
                            <li><a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="single-item">
                <div class="single-item-wrapper">
                    <div class="lecturers-img-wrapper">
                        <a href="#"><img class="img-responsive" src="{{ asset('student/img/team/2.jpg')}}" alt="team"></a>
                    </div>
                    <div class="lecturers-content-wrapper">
                        <h3 class="item-title"><a href="#">Mike Hussy</a></h3>
                        <span class="item-designation">Senior Finance Lecturer</span>
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
<div class="counter-area bg-primary-deep" style="background-image: url('student/img/banner/4.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 counter1-box wow fadeInUp" data-wow-duration=".5s"
                data-wow-delay=".20s">
                <h2 class="about-counter title-bar-counter" data-num="80">80</h2>
                <p>PROFESSIONAL TEACHER</p>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 counter1-box wow fadeInUp" data-wow-duration=".5s"
                data-wow-delay=".40s">
                <h2 class="about-counter title-bar-counter" data-num="20">20</h2>
                <p>NEWS COURSES EVERY YEARS</p>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 counter1-box wow fadeInUp" data-wow-duration=".5s"
                data-wow-delay=".60s">
                <h2 class="about-counter title-bar-counter" data-num="56">56</h2>
                <p>NEWS COURSES EVERY YEARS</p>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 counter1-box wow fadeInUp" data-wow-duration=".5s"
                data-wow-delay=".80s">
                <h2 class="about-counter title-bar-counter" data-num="77">77</h2>
                <p>REGISTERED STUDENTS</p>
            </div>
        </div>
    </div>
</div>
<div class="students-say-area">
    <h2 class="title-default-center">What Our Students Say</h2>
    <div class="container">
        <div class="rc-carousel" data-loop="true" data-items="2" data-margin="30" data-autoplay="true"
            data-autoplay-timeout="10000" data-smart-speed="2000" data-dots="true" data-nav="false"
            data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="false" data-r-x-small-dots="true"
            data-r-x-medium="2" data-r-x-medium-nav="false" data-r-x-medium-dots="true" data-r-small="2"
            data-r-small-nav="false" data-r-small-dots="true" data-r-medium="2" data-r-medium-nav="false"
            data-r-medium-dots="true" data-r-large="2" data-r-large-nav="false" data-r-large-dots="true">
            <div class="single-item">
                <div class="single-item-wrapper">
                    <div class="profile-img-wrapper">
                        <a href="#" class="profile-img"><img class="profile-img-responsive img-circle"
                                src="{{ asset('student/img/students/1.jpg')}}" alt="Testimonial"></a>
                    </div>
                    <div class="tlp-tm-content-wrapper">
                        <h3 class="item-title"><a href="#">Rosy Janner</a></h3>
                        <span class="item-designation">UI Designer</span>
                        <ul class="rating-wrapper">
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        </ul>
                        <div class="item-content">Pellentesque tellus arcu, laoreet volutpavenenatis molestPellentesque
                            commodo lorem lectus pretium vehicula.</div>
                    </div>
                </div>
            </div>
            <div class="single-item">
                <div class="single-item-wrapper">
                    <div class="profile-img-wrapper">
                        <a href="#" class="profile-img"><img class="profile-img-responsive img-circle"
                                src="{{ asset('student/img/students/2.jpg')}}" alt="Testimonial"></a>
                    </div>
                    <div class="tlp-tm-content-wrapper">
                        <h3 class="item-title"><a href="#">Dainel Dina</a></h3>
                        <span class="item-designation">Manager</span>
                        <ul class="rating-wrapper">
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        </ul>
                        <div class="item-content">Pellentesque tellus arcu, laoreet volutpavenenatis molestPellentesque
                            commodo lorem lectus pretium vehicula.</div>
                    </div>
                </div>
            </div>
            <div class="single-item">
                <div class="single-item-wrapper">
                    <div class="profile-img-wrapper">
                        <a href="#" class="profile-img"><img class="profile-img-responsive img-circle"
                                src="{{ asset('student/img/students/1.jpg')}}" alt="Testimonial"></a>
                    </div>
                    <div class="tlp-tm-content-wrapper">
                        <h3 class="item-title"><a href="#">Rosy Janner</a></h3>
                        <span class="item-designation">UI Designer</span>
                        <ul class="rating-wrapper">
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        </ul>
                        <div class="item-content">Pellentesque tellus arcu, laoreet volutpavenenatis molestPellentesque
                            commodo lorem lectus pretium vehicula.</div>
                    </div>
                </div>
            </div>
            <div class="single-item">
                <div class="single-item-wrapper">
                    <div class="profile-img-wrapper">
                        <a href="#" class="profile-img"><img class="profile-img-responsive img-circle"
                                src="{{ asset('student/img/students/2.jpg')}}" alt="Testimonial"></a>
                    </div>
                    <div class="tlp-tm-content-wrapper">
                        <h3 class="item-title"><a href="#">Dainel Dina</a></h3>
                        <span class="item-designation">Manager</span>
                        <ul class="rating-wrapper">
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        </ul>
                        <div class="item-content">Pellentesque tellus arcu, laoreet volutpavenenatis molestPellentesque
                            commodo lorem lectus pretium vehicula.</div>
                    </div>
                </div>
            </div>
            <div class="single-item">
                <div class="single-item-wrapper">
                    <div class="profile-img-wrapper">
                        <a href="#" class="profile-img"><img class="profile-img-responsive img-circle"
                                src="{{ asset('student/img/students/1.jpg')}}" alt="Testimonial"></a>
                    </div>
                    <div class="tlp-tm-content-wrapper">
                        <h3 class="item-title"><a href="#">Rosy Janner</a></h3>
                        <span class="item-designation">UI Designer</span>
                        <ul class="rating-wrapper">
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        </ul>
                        <div class="item-content">Pellentesque tellus arcu, laoreet volutpavenenatis molestPellentesque
                            commodo lorem lectus pretium vehicula.</div>
                    </div>
                </div>
            </div>
            <div class="single-item">
                <div class="single-item-wrapper">
                    <div class="profile-img-wrapper">
                        <a href="#" class="profile-img"><img class="profile-img-responsive img-circle"
                                src="{{ asset('student/img/students/2.jpg')}}" alt="Testimonial"></a>
                    </div>
                    <div class="tlp-tm-content-wrapper">
                        <h3 class="item-title"><a href="#">Dainel Dina</a></h3>
                        <span class="item-designation">Manager</span>
                        <ul class="rating-wrapper">
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        </ul>
                        <div class="item-content">Pellentesque tellus arcu, laoreet volutpavenenatis molestPellentesque
                            commodo lorem lectus pretium vehicula.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-divider"></div>
<div class="brand-area">
    <div class="container">
        <div class="rc-carousel" data-loop="true" data-items="4" data-margin="30" data-autoplay="true"
            data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="false" data-nav="false"
            data-nav-speed="false" data-r-x-small="2" data-r-x-small-nav="false" data-r-x-small-dots="false"
            data-r-x-medium="3" data-r-x-medium-nav="false" data-r-x-medium-dots="false" data-r-small="4"
            data-r-small-nav="false" data-r-small-dots="false" data-r-medium="4" data-r-medium-nav="false"
            data-r-medium-dots="false" data-r-large="4" data-r-large-nav="false" data-r-large-dots="false">
            <div class="brand-area-box">
                <a href="#"><img src="{{ asset('student/img/brand/1.jpg')}}" alt="brand"></a>
            </div>
            <div class="brand-area-box">
                <a href="#"><img src="{{ asset('student/img/brand/2.jpg')}}" alt="brand"></a>
            </div>
            <div class="brand-area-box">
                <a href="#"><img src="{{ asset('student/img/brand/3.jpg')}}" alt="brand"></a>
            </div>
            <div class="brand-area-box">
                <a href="#"><img src="{{ asset('student/img/brand/4.jpg')}}" alt="brand"></a>
            </div>
            <div class="brand-area-box">
                <a href="#"><img src="{{ asset('student/img/brand/1.jpg')}}" alt="brand"></a>
            </div>
            <div class="brand-area-box">
                <a href="#"><img src="{{ asset('student/img/brand/2.jpg')}}" alt="brand"></a>
            </div>
            <div class="brand-area-box">
                <a href="#"><img src="{{ asset('student/img/brand/3.jpg')}}" alt="brand"></a>
            </div>
            <div class="brand-area-box">
                <a href="#"><img src="{{ asset('student/img/brand/4.jpg')}}" alt="brand"></a>
            </div>
        </div>
    </div>
</div>
@endsection