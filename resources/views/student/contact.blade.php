@extends('student-layout.master')
<title>Student | Contact</title>
@section('content')
<div class="inner-page-banner-area" style="background-image: url('student/img/banner/5.jpg');">
    <div class="container">
        <div class="pagination-area">
            <h1>Contact</h1>
            <ul>
                <li><a href="{{ route('home')}}">Home</a> -</li>
                <li>Contact</li>
            </ul>
        </div>
    </div>
</div>
<div class="contact-us-page2-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <h2 class="title-default-left title-bar-high">Information</h2>
                <div class="contact-us-info2">
                    <ul>
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i>PO Box 16122 Collins Street West Victoria
                            8007 Australia</li>
                        <li><i class="fa fa-phone" aria-hidden="true"></i>+61 3 8376 6284</li>
                        <li><i class="fa fa-envelope-o" aria-hidden="true"></i>academics@gmail.co</li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <h2 class="title-default-left title-bar-high">Contact With Us</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="contact-form2">
                        <form id="contact-form">
                            <fieldset>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" placeholder="Name*" class="form-control" name="name"
                                            id="form-name" data-error="Name field is required" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" placeholder="Email*" class="form-control" name="email"
                                            id="form-email" data-error="Email field is required" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea placeholder="Message*" class="textarea form-control" name="message"
                                            id="form-message" rows="8" cols="20" data-error="Message field is required"
                                            required></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-md-12">
                                    <div class="form-group margin-bottom-none">
                                        <button type="submit" class="default-big-btn">Send Message</button>
                                    </div>
                                </div>
                                <div class="col-xl-8 col-lg-8 col-md-6 col-md-12">
                                    <div class='form-response'></div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection