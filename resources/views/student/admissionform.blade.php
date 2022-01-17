@extends('student-layout.master')
<title>Student | Admission Form</title>
@section('content')
<div class="inner-page-banner-area" style="background-image: url('student/img/banner/5.jpg');">
    <div class="container">
        <div class="pagination-area">
            <h1>Admission Form</h1>
            <ul>
                <li><a href="{{ route('home')}}">Home</a> -</li>
                <li>Admission Form</li>
            </ul>
        </div>
    </div>
</div>
<div class="registration-page-area">
    <div class="container">
        <h2 class="sidebar-title">Admission Form</h2>
        <div class="registration-details-area inner-page-padding">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label class="control-label">Select College</label>
                    <form action="">
                    <div class="custom-select2">
                        <div class="form-group">
                            <select class="form-control" id="exampleFormControlSelect2" multiple>
                                @foreach($college as $col)
                                <option value="{{$col->collegeName->id}}">{{$col->collegeName->name}}</option>
                                @endforeach
                            </select>
                            <div class="form-group row mb-none">
                                <div class="offset-md-3 col-md-9">
                                    <button class="view-all-accent-btn disabled col-md-9" type="submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection