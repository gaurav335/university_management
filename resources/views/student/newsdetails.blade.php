@extends('student-layout.master')
<title>Student | NewsDetails</title>
@section('content')
<div class="inner-page-banner-area" style="background-image: url('student/img/banner/5.jpg');">
    <div class="container">
        <div class="pagination-area">
            <h1>News Details</h1>
            <ul>
                <li><a href="{{ route('home')}}">Home</a> -</li>
                <li>Details</li>
            </ul>
        </div>
    </div>
</div>
<div class="news-details-page-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12">
                <div class="row news-details-page-inner">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="news-img-holder">
                            <img src="{{ asset('student/img/news/13.jpg')}}" class="img-responsive" alt="research">
                            <ul class="news-date1">
                                <li>27 Dec</li>
                                <li>2020</li>
                            </ul>
                        </div>
                        <h2 class="title-default-left-bold-lowhight"><a href="#">How To Build HTML To WordPress
                                Site?</a></h2>
                        <ul class="title-bar-high news-comments">
                            <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i><span>By</span> Admin</a></li>
                            <li><a href="#"><i class="fa fa-tags" aria-hidden="true"></i>Business</a></li>
                            <li><a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i><span>(03)</span>
                                    Comments</a></li>
                        </ul>
                        <p>Bimply dummy text of the printing and typesetting istryrem Ipsum has been the industry's
                            standard dummy text ever since the 1500s, when an unknown printer.when an unknown printer
                            took a galley of type and scrambled it to
                            make a type specimen book. It has survived not only five centuriesp into electronic.simply
                            dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                            standard dummy text ever since the
                            1500s, when an unknown printer took a galley of type and scrambled it to make a type
                            specimen book.</p>
                        <p><span>Bimply dummy text of the printing and typesetting istryrem Ipsum has been the
                                industry's standard dummy type specimen book. It has survived not only five centuries,
                                but also the leap into electronic typesetting, remaining essentially unchan
                                scrambled.</span></p>
                        <p>Bimply dummy text of the printing and typesetting istryrem Ipsum has been the industry's
                            standard dummy text ever since the 1500s, when an unknown printer.when an unknown printer
                            took a galley of type and scrambled it to
                            make a type specimen book. It has survived not only five centuriesp into electronic.simply
                            dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                            standard dummy.</p>
                        <ul class="news-social">
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        </ul>
                        <div class="course-details-comments">
                            <h3 class="sidebar-title">(4) Comments</h3>
                            <div class="media">
                                <a href="#" class="pull-left">
                                    <img alt="Comments" src="{{ asset('student/img/course/16.jpg')}}" class="media-object">
                                </a>
                                <div class="media-body">
                                    <h3><a href="#">Greg Christman</a></h3>
                                    <h4>Excellent course!</h4>
                                    <p>Rimply dummy text of the printinwhen an unknown printer took eype and scramb
                                        relofeletogimply dummy and typesetting industry.</p>
                                </div>
                            </div>
                            <div class="media">
                                <a href="#" class="pull-left">
                                    <img alt="Comments" src="{{ asset('student/img/course/17.jpg')}}" class="media-object">
                                </a>
                                <div class="media-body">
                                    <h3><a href="#">Lora Ekram</a></h3>
                                    <h4>Excellent course!</h4>
                                    <p>Rimply dummy text of the printinwhen an unknown printer took eype and scramb
                                        relofeletogimply dummy and typesetting industry.</p>
                                </div>
                            </div>
                            <div class="media">
                                <a href="#" class="pull-left">
                                    <img alt="Comments" src="{{ asset('student/img/course/18.jpg')}}" class="media-object">
                                </a>
                                <div class="media-body">
                                    <h3><a href="#">Mike Jones</a></h3>
                                    <h4>Excellent course!</h4>
                                    <p>Rimply dummy text of the printinwhen an unknown printer took eype and scramb
                                        relofeletogimply dummy and typesetting industry.</p>
                                </div>
                            </div>
                        </div>
                        <div class="leave-comments">
                            <h3 class="sidebar-title">Leave A Comment</h3>
                            <div class="contact-form">
                                <form>
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <input type="text" placeholder="Name" class="form-control">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <input type="email" placeholder="Email" class="form-control">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <input type="text" placeholder="Website" class="form-control">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <textarea placeholder="Comment" class="textarea form-control"
                                                        id="form-message" rows="8" cols="20"></textarea>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group margin-bottom-none">
                                                    <button type="submit" class="view-all-accent-btn">Post
                                                        Comment</button>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
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
                            <h3 class="sidebar-title">Latest Posts</h3>
                            <div class="sidebar-latest-research-area">
                                <ul>
                                    <li>
                                        <div class="latest-research-img">
                                            <a href="#"><img src="{{ asset('student/img/sidebar/8.jpg')}}" class="img-responsive"
                                                    alt="skilled"></a>
                                        </div>
                                        <div class="latest-research-content">
                                            <h4>30 Nov, 2020</h4>
                                            <p>when an unknown printer took.</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="latest-research-img">
                                            <a href="#"><img src="{{ asset('student/img/sidebar/4.jpg')}}" class="img-responsive"
                                                    alt="skilled"></a>
                                        </div>
                                        <div class="latest-research-content">
                                            <h4>10 Aug, 2020</h4>
                                            <p>when an unknown printer took.</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="latest-research-img">
                                            <a href="#"><img src="{{ asset('student/img/sidebar/9.jpg')}}" class="img-responsive"
                                                    alt="skilled"></a>
                                        </div>
                                        <div class="latest-research-content">
                                            <h4>05 Jul, 2020</h4>
                                            <p>when an unknown printer took.</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="latest-research-img">
                                            <a href="#"><img src="{{ asset('student/img/sidebar/10.jpg')}}" class="img-responsive"
                                                    alt="skilled"></a>
                                        </div>
                                        <div class="latest-research-content">
                                            <h4>30 Feb, 2020</h4>
                                            <p>when an unknown printer took.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
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