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
                    @if(isset($usercheckcourse->user_id))
                    <form method="post">
                        <input type="hidden" name="id" value="{{$course->id}}">
                        <input type="hidden" name="name" value="{{$course->name}}">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <select name="college_id[]" id="college_id"
                                    class="form-control js-example-basic-single abc" multiple="multiple">
                                    @foreach($college as $col)
                                    <option value="{{$col->collegeName->id}}" @if (in_array($col->collegeName->id,$usercheckcourse->college_id)) selected @endif >{{$col->collegeName->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="pLace-order mt-30">
                                        <button class="view-all-accent-btn" id="admission_btn"
                                            type="submit">Submit&nbsp;<i class="fa fa-spinner fa-spin loader" style="font-size:18px; display:none;"></i></button>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </form>
                    @else
                    <form action="" method="post" id="admision_form">
                        <input type="hidden" name="id" value="{{$course->id}}">
                        <input type="hidden" name="name" value="{{$course->name}}">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <select name="college_id[]" id="college_id"
                                    class="form-control js-example-basic-single abc" multiple="multiple">
                                    @foreach($college as $col)
                                    <option value="{{$col->collegeName->id}}">{{$col->collegeName->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="pLace-order mt-30">
                                        <button class="view-all-accent-btn" id="admission_btn"
                                            type="submit">Submit&nbsp;<i class="fa fa-spinner fa-spin loader" style="font-size:18px; display:none;"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('student-script')
<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});

$(document).ready(function() {
    $('#admision_form').validate({

        rules: {
            'college_id[]': {
                required: true
            },
        },
        messages: {
            'college_id[]': {
                required: 'Please Selecet the College'
            },
        },
        submitHandler: function(form) {
            admisionForm(form);
        },
        highlight: function highlight(element, errorClass, validClass) {
            $(element).parents("div.form-control").addClass(errorClass).removeClass(validClass);
        },
        unhighlight: function unhighlight(element, errorClass, validClass) {
            $(element).parents(".error").removeClass(errorClass).addClass(validClass);
        }

    });

    function admisionForm(form) {
        $('.text-strong').html('');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            type: 'post',
            url: '{{ route("addadmissionform") }}',
            contentType: false,
            processData: false,
            data: new FormData(form),
            beforeSend:function(msg){
                $(document).find('.loader').show();
                $('#admission_btn').attr('disabled', true);
            },
            success: function(res) {
                if (res == 1) {
                    var $toast = toastr.success("Your College Select Has Been Successfully");
                    setTimeout(function() {
                        $toast.fadeOut(4000);
                        window.location = "../";
                    }, 5000)
                }
                if (res == 3) {
                    toastr.error("Add Your Mark First");
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