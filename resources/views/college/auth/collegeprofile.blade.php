@extends('college-layout.master')
<title>College | Profile</title>
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form id="college_form" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label">College Name</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" value="{{ $college->name }}" name="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label">Email Address</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="email" value="{{ $college->email }}" name="email"
                                        id="email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label">Mobile No.</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="number" min="0" value="{{ $college->contact_no }}"
                                        name="contact_no" id="contact_no">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label">Address</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" rows="4" name="address" id=""
                                        placeholder="College Address">{{$college->address}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label">Logo</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="file" name="logo">
                                    <br>
                                    <img src="{{ $college->logo }}" alt="" width="100px" height="100px">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label"></label>
                                <div class="col-md-2">
                                    <input class="form-control update btn btn-info" type="submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('college-script')
<script>
$(document).ready(function() {
    $('#college_form').validate({

        rules: {
            'name': {
                required: true
            },
            'email': {
                required: true,
            },
            'contact_no': {
                required: true,
                minlength: 10,
                maxlength: 15,

            },
            'address': {
                required: true
            },
        },
        messages: {
            'name': {
                required: 'The Name is required'
            },
            'email': {
                required: 'The Email is required',
            },
            'contact_no': {
                required: 'The Contact No is required',
                minlength: "Please Enter Minimum 10 number!",
                maxlength: "Please Enter Maximum 15 number!",
            },
            'address': {
                required: 'The Address is required'
            },
        },
        submitHandler: function(form) {
            collegeprofile(form);
        },
        highlight: function highlight(element, errorClass, validClass) {
            $(element).parents("div.form-control").addClass(errorClass).removeClass(validClass);
        },
        unhighlight: function unhighlight(element, errorClass, validClass) {
            $(element).parents(".error").removeClass(errorClass).addClass(validClass);
        }
    });


    function collegeprofile(form) {
        $('.text-strong').html('');

        var urls = "{{ route('college.update') }}";

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            type: 'post',
            url: urls,
            contentType: false,
            processData: false,
            data: new FormData(form),
            success: function(res) {
                if (res == 1) {
                    var $toast = toastr.success("College Profile Update Successfully!");
                    setTimeout(function() {
                        $toast.fadeOut(4000);
                        location.reload();
                    }, 5000)


                }
                if (res == 0) {
                    toastr.error('Please Try Again!');
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