@extends('admin-layout.master')
<title>University | Admin Profile</title>
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="" id="admin_profile">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-4 col-form-label">University Name</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="name" id="" value="{{$admin->name}}"
                                        placeholder="University Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-4 col-form-label">University Email
                                    address</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="email" id="" value="{{$admin->email}}"
                                        placeholder="University Email Address">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-4 col-form-label">University Contact
                                    No.</label>
                                <div class="col-sm-6">
                                    <input type="number" minlength="10" maxlength="15" class="form-control"
                                        name="contact_no" id="" value="{{$admin->contact_no}}"
                                        placeholder="University Contact No">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-4 col-form-label">University
                                    Address.</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" name="address" id="" placeholder="University Address"
                                        readonly>{{$admin->address}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <button name="save" class="btn btn-primary float-right" type="submit">Submit</button>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('admin-script')
<script>
$(document).ready(function() {
    $('#admin_profile').validate({

        rules: {
            'name': {
                required: true
            },
            'email': {
                required: true
            },
            'contact_no': {
                required: true,
                minlength: 10,
                maxlength: 15,

            },
        },
        messages: {
            'name': {
                required: 'The Name is required'
            },
            'email': {
                required: 'The Email is required'
            },
            'contact_no': {
                required: 'The Contact No is required',
                minlength: "Please Enter Minimum 10 number!",
                maxlength: "Please Enter Maximum 15 number!",
            },
        },
        submitHandler: function(form) {
            adminProfile(form);
        },
        highlight: function highlight(element, errorClass, validClass) {
            $(element).parents("div.form-control").addClass(errorClass).removeClass(validClass);
        },
        unhighlight: function unhighlight(element, errorClass, validClass) {
            $(element).parents(".error").removeClass(errorClass).addClass(validClass);
        }
    });

    function adminProfile(form) {
        $('.text-strong').html('');

        var urls = '{{ route("admin.adminprofileupdate") }}';

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
                    toastr.success('Adminn Profile Update Successfully!');
                    location.reload();
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