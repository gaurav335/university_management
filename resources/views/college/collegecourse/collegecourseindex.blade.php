@extends('college-layout.master')
<title>College | Course</title>
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="modal fade" id="collegecourse_add_model" tabindex="-1" role="dialog"
                        aria-labelledby="services_add_modal" aria-hidden="true" data-backdrop="static"
                        data-keyboard="false">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="workerLabel">Add College Course</h5>
                                    <button type="button" class="close btn-cancel" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" enctype="multipart/form-data" id="collegecourse_add_form">
                                        @csrf
                                        <div class="form-group">
                                            <label>Course Name</label>
                                            <select name="course_id" id="course_id" class="form-control">
                                                <option value="">-- Select Course --</option>
                                                @foreach($cours as $course)
                                                <option value="{{ $course->id}}">{{$course->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Reserved Seat</label>
                                            <input type="number" min="0" maxlength="3" name="reserved_seat"
                                                id="reserved_seat" class="form-control"
                                                placeholder="College Course Reserved Seat" />
                                        </div>

                                        <div class="form-group">
                                            <label>Merit Seat</label>
                                            <input type="number" min="0" maxlength="3" name="merit_seat" id="merit_seat"
                                                class="form-control" placeholder="College Course Merit Seat" />
                                        </div>

                                        <div class="form-group">
                                            <div>
                                                <button type="submit"
                                                    class="btn btn-save btn-primary waves-effect waves-light">
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
                        <button type="button" class="btn btn-save btn-outline-primary float-right"
                            title="Add College Course" data-toggle="modal" data-target="#collegecourse_add_model"> + Add
                            College Course</button>
                    </div>
                </div>

                <div class="card">
                    <div class="modal fade" id="collegecourse_edit_modal" tabindex="-1" role="dialog"
                        aria-labelledby="services_add_modal" aria-hidden="true" data-backdrop="static"
                        data-keyboard="false">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="workerLabel">Edit College</h5>
                                    <button type="button" class="close btn-cancel" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" enctype="multipart/form-data" id="collegecourse_edit_form">
                                        @csrf
                                        <input type="hidden" id="id" name="id">

                                        <div class="form-group">
                                            <label>Reserved Seat</label>
                                            <input type="number" min="0" maxlength="3" name="reserved_seat"
                                                id="reserved_seat" class="form-control"
                                                placeholder="College Course Reserved Seat" />
                                        </div>

                                        <div class="form-group">
                                            <label>Merit Seat</label>
                                            <input type="number" min="0" maxlength="3" name="merit_seat" id="merit_seat"
                                                class="form-control" placeholder="College Course Merit Seat" />
                                        </div>

                                        <div class="form-group">
                                            <div>
                                                <button type="submit"
                                                    class="btn btn-update btn-primary waves-effect waves-light">
                                                    Submit
                                                </button>
                                                <button type="button" data-dismiss="modal"
                                                    class="btn reset btn-cancel btn-secondary waves-effect m-l-5">
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
                        <h5>College Course List</h5>
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
@push('college-script')
{!! $dataTable->scripts() !!}

<script>
$(document).on('click', '.btn-cancel', function() {
    $('#collegecourse_add_form').trigger('reset');
    $('#collegecourse_edit_form').trigger('reset');
    $('.error').text('');
    $('.text-strong').text('');
})

// add
$(document).on('click', '.btn-save', function() {
    $('.error').text('');
    $('.text-strong').text('');
})

$('#collegecourse_add_form').validate({

    rules: {
        'course_id': {
            required: true
        },
        'reserved_seat': {
            required: true,
            maxlength: 3,
        },
        'merit_seat': {
            required: true,
            maxlength: 3,
        },
    },
    messages: {
        'course_id': {
            required: 'Please Selected Course required'
        },
        'reserved_seat': {
            required: 'The reserved seat  is required',
            maxlength: "Please Enter Maximum 3 number!",
        },
        'merit_seat': {
            required: 'The Merit Seat is required',
            maxlength: "Please Enter Maximum 3 number!",
        }
    },
    submitHandler: function(form) {
        collegecourseAdd(form);
    },
    highlight: function highlight(element, errorClass, validClass) {
        $(element).parents("div.form-control").addClass(errorClass).removeClass(validClass);
    },
    unhighlight: function unhighlight(element, errorClass, validClass) {
        $(element).parents(".error").removeClass(errorClass).addClass(validClass);
    }


});

function collegecourseAdd(form) {
    $('.text-strong').html('');

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        type: 'post',
        url: '{{ route("college.addcollegecourse") }}',
        contentType: false,
        processData: false,
        data: new FormData(form),
        success: function(res) {
            if (res == 1) {
                $('#college-collegecourse-table').DataTable().ajax.reload();
                toastr.success('College Course Added Successfully');
                $('#collegecourse_add_model').modal('hide');
                $('#collegecourse_add_form').trigger('reset');
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
    $('#collegecourse_edit_form').trigger('reset');
    $('.error').text('');
    $('.text-strong').text('');

    var id = $(this).data('eid');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        url: '{{ route("college.editcollegecurse") }}',
        type: 'post',
        data: {
            'id': id
        },
        success: function(res) {
            if (res) {

                $("#collegecourse_edit_modal").find('#id').val(res.id);
                $("#collegecourse_edit_modal").find('#reserved_seat').val(res.reserved_seat);
                $("#collegecourse_edit_modal").find('#merit_seat').val(res.merit_seat);
            }

        }
    })
});

//update
$('#collegecourse_edit_form').validate({

    rules: {
        'course_id': {
            required: true
        },
        'reserved_seat': {
            required: true,
            maxlength: 3,
        },
        'merit_seat': {
            required: true,
            maxlength: 3,
        },
    },
    messages: {
        'course_id': {
            required: 'Please Selected Course required'
        },
        'reserved_seat': {
            required: 'The reserved seat  is required',
            maxlength: "Please Enter Maximum 3 number!",
        },
        'merit_seat': {
            required: 'The Merit Seat is required',
            maxlength: "Please Enter Maximum 3 number!",
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
        url: '{{ route("college.updatecollegecourse") }}',
        contentType: false,
        processData: false,
        data: new FormData(form),
        success: function(res) {
            if (res == 1) {
                $('#college-collegecourse-table').DataTable().ajax.reload();
                toastr.success('College Course Update Successfully');
                $('#collegecourse_edit_modal').modal('hide');
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
        text: "Delete This College Course!",
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
                url: '{{ route("college.deletecollegecourse") }}',
                type: 'post',
                data: {
                    'id': id
                },
                success: function(res) {
                    if (res == 1) {
                        $('#college-collegecourse-table').DataTable().ajax.reload();
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your College Course has been deleted.",
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
</script>
@endpush