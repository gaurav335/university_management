@extends('student-layout.master')
<title>Student | MarkSheet</title>
@section('content')

<div class="inner-page-banner-area" style="background-image: url('student/img/banner/5.jpg');">
    <div class="container">
        <div class="pagination-area">
            <h1>MarkSheet</h1>
            <ul>
                <li><a href="{{route('home')}}">Home</a> -</li>
                <li>MarkSheet</li>
            </ul>
        </div>
    </div>
</div>
<!-- Inner Page Banner Area End Here -->
<!-- Account Page Start Here -->
<div class="section-space accent-bg">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                @if(isset($userid->user_id))
                <form class="" id="updatemarks" method="POST">
                    <div class="profile-details tab-content">
                        <div class="tab-pane tab-item animated fadeIn show active" id="menu-1" role="tabpanel"
                            aria-labelledby="menu-1-tab">
                            <div class="personal-info">
                                <div class="tab-pane tab-item animated fadeIn" id="menu-3" role="tabpanel"
                                    aria-labelledby="menu-3-tab">
                                    <h3 class="title-section title-bar-high mb-40">MarkSheet</h3>
                                    <div class="orders-info">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-responsive">
                                                <thead>
                                                    <tr>
                                                        <th>Subject</th>
                                                        <th>Total Marks</th>
                                                        <th>Obtain Marks</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($subjectmarks as $sub)
                                                    <tr>
                                                        <th>

                                                            <input type="hidden" name="id[]" value="{{$sub->id}}">
                                                            {{$sub->subjectid->name}}
                                                        </th>
                                                        <td>100</td>
                                                        <td><input type="number" class="form-control" onKeyPress="if(this.value.length==3) return false;" min="0" max="100" name="obtain_mark[]" placeholder="0"
                                                                value="{{$sub->obtain_mark}}" readonly></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="form-group row mb-none">
                        <div class="offset-md-3 col-md-9">
                            <button class="view-all-accent-btn disabled col-md-9" type="submit">Submit</button>
                        </div>
                    </div> -->
                </form>
                @else
                <form class="" id="addmarks" method="POST">
                    <div class="profile-details tab-content">
                        <div class="tab-pane tab-item animated fadeIn show active" id="menu-1" role="tabpanel"
                            aria-labelledby="menu-1-tab">
                            <div class="personal-info">
                                <div class="tab-pane tab-item animated fadeIn" id="menu-3" role="tabpanel"
                                    aria-labelledby="menu-3-tab">
                                    <h3 class="title-section title-bar-high mb-40">MarkSheet</h3>
                                    <div class="orders-info">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-responsive">
                                                <thead>
                                                    <tr>
                                                        <th>Subject</th>
                                                        <th>Total Marks</th>
                                                        <th>Obtain Marks</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                    @foreach($subject as $sub)
                                                    <tr>
                                                        <th>
                                                            <input type="hidden" name="subject[]" value="{{$sub->id}}">
                                                            {{$sub->name}}
                                                        </th>
                                                        <td>100</td>
                                                        <td><input type="number" class="form-control" onKeyPress="if(this.value.length==3) return false;" min="0" max="100" name="obtain_mark[]" placeholder="0">
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-none">
                        <div class="offset-md-3 col-md-9">
                            <button class="view-all-accent-btn disabled col-md-9" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection

@push('student-script')
<script>
$(document).ready(function() {
    //addmarks
    $('#addmarks').validate({
        rules: {
            'obtain_mark[]': {
                required: true,
                maxlength: 3,
            },
        },
        messages: {
            'obtain_mark[]': {
                required: 'The Obtain Mark is required',
                maxlength: 'Please Enter Your Right Marks',
            },
        },
        submitHandler: function(form) {
            addMarksForm(form);
        },
        highlight: function highlight(element, errorClass, validClass) {
            $(element).parents("div.form-control").addClass(errorClass).removeClass(validClass);
        },
        unhighlight: function unhighlight(element, errorClass, validClass) {
            $(element).parents(".error").removeClass(errorClass).addClass(validClass);
        }

    });

    function addMarksForm(form) {
        $('.text-strong').html('');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            type: 'post',
            url: '{{ route("addstudentmarks") }}',
            contentType: false,
            processData: false,
            data: new FormData(form),
            success: function(res) {
                if (res == 1) {
                    var $toast = toastr.success("Your Marks Added Successfully");
                    setTimeout(function() {
                        $toast.fadeOut(4000);
                        window.location = "../";
                    }, 5000)
                }
            },
            error: function(response) {

                $.each(response.responseJSON.errors, function(field_name, error) {

                    $('[name=' + field_name + ']').after(
                        '<span class="text-strong" style="color:red">' + error +
                        '</span>')
                })
            }

        })
    }

    //updatemarks
    $('#updatemarks').validate({
        rules: {
            'obtain_mark[]': {
                required: true,
                maxlength: 3,
            },
        },
        messages: {
            'obtain_mark[]': {
                required: 'The Obtain Mark is required',
                maxlength: 'Please Enter Your Right Marks',
            },
        },
        submitHandler: function(form) {
            updateMarksForm(form);
        },
        highlight: function highlight(element, errorClass, validClass) {
            $(element).parents("div.form-control").addClass(errorClass).removeClass(validClass);
        },
        unhighlight: function unhighlight(element, errorClass, validClass) {
            $(element).parents(".error").removeClass(errorClass).addClass(validClass);
        }

    });

    function updateMarksForm(form) {
        $('.text-strong').html('');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            type: 'post',
            url: '{{ route("updatestudentmarks") }}',
            contentType: false,
            processData: false,
            data: new FormData(form),
            success: function(res) {
                if (res == 1) {
                    var $toast = toastr.success("Your Marks Update Successfully");
                    setTimeout(function() {
                        $toast.fadeOut(4000);
                        location.reload();
                    }, 5000)
                }
            },
            error: function(response) {

                $.each(response.responseJSON.errors, function(field_name, error) {

                    $('[name=' + field_name + ']').after(
                        '<span class="text-strong" style="color:red">' + error +
                        '</span>')
                })
            }

        })
    }
});
</script>
@endpush