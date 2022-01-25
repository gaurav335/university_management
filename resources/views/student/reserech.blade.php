@extends('student-layout.master')
<title>Student | Research</title>
@section('content')
<div class="inner-page-banner-area" style="background-image: url('student/img/banner/5.jpg');">
    <div class="container">
        <div class="pagination-area">
            <h1>Research</h1>
            <ul>
                <li><a href="{{ route('home')}}">Home</a> -</li>
                <li>Research</li>
            </ul>
        </div>
    </div>
</div>
<!-- Inner Page Banner Area End Here -->
<!-- Research Page 1 Area Start Here -->
<div class="research-page1-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="research-box1">
                            <img src="{{ asset('student/img/research/1.jpg')}}" class="img-responsive" alt="research">
                            <h3 class="sidebar-title"><a href="#">UI-UX Web Design</a></h3>
                            <p>Bimply dummy text of the printing and typesetting istryrem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="research-box1">
                            <img src="{{ asset('student/img/research/2.jpg')}}" class="img-responsive" alt="research">
                            <h3 class="sidebar-title"><a href="#">Robort Space Research</a></h3>
                            <p>Bimply dummy text of the printing and typesetting istryrem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="research-box1">
                            <img src="{{ asset('student/img/research/3.jpg')}}" class="img-responsive" alt="research">
                            <h3 class="sidebar-title"><a href="#">Space Rounded Research</a></h3>
                            <p>Bimply dummy text of the printing and typesetting istryrem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="research-box1">
                            <img src="{{ asset('student/img/research/4.jpg')}}" class="img-responsive" alt="research">
                            <h3 class="sidebar-title"><a href="#">Medical Machines</a></h3>
                            <p>Bimply dummy text of the printing and typesetting istryrem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="research-box1">
                            <img src="{{ asset('student/img/research/5.jpg')}}" class="img-responsive" alt="research">
                            <h3 class="sidebar-title"><a href="#">Gymplash Study</a></h3>
                            <p>Bimply dummy text of the printing and typesetting istryrem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="research-box1">
                            <img src="{{ asset('student/img/research/6.jpg')}}" class="img-responsive" alt="research">
                            <h3 class="sidebar-title"><a href="#">Robort Space Research</a></h3>
                            <p>Bimply dummy text of the printing and typesetting istryrem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.</p>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <ul class="pagination-left">
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
                            <h3 class="sidebar-title">Latest Research</h3>
                            <div class="sidebar-latest-research-area">
                                <ul>
                                    <li>
                                        <div class="latest-research-img">
                                            <a href="#"><img src="{{ asset('student/img/sidebar/8.jpg')}}" class="img-responsive" alt="skilled"></a>
                                        </div>
                                        <div class="latest-research-content">
                                            <h4>30 Nov, 2016</h4>
                                            <p>when an unknown printer took.</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="latest-research-img">
                                            <a href="#"><img src="{{ asset('student/img/sidebar/4.jpg')}}" class="img-responsive" alt="skilled"></a>
                                        </div>
                                        <div class="latest-research-content">
                                            <h4>10 Aug, 2016</h4>
                                            <p>when an unknown printer took.</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="latest-research-img">
                                            <a href="#"><img src="{{ asset('student/img/sidebar/9.jpg')}}" class="img-responsive" alt="skilled"></a>
                                        </div>
                                        <div class="latest-research-content">
                                            <h4>05 Jul, 2016</h4>
                                            <p>when an unknown printer took.</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="latest-research-img">
                                            <a href="#"><img src="{{ asset('student/img/sidebar/10.jpg')}}" class="img-responsive" alt="skilled"></a>
                                        </div>
                                        <div class="latest-research-content">
                                            <h4>30 Feb, 2016</h4>
                                            <p>when an unknown printer took.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-box">
                        <div class="sidebar-add-area overlay-primaryColor">
                            <img src="{{ asset('student/img/banner/7.jpg')}}" class="img-responsive" alt="banner">
                            <a href="#" class="sidebar-ghost-btn">Apply Now!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
