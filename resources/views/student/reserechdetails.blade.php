@extends('student-layout.master')
<title>Student | ReserchDetails</title>
@section('content')
<div class="inner-page-banner-area" style="background-image: url('student/img/banner/5.jpg');">
            <div class="container">
                <div class="pagination-area">
                    <h1>Research Details</h1>
                    <ul>
                        <li><a href="{{ route('home')}}">Home</a> -</li>
                        <li>ReserchDetails</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Inner Page Banner Area End Here -->
        <!-- Research Details Page Area Start Here -->
        <div class="research-details-page-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12">
                        <div class="row research-details-inner">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <img src="{{ asset('student/img/research/16.jpg')}}" class="img-responsive" alt="research">
                                <h2 class="title-default-left-bold title-bar-high"><a href="#">Future UX Design Tecnique</a></h2>
                                <p>Bimply dummy text of the printing and typesetting istryrem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchangedwhen an unknown printer took a galley of type and scrambled.when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged</p>
                                <p>Bimply dummy text of the printing and typesetting istryrem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
                                <p><span>Bimply dummy text of the printing and typesetting istryrem Ipsum has been the industry's standard dummy type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchan scrambled.</span></p>
                                <p>Bimply dummy text of the printing and typesetting istryrem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchangedwhen an unknown printer took a galley of type and scrambled.when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged</p>
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
