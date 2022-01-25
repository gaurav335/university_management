@extends('student-layout.master')
<title>Student</title>
@section('content')
<div class="slider1-area overlay-default">
            <div class="bend niceties preview-1">
                <div id="ensign-nivoslider-3" class="slides">
                    <img src="{{ asset('student/img/slider/2-1.jpg')}}" alt="slider" title="#slider-direction-1" />
                    <img src="{{ asset('student/img/slider/2-2.jpg')}}" alt="slider" title="#slider-direction-2" />
                    <img src="{{ asset('student/img/slider/1-2.jpg')}}" alt="slider" title="#slider-direction-3" />
                </div>
                <div id="slider-direction-1" class="t-cn slider-direction">
                    <div class="slider-content s-tb slide-1">
                        <div class="title-container s-tb-c">
                            <div class="title1">Best Education For UI Design</div>
                            <p>Emply dummy text of the printing and typesetting industry orem Ipsum has been the industry's standard
                                <br>dummy text ever sinceprinting and typesetting industry. </p>
                            <div class="slider-btn-area">
                                <a href="#" class="default-big-btn">Start a Course</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="slider-direction-2" class="t-cn slider-direction">
                    <div class="slider-content s-tb slide-2">
                        <div class="title-container s-tb-c">
                            <div class="title1">Best Education For HTML Template</div>
                            <p>Emply dummy text of the printing and typesetting industry orem Ipsum has been the industry's standard
                                <br>dummy text ever sinceprinting and typesetting industry. </p>
                            <div class="slider-btn-area">
                                <a href="#" class="default-big-btn">Start a Course</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="slider-direction-3" class="t-cn slider-direction">
                    <div class="slider-content s-tb slide-3">
                        <div class="title-container s-tb-c">
                            <div class="title1">Best Education Into PHP</div>
                            <p>Emply dummy text of the printing and typesetting industry orem Ipsum has been the industry's standard
                                <br>dummy text ever sinceprinting and typesetting industry. </p>
                            <div class="slider-btn-area">
                                <a href="#" class="default-big-btn">Start a Course</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slider 1 Area End Here -->
        <!-- About 2 Area Start Here -->
        <div class="about2-area">
            <div class="container">
                <h1 class="about-title">Welcome To Academics</h1>
                <p class="about-sub-title">Tmply dummy text of the printing and typesetting industry. Lorem Ipsum has been theindustry's standard dummy text ever since the 1500s, when an unknown printer took.</p>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 wow fadeIn" data-wow-duration="2s" data-wow-delay=".1s">
                        <div class="service-box2">
                            <div class="service-box-icon">
                                <a href="#"><i class="fa fa-graduation-cap" aria-hidden="true"></i></a>
                            </div>
                            <h3><a href="#">Scholarship Facility</a></h3>
                            <p>Dorem Ipsum has been the industry's standard dummy text ever since the en an unknown printer galley dear.</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 wow fadeIn" data-wow-duration="2s" data-wow-delay=".4s">
                        <div class="service-box2">
                            <div class="service-box-icon">
                                <a href="#"><i class="fa fa-user" aria-hidden="true"></i></a>
                            </div>
                            <h3><a href="#">Skilled Lecturers</a></h3>
                            <p>Dorem Ipsum has been the industry's standard dummy text ever since the en an unknown printer galley dear.</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 wow fadeIn" data-wow-duration="2s" data-wow-delay=".7s">
                        <div class="service-box2">
                            <div class="service-box-icon">
                                <a href="#"><i class="fa fa-book" aria-hidden="true"></i></a>
                            </div>
                            <h3><a href="#">Book Library & Store</a></h3>
                            <p>Dorem Ipsum has been the industry's standard dummy text ever since the en an unknown printer galley dear.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About 2 Area End Here -->
        <!-- Featured Area Start Here -->
        <div class="featured-area bg-common-style" style="background-image: url('student/img/featured/back.jpg');">
            <div class="container">
                <h2 class="title-default-textPrimary-left">Featured Courses</h2>
            </div>
            <div class="container">
                <div class="row featured-wrapper" id="gallery-wrapper">
                    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                        <div class="featured-box">
                            <div class="featured-img-holder hvr-bounce-to-right">
                                <img src="{{ asset('student/img/featured/1.jpg')}}" class="img-responsive" alt="featured">
                                <a href="{{ asset('student/img/featured/1.jpg')}}" class="zoom"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                            </div>
                            <div class="featured-content-holder">
                                <h3><a href="#">Basic Philosopphy</a></h3>
                                <p>Rimply dummy text of the printing and typesetting industry when an unknown printer took a galley scrambled.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                        <div class="featured-box">
                            <div class="featured-img-holder hvr-bounce-to-right">
                                <img src="{{ asset('student/img/featured/2.jpg')}}" class="img-responsive" alt="featured">
                                <a href="{{ asset('student/img/featured/2.jpg')}}" class="zoom"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                            </div>
                            <div class="featured-content-holder">
                                <h3><a href="#">GMET</a></h3>
                                <p>Rmply dummy printing ypesetting industry it’s free demo.</p>
                            </div>
                        </div>
                        <div class="featured-box">
                            <div class="featured-img-holder hvr-bounce-to-right">
                                <img src="{{ asset('student/img/featured/3.jpg')}}" class="img-responsive" alt="featured">
                                <a href="{{ asset('student/img/featured/3.jpg')}}" class="zoom"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                            </div>
                            <div class="featured-content-holder">
                                <h3><a href="#">CSE Science</a></h3>
                                <p>Rmply dummy printing ypesetting industry it’s free demo.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                        <div class="featured-box">
                            <div class="featured-img-holder hvr-bounce-to-right">
                                <img src="{{ asset('student/img/featured/4.jpg')}}" class="img-responsive" alt="featured">
                                <a href="{{ asset('student/img/featured/4.jpg')}}" class="zoom"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                            </div>
                            <div class="featured-content-holder">
                                <h3><a href="#">Regular MBA</a></h3>
                                <p>Rmply dummy printing ypesetting industry it’s free demo.</p>
                            </div>
                        </div>
                        <div class="featured-box">
                            <div class="featured-img-holder hvr-bounce-to-right">
                                <img src="{{ asset('student/img/featured/5.jpg')}}" class="img-responsive" alt="featured">
                                <a href="{{ asset('student/img/featured/5.jpg')}}" class="zoom"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                            </div>
                            <div class="featured-content-holder">
                                <h3><a href="#">Graphic Design</a></h3>
                                <p>Rmply dummy printing ypesetting industry it’s free demo.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="view-all-btn-area">
                    <a href="#" class="ghost-btn-big">View All Corses</a>
                </div>
            </div>
        </div>
        <!-- Featured Area End Here -->
        <!-- Lecturers Area Start Here -->
        <div class="lecturers-area">
            <div class="container">
                <h2 class="title-default-left">Our Skilled Lecturers</h2>
            </div>
            <div class="container">
                <div class="rc-carousel" data-loop="true" data-items="4" data-margin="30" data-autoplay="true" data-autoplay-timeout="10000" data-smart-speed="2000" data-dots="false" data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true"
                    data-r-x-small-dots="false" data-r-x-medium="2" data-r-x-medium-nav="true" data-r-x-medium-dots="false" data-r-small="3" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="4" data-r-medium-nav="true" data-r-medium-dots="false"
                    data-r-large="4" data-r-large-nav="true" data-r-large-dots="false">
                    <div class="single-item">
                        <div class="lecturers1-item-wrapper">
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
                        <div class="lecturers1-item-wrapper">
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
                        <div class="lecturers1-item-wrapper">
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
                        <div class="lecturers1-item-wrapper">
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
                        <div class="lecturers1-item-wrapper">
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
                        <div class="lecturers1-item-wrapper">
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
        <!-- Lecturers Area End Here -->
        <!-- Video Area Start Here -->
        <div class="video-area overlay-video bg-common-style" style="background-image: url('{{ asset('student/img/banner/1.jpg')}}');">
            <div class="container">
                <div class="video-content">
                    <h2 class="video-title">Watch Campus Life Video Tour</h2>
                    <p class="video-sub-title">Vmply dummy text of the printing and typesetting industryorem
                        <br>Ipsum industry's standard dum an unknowramble.</p>
                    <a class="play-btn popup-youtube wow bounceInUp" data-wow-duration="2s" data-wow-delay=".1s" href="http://www.youtube.com/watch?v=1iIZeIy7TqM"><i class="fa fa-play" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <!-- Video Area End Here -->
        <!-- News and Event Area Start Here -->
        <div class="news-event-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 news-inner-area">
                        <h2 class="title-default-left">Latest News</h2>
                        <ul class="news-wrapper">
                            <li>
                                <div class="news-img-holder">
                                    <a href="#"><img src="{{ asset('student/img/news/1.jpg')}}" class="img-responsive" alt="news"></a>
                                </div>
                                <div class="news-content-holder">
                                    <h3><a href="single-news.html">Summer Course Start From 1st June</a></h3>
                                    <div class="post-date">June 15, 2022</div>
                                    <p>Pellentese turpis dignissim amet area ducation process facilitating Knowledge.</p>
                                </div>
                            </li>
                            <li>
                                <div class="news-img-holder">
                                    <a href="#"><img src="{{ asset('student/img/news/2.jpg')}}" class="img-responsive" alt="news"></a>
                                </div>
                                <div class="news-content-holder">
                                    <h3><a href="single-news.html">Guest Interview will Occur Soon</a></h3>
                                    <div class="post-date">June 15, 2022</div>
                                    <p>Pellentese turpis dignissim amet area ducation process facilitating Knowledge.</p>
                                </div>
                            </li>
                            <li>
                                <div class="news-img-holder">
                                    <a href="#"><img src="{{ asset('student/img/news/3.jpg')}}" class="img-responsive" alt="news"></a>
                                </div>
                                <div class="news-content-holder">
                                    <h3><a href="single-news.html">Easy English Learning Way</a></h3>
                                    <div class="post-date">June 15, 2022</div>
                                    <p>Pellentese turpis dignissim amet area ducation process facilitating Knowledge.</p>
                                </div>
                            </li>
                        </ul>
                        <div class="news-btn-holder">
                            <a href="#" class="view-all-accent-btn">View All</a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 event-inner-area">
                        <h2 class="title-default-left">Upcoming Events</h2>
                        <ul class="event-wrapper">
                            <li class="wow bounceInUp" data-wow-duration="2s" data-wow-delay=".1s">
                                <div class="event-calender-wrapper">
                                    <div class="event-calender-holder">
                                        <h3>26</h3>
                                        <p>Feb</p>
                                        <span>2022</span>
                                    </div>
                                </div>
                                <div class="event-content-holder">
                                    <h3><a href="single-event.html">Html MeetUp Conference 2022</a></h3>
                                    <p>Pellentese turpis dignissim amet area ducation process facilitating Knowledge. Pellentese turpis dignissim amet area ducation process facilitating Knowledge. Pellentese turpis dignissim amet area ducation.</p>
                                    <ul>
                                        <li>04:00 PM - 06:00 PM</li>
                                        <li>Australia , Melborn</li>
                                    </ul>
                                </div>
                            </li>
                            <li class="wow bounceInUp" data-wow-duration="2s" data-wow-delay=".3s">
                                <div class="event-calender-wrapper">
                                    <div class="event-calender-holder">
                                        <h3>26</h3>
                                        <p>Feb</p>
                                        <span>2022</span>
                                    </div>
                                </div>
                                <div class="event-content-holder">
                                    <h3><a href="single-event.html">Workshop On UI Design</a></h3>
                                    <p>Pellentese turpis dignissim amet area ducation process facilitating Knowledge. Pellentese turpis dignissim amet area ducation process facilitating Knowledge. Pellentese turpis dignissim amet area ducation.</p>
                                    <ul>
                                        <li>03:00 PM - 05:00 PM</li>
                                        <li>Australia , Melborn</li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                        <div class="event-btn-holder">
                            <a href="#" class="view-all-primary-btn">View All</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- News and Event Area End Here -->
        <!-- Counter Area Start Here -->
        <div class="counter-area bg-primary-deep" style="background-image: url('student/img/banner/4.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 counter1-box wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".20s">
                        <h2 class="about-counter title-bar-counter" data-num="80">80</h2>
                        <p>PROFESSIONAL TEACHER</p>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 counter1-box wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".40s">
                        <h2 class="about-counter title-bar-counter" data-num="20">20</h2>
                        <p>NEWS COURSES EVERY YEARS</p>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 counter1-box wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".60s">
                        <h2 class="about-counter title-bar-counter" data-num="56">56</h2>
                        <p>NEWS COURSES EVERY YEARS</p>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 counter1-box wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".80s">
                        <h2 class="about-counter title-bar-counter" data-num="77">77</h2>
                        <p>REGISTERED STUDENTS</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Counter Area End Here -->
        <!-- Publications Area Start Here -->
        <div class="publications-area">
            <div class="container">
                <h2 class="title-default-left">Our Publications</h2>
            </div>
            <div class="container">
                <div class="rc-carousel" data-loop="true" data-items="4" data-margin="30" data-autoplay="true" data-autoplay-timeout="10000" data-smart-speed="2000" data-dots="false" data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true"
                    data-r-x-small-dots="false" data-r-x-medium="2" data-r-x-medium-nav="true" data-r-x-medium-dots="false" data-r-small="3" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="4" data-r-medium-nav="true" data-r-medium-dots="false"
                    data-r-large="4" data-r-large-nav="true" data-r-large-dots="false">
                    <div class="single-item">
                        <div class="single-item-wrapper">
                            <div class="publications-img-wrapper">
                                <a href="#"><img class="img-responsive" src="{{ asset('student/img/product/1.jpg')}}" alt="product"></a>
                            </div>
                            <div class="publications-content-wrapper">
                                <h3 class="item-title"><a href="#">Robert - Philosophy</a></h3>
                                <span class="item-price">$350</span>
                            </div>
                            <div class="buy-now-btn-area">
                                <a href="#" class="ghost-btn">Buy Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="single-item">
                        <div class="single-item-wrapper">
                            <div class="publications-img-wrapper">
                                <a href="#"><img class="img-responsive" src="{{ asset('student/img/product/2.jpg')}}" alt="product"></a>
                            </div>
                            <div class="publications-content-wrapper">
                                <h3 class="item-title"><a href="#">GMAT</a></h3>
                                <span class="item-price">$250</span>
                            </div>
                            <div class="buy-now-btn-area">
                                <a href="#" class="ghost-btn">Buy Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="single-item">
                        <div class="single-item-wrapper">
                            <div class="publications-img-wrapper">
                                <a href="#"><img class="img-responsive" src="{{ asset('student/img/product/3.jpg')}}" alt="product"></a>
                            </div>
                            <div class="publications-content-wrapper">
                                <h3 class="item-title"><a href="#">Money Book - Finance</a></h3>
                                <span class="item-price">$430</span>
                            </div>
                            <div class="buy-now-btn-area">
                                <a href="#" class="ghost-btn">Buy Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="single-item">
                        <div class="single-item-wrapper">
                            <div class="publications-img-wrapper">
                                <a href="#"><img class="img-responsive" src="{{ asset('student/img/product/4.jpg')}}" alt="product"></a>
                            </div>
                            <div class="publications-content-wrapper">
                                <h3 class="item-title"><a href="#">Service Marketing</a></h3>
                                <span class="item-price">$190</span>
                            </div>
                            <div class="buy-now-btn-area">
                                <a href="#" class="ghost-btn">Buy Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="single-item">
                        <div class="single-item-wrapper">
                            <div class="publications-img-wrapper">
                                <a href="#"><img class="img-responsive" src="{{ asset('student/img/product/1.jpg')}}" alt="product"></a>
                            </div>
                            <div class="publications-content-wrapper">
                                <h3 class="item-title"><a href="#">Money Book - Finance</a></h3>
                                <span class="item-price">$430</span>
                            </div>
                            <div class="buy-now-btn-area">
                                <a href="#" class="ghost-btn">Buy Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="single-item">
                        <div class="single-item-wrapper">
                            <div class="publications-img-wrapper">
                                <a href="#"><img class="img-responsive" src="{{ asset('student/img/product/3.jpg')}}" alt="product"></a>
                            </div>
                            <div class="publications-content-wrapper">
                                <h3 class="item-title"><a href="#">Service Marketing</a></h3>
                                <span class="item-price">$190</span>
                            </div>
                            <div class="buy-now-btn-area">
                                <a href="#" class="ghost-btn">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Publications Area End Here -->
        <!-- Students Join 2 Area Start Here -->
        <div class="students-join2-area">
            <div class="container">
                <div class="students-join2-wrapper">
                    <div class="students-join2-left">
                        <div id="ri-grid" class="author-banner-bg ri-grid header text-center">
                            <ul class="ri-grid-list">
                                <li>
                                    <a href="#"><img src="{{ asset('student/img/students/student1.jpg')}}" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('student/img/students/student2.jpg')}}" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('student/img/students/student3.jpg')}}" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('student/img/students/student4.jpg')}}" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('student/img/students/student5.jpg')}}" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('student/img/students/student6.jpg')}}" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('student/img/students/student7.jpg')}}" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('student/img/students/student8.jpg')}}" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('student/img/students/student1.jpg')}}" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('student/img/students/student2.jpg')}}" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('student/img/students/student3.jpg')}}" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('student/img/students/student4.jpg')}}" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('student/img/students/student5.jpg')}}" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('student/img/students/student6.jpg')}}" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('student/img/students/student7.jpg')}}" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('student/img/students/student8.jpg')}}" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('student/img/students/student1.jpg')}}" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('student/img/students/student2.jpg')}}" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('student/img/students/student3.jpg')}}" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('student/img/students/student4.jpg')}}" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('student/img/students/student5.jpg')}}" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('student/img/students/student6.jpg')}}" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('student/img/students/student7.jpg')}}" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('student/img/students/student8.jpg')}}" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('student/img/students/student1.jpg')}}" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('student/img/students/student2.jpg')}}" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('student/img/students/student3.jpg')}}" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('student/img/students/student4.jpg')}}" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('student/img/students/student5.jpg')}}" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('student/img/students/student6.jpg')}}" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('student/img/students/student7.jpg')}}" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('student/img/students/student8.jpg')}}" alt=""></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="students-join2-right">
                        <div>
                            <h2>Join<span> 29,12,093</span> Students.</h2>
                            <a href="#" class="join-now-primary-btn">Join Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Students Join 2 Area End Here -->
        <!-- Brand Area Start Here -->
        <div class="brand-area">
            <div class="container">
                <div class="rc-carousel" data-loop="true" data-items="4" data-margin="30" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="false" data-nav="false" data-nav-speed="false" data-r-x-small="2" data-r-x-small-nav="false"
                    data-r-x-small-dots="false" data-r-x-medium="3" data-r-x-medium-nav="false" data-r-x-medium-dots="false" data-r-small="4" data-r-small-nav="false" data-r-small-dots="false" data-r-medium="4" data-r-medium-nav="false" data-r-medium-dots="false"
                    data-r-large="4" data-r-large-nav="false" data-r-large-dots="false">
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