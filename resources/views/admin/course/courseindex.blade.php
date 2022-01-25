@extends('admin-layout.master')
<title>University | Course</title>
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="modal fade" id="course_add_model" tabindex="-1" role="dialog"
                        aria-labelledby="services_add_modal" aria-hidden="true" data-backdrop="static"
                        data-keyboard="false">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="workerLabel">Add Course</h5>
                                    <button type="button" class="close btn-cancel" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" enctype="multipart/form-data" id="course_form">
                                        @csrf
                                        <div class="form-group">
                                            <label>Course Name</label>
                                            <input type="text" name="name" id="name" class="form-control"
                                                placeholder="Course Name..." />
                                        </div>

                                        <div class="form-group">
                                            <div>
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                    Submit
                                                </button>
                                                <button type="button" data-dismiss="modal"
                                                    class="btn btn-cancel reset btn-secondary waves-effect m-l-5">
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
                        <button type="button" class="btn btn-save btn-outline-primary float-right" title="Add Course"
                            data-toggle="modal" data-target="#course_add_model"> + Add Course</button>
                    </div>
                </div>

                <div class="card">
                    <div class="modal fade" id="course_edit_modal" tabindex="-1" role="dialog"
                        aria-labelledby="services_add_modal" aria-hidden="true" data-backdrop="static"
                        data-keyboard="false">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="workerLabel">Edit Course</h5>
                                    <button type="button" class="close btn-cancel" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" enctype="multipart/form-data" id="course_edit_form">
                                        @csrf
                                        <input type="hidden" id="id" name="id">
                                        <div class="form-group">
                                            <label>Course Name</label>
                                            <input type="text" name="name" id="name" class="form-control"
                                                placeholder="Course Name..." />
                                        </div>

                                        <div class="form-group">
                                            <div>
                                                <button type="submit"
                                                    class="btn btn-update btn-primary waves-effect waves-light">
                                                    Submit
                                                </button>
                                                <button type="button" data-dismiss="modal"
                                                    class="btn btn-cancel reset btn-secondary waves-effect m-l-5">
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
                        <h5>Course List</h5>
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

$(document).on('click', '.btn-cancel', function() {
    $('#course_form').trigger('reset');
    $('#course_edit_form').trigger('reset');
    $('.error').text('');
    $('.text-strong').text('');
})

// add
$(document).on('click', '.btn-save', function() {
    $('.error').text('');
    $('.text-strong').text('');
})

$('#course_form').validate({

    rules: {
        'name': {
            required: true
        },
    },
    messages: {
        'name': {
            required: 'The Course name is required'
        },
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
        url: '{{ route("admin.addcourse") }}',
        contentType: false,
        processData: false,
        data: new FormData(form),
        success: function(res) {
            if (res == 1) {
                $('#admin-course-table').DataTable().ajax.reload();
                toastr.success('Course Added Successfully');
                $('#course_add_model').modal('hide');
                $('#course_form').trigger('reset');
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
    $('#course_edit_form').trigger('reset');
    $('.error').text('');
    $('.text-strong').text('');

    var id = $(this).data('eid');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        url: '{{ route("admin.editcourse") }}',
        type: 'post',
        data: {
            'id': id
        },
        success: function(res) {
            if (res) {

                $("#course_edit_modal").find('#id').val(res.id);
                $("#course_edit_modal").find('#name').val(res.name);
            }

        }
    })
});

//update
$('#course_edit_form').validate({

    rules: {
        'name': {
            required: true
        },
    },
    messages: {
        'name': {
            required: 'The Course name is required'
        },
    },
    submitHandler: function(form) {
        updateCourse(form);
    },
    highlight: function highlight(element, errorClass, validClass) {
        $(element).parents("div.form-control").addClass(errorClass).removeClass(validClass);
    },
    unhighlight: function unhighlight(element, errorClass, validClass) {
        $(element).parents(".error").removeClass(errorClass).addClass(validClass);
    }


});

function updateCourse(form) {
    $('.text-strong').html('');

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        type: 'post',
        url: '{{ route("admin.updatecourse") }}',
        contentType: false,
        processData: false,
        data: new FormData(form),
        success: function(res) {
            if (res == 1) {
                $('#admin-course-table').DataTable().ajax.reload();
                toastr.success('Course Update Successfully');
                $('#course_edit_modal').modal('hide');
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
    var id = $(this).data('did');
    Swal.fire({
        title: "Are you sure?",
        text: "Delete This Course!",
        icon: "warning",
        showCancelButton: !0,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        confirmButtonClass: "btn btn-success mt-2",
        cancelButtonClass: "btn btn-danger ml-2 mt-2",
        buttonsStyling: !1,
    }).then(function(result) {
        if (result.isConfirmed == true) {
            var element = this;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                url: '{{ route("admin.deletecourse") }}',
                type: 'post',
                data: {
                    'id': id
                },
                success: function(res) {
                    if (res == 1) {
                        $('#admin-course-table').DataTable().ajax.reload();
                        Swal.fire({
                            title: "Deleted!",
                            text: "Course has been deleted.",
                            icon: "success",
                        });
                    }
                }
            })
        } else {
            Swal.fire({
                title: "Cancelled",
                text: "Your Course is safe :)",
                icon: "error",
            });
        }

    })
});
//status
$(document).on('click', '.status', function() {

    var status = $(this).data('status');
    var id = $(this).data('id');

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        url: '{{ route("admin.statuscourse") }}',
        type: 'post',
        data: {
            'status': status,
            'id': id
        },
        success: function(res) {
            if (res.mesage == 1) {
                toastr.success('Course Active Successfully');
            }
            if (res.mesage == 0) {
                toastr.error('Course InActive Successfully');

            }
            $('#admin-course-table').DataTable().ajax.reload();
        }
    })
});
</script>
@endpush