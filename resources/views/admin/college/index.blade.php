@extends('admin-layout.master')
<title>University | College</title>
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="modal fade" id="college_add_model" tabindex="-1" role="dialog"
                        aria-labelledby="services_add_modal" aria-hidden="true" data-backdrop="static"
                        data-keyboard="false">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="workerLabel">Add College</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" enctype="multipart/form-data" id="college_form">
                                        @csrf
                                        <div class="form-group">
                                            <label>College Name</label>
                                            <input type="text" name="name" id="name" class="form-control"
                                                placeholder="College Name..." />
                                        </div>

                                        <div class="form-group">
                                            <label>College Email</label>
                                            <input type="email" name="email" id="email" class="form-control"
                                                placeholder="College Email..." />
                                        </div>

                                        <div class="form-group">
                                            <label>College Contact No.</label>
                                            <input type="number" name="contact_no" id="contact_no" class="form-control"
                                                placeholder="College Contact No..." />
                                        </div>

                                        <div class="form-group">
                                            <label>College Address</label>
                                            <textarea name="address" id="address" class="form-control" rows="4"
                                                placeholder="College Address..."></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>College Password</label>
                                            <input type="password" name="password" id="password" class="form-control"
                                                placeholder="College password..." />
                                            <div class="col-sm-9">
                                                <div class="form-group">
                                                    <input type="checkbox" id="check">&nbsp;Show Password
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>College Logo</label>
                                            <input type="file" name="logo" id="logo" class="form-control"
                                                placeholder="College Logo..." />
                                        </div>

                                        <div class="form-group">
                                            <div>
                                                <button type="submit"
                                                    class="btn btn-save btn-primary waves-effect waves-light">
                                                    Submit
                                                </button>
                                                <button type="button" data-dismiss="modal"
                                                    class="btn  reset btn-secondary waves-effect m-l-5">
                                                    Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-header">
                        <button type="button" class="btn btn-save btn-outline-primary float-right" title="Add College"
                            data-toggle="modal" data-target="#college_add_model"> + Add College</button>
                    </div>
                </div>

                <div class="card">
                    <div class="modal fade" id="college_edit_modal" tabindex="-1" role="dialog"
                        aria-labelledby="services_add_modal" aria-hidden="true" data-backdrop="static"
                        data-keyboard="false">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="workerLabel">Edit College</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" enctype="multipart/form-data" id="college_edit_form">
                                        @csrf
                                        <input type="hidden" id="id" name="id">
                                        <div class="form-group">
                                            <label>College Name</label>
                                            <input type="text" name="name" id="name" class="form-control"
                                                placeholder="College Name..." />
                                        </div>

                                        <div class="form-group">
                                            <label>College Email</label>
                                            <input type="email" name="email" id="email" class="form-control"
                                                placeholder="College Email..." />
                                        </div>

                                        <div class="form-group">
                                            <label>College Contact No.</label>
                                            <input type="number" name="contact_no" maxlength="10" id="contact_no"
                                                class="form-control" placeholder="College Contact No..." />
                                        </div>

                                        <div class="form-group">
                                            <label>College Address</label>
                                            <textarea name="address" id="address" class="form-control" rows="4"
                                                placeholder="College Address..."></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Colloge image</label>
                                            <input type="file" name="logo" id="" class="form-control" />
                                            </br>
                                            <center><img src="" alt="" id="clg_img" width="100px" height="100px">
                                            </center>
                                        </div>

                                        <div class="form-group">
                                            <div>
                                                <button type="submit"
                                                    class="btn btn-update btn-primary waves-effect waves-light">
                                                    Submit
                                                </button>
                                                <button type="button" data-dismiss="modal"
                                                    class="btn reset btn-secondary waves-effect m-l-5">
                                                    Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card">
                    <div class="card-header">
                        <h5>College List</h5>
                        <div class="table-responsive table-hover">
                            {!! $dataTable->table(['class' => 'table table-bordered dt-responsive nowrap']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('admin-script')
{!! $dataTable->scripts() !!}

<script>
$(document).ready(function() {
    $('.dt-buttons').html('');
})

//show password
$('#check').click(function() {
    if (document.getElementById('check').checked) {
        $('#password').get(0).type = 'text';
    } else {
        $('#password').get(0).type = 'password';
    }
});

//strong Password
$.validator.addMethod("pwcheck", function(value, element) {
    return this.optional(element) || /^(?=.*\d)(?=.*[A-Z])(?=.*\W).*$/i.test(value);
});

// add
$(document).on('click', '.btn-save', function() {
    $('.error').text('');
    $('.text-strong').text('');
})

$('#college_form').validate({

    rules: {
        'name': {
            required: true
        },
        'email': {
            required: true,
            email: true,
            remote: {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                url: "{{ route('admin.checkemail') }}",
                type: "POST",
                data: {
                    email: function() {
                        return $("#email").val();
                    }
                }
            }
        },
        'contact_no': {
            required: true,
            maxlength: 10,
            remote: {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                url: "{{ route('admin.checkcontactno') }}",
                type: "POST",
                data: {
                    email: function() {
                        return $("#contact_no").val();
                    }
                }
            }
        },
        'address': {
            required: true
        },
        'logo': {
            required: true
        },
        'password': {
            required: true,
            pwcheck: true,
            minlength: 8,
        }
    },
    messages: {
        'name': {
            required: 'The College name is required'
        },
        'email': {
            required: 'The Email  is required',
            email: "Email must have valid format",
            remote: "Email already register"
        },
        'contact_no': {
            required: 'The Contact No is required',
            maxlength: "Please Enter Maximum 10 number!",
            remote: "Contact No already register"
        },
        'address': {
            required: 'The Address  is required'
        },
        'logo': {
            required: 'The College Logo is required'
        },
        'password': {
            required: 'The Password is required',
            pwcheck: "Password must contain one capital letter,one numerical and one special character",
            minlength: "Please Enter Minimim 8 Character!"

        }
    },
    submitHandler: function(form) {
        collegeAdd(form);
    },
    highlight: function highlight(element, errorClass, validClass) {
        $(element).parents("div.form-control").addClass(errorClass).removeClass(validClass);
    },
    unhighlight: function unhighlight(element, errorClass, validClass) {
        $(element).parents(".error").removeClass(errorClass).addClass(validClass);
    }


});

function collegeAdd(form) {
    $('.text-strong').html('');

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        type: 'post',
        url: '{{ route("admin.addcollege") }}',
        contentType: false,
        processData: false,
        data: new FormData(form),
        success: function(res) {
            if (res == 1) {
                $('#admin-college-table').DataTable().ajax.reload();
                toastr.success('College Added Successfully');
                $('#college_add_model').modal('hide');
                $('#college_form').trigger('reset');
            }
        },
        error: function(response) {

            $.each(response.responseJSON.errors, function(field_name, error) {

                $('[name=' + field_name + ']').after(
                    '<span class="text-strong" style="color:red">' + error + '</span>')
            })
        }

    })
}

//edit
$(document).on('click', '.edit-btn', function() {
    $('#college_edit_form').trigger('reset');
    $('.error').text('');
    $('.text-strong').text('');

    var id = $(this).data('eid');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        url: '{{ route("admin.editcollege") }}',
        type: 'post',
        data: {
            'id': id
        },
        success: function(res) {
            if (res) {

                $("#college_edit_modal").find('#id').val(res.id);
                $("#college_edit_modal").find('#name').val(res.name);
                $("#college_edit_modal").find('#email').val(res.email);
                $("#college_edit_modal").find('#contact_no').val(res.contact_no);
                $("#college_edit_modal").find('#address').val(res.address);
                $("#college_edit_modal").find('#clg_img').attr('src', res.logo);
            }

        }
    })
});

//update
$('#college_edit_form').validate({

    rules: {
        'name': {
            required: true
        },
        'email': {
            required: true
        },
        'contact_no': {
            required: true
        },
        'address': {
            required: true
        },
    },
    messages: {
        'name': {
            required: 'The College name is required'
        },
        'email': {
            required: 'The Email  is required'
        },
        'contact_no': {
            required: 'The Contact No is required'
        },
        'address': {
            required: 'The Address  is required'
        },
    },
    submitHandler: function(form) {
        updateCollege(form);
    },
    highlight: function highlight(element, errorClass, validClass) {
        $(element).parents("div.form-control").addClass(errorClass).removeClass(validClass);
    },
    unhighlight: function unhighlight(element, errorClass, validClass) {
        $(element).parents(".error").removeClass(errorClass).addClass(validClass);
    }


});

function updateCollege(form) {
    $('.text-strong').html('');

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        type: 'post',
        url: '{{ route("admin.updatecollege") }}',
        contentType: false,
        processData: false,
        data: new FormData(form),
        success: function(res) {
            if (res == 1) {
                $('#admin-college-table').DataTable().ajax.reload();
                toastr.success('College Update Successfully');
                $('#college_edit_modal').modal('hide');
            }
        },
        error: function(response) {

            $.each(response.responseJSON.errors, function(field_name, error) {
                $('[name=' + field_name + ']').after(
                    '<span class="text-strong" style="color:red">' + error + '</span>')
            })
        }

    })
}


// delete
$(document).on('click', '.delete-btn', function() {

    if (confirm('are you want to sure Delete College!')) {

        var id = $(this).data('did');
        var element = this;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            url: '{{ route("admin.deletecollege") }}',
            type: 'post',
            data: {
                'id': id
            },
            success: function(res) {
                if (res == 1) {
                    toastr.error('College Delete Successfully');
                    $('#admin-college-table').DataTable().ajax.reload();
                }
            }
        })
    }
});

//status
$(document).on('click', '.status', function() {

    var status = $(this).data('status');
    var id = $(this).data('id');

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        url: '{{ route("admin.statuscollege") }}',
        type: 'post',
        data: {
            'status': status,
            'id': id
        },
        success: function(res) {
            if (res.mesage == 1) {
                toastr.success('College Active Successfully');
            }
            if (res.mesage == 2) {
                toastr.error('College InActive Successfully');

            }
            $('#admin-college-table').DataTable().ajax.reload();
        }
    })
});
</script>
@endpush