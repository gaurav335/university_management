@extends('college-layout.master')
<title>College | Merit</title>
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="modal fade" id="collegemerit_add_model" tabindex="-1" role="dialog"
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
                                    <form method="POST" enctype="multipart/form-data" id="collegemerit_add_form">
                                        @csrf
                                        <div class="form-group">
                                            <label>Course Name</label>
                                            <select name="course_id" id="course_id" class="form-control course_id">
                                                <option value="">-- Select Course --</option>
                                                @foreach($cours as $course)
                                                <option value="{{ $course->id}}">{{$course->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Merit Round Name</label>
                                            <select name="merit_round_id" id=""
                                                class="form-control merit_round_id">
                                                <option value="">-- Select Merit Round --</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Merit</label>
                                            <input type="number" min="0" max="100" onKeyPress="if(this.value.length==3) return false;" name="merit" id="merit" class="form-control"
                                                placeholder="Subject Merit" />
                                            <small>Ex. Merit Add in %</small>
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
                            title="Add College Merit" data-toggle="modal" data-target="#collegemerit_add_model"> + Add
                            College Merit</button>
                    </div>
                </div>

                <div class="modal fade" id="collegemerit_edit_model" tabindex="-1" role="dialog"
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
                                    <form method="POST" enctype="multipart/form-data" id="collegemerit_edit_form">
                                        @csrf
                                        <input type="hidden" id="id" name="id">
                                        <div class="form-group">
                                            <label>Merit</label>
                                            <input type="number" min="0" max="100" onKeyPress="if(this.value.length==3) return false;" name="merit" id="merit" class="form-control"
                                                placeholder="Subject Merit" />
                                            <small>Ex. Merit Add in %</small>
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

                <div class="card">
                    <div class="card-header">
                        <h5>College Merit List</h5>
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
    $('#collegemerit_add_form').trigger('reset');
    $('#collegemerit_edit_form').trigger('reset');
    $('.error').text('');
    $('.text-strong').text('');
})
// Select Merit Round
$(".course_id").change(function() {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        url: "{{ route('college.selectmeritround')}}",
        dataType: "json",
        type: "POST",
        async: false,
        data: {
            id: $(this).val()
        },

        success: function(res) {
            if (res) {
                var html = ' <option>-- Select Merit Round --</option>';
                for (var i = res.length - 1; i >= 0; i--) {
                    html += '<option value=' + res[i].id + '>'+'Round No'+' '+ res[i].round_no + '</option>';
                }
                $(".merit_round_id").html(html);
            }
        },
    });
});



// add
$(document).on('click', '.btn-save', function() {
    $('.error').text('');
    $('.text-strong').text('');
})

$('#collegemerit_add_form').validate({

    rules: {
        'course_id': {
            required: true
        },
        'merit_round_id': {
            required: true,
        },
        'merit': {
            required: true,
            maxlength: 3,
        },
    },
    messages: {
        'course_id': {
            required: 'Please Selected Course required'
        },
        'merit_round_id': {
            required: 'Please Selected Merit Round required',
        },
        'merit': {
            required: 'The Merit  is required',
            maxlength: "Please Enter Maximum 3 number!",
        }
    },
    submitHandler: function(form) {
        collegemeritAdd(form);
    },
    highlight: function highlight(element, errorClass, validClass) {
        $(element).parents("div.form-control").addClass(errorClass).removeClass(validClass);
    },
    unhighlight: function unhighlight(element, errorClass, validClass) {
        $(element).parents(".error").removeClass(errorClass).addClass(validClass);
    }


});

function collegemeritAdd(form) {
    $('.text-strong').html('');

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        type: 'post',
        url: '{{ route("college.addmeritround") }}',
        contentType: false,
        processData: false,
        data: new FormData(form),
        success: function(res) {
            if(res == 2)
            {
                toastr.error('Please Choose the Different Course and Round!');
            }
            if (res == 1) {
                $('#college-collegemerit-table').DataTable().ajax.reload();
                toastr.success('College Merit Round Added Successfully');
                $('#collegemerit_add_model').modal('hide');
                $('#collegemerit_add_form').trigger('reset');
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
    $('#collegemerit_edit_form').trigger('reset');
    $('.error').text('');
    $('.text-strong').text('');

    var id = $(this).data('eid');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        url: '{{ route("college.editmeritround") }}',
        type: 'post',
        data: {
            'id': id
        },
        success: function(res) {
            if (res) {

                $("#collegemerit_edit_model").find('#id').val(res.id);
                $("#collegemerit_edit_model").find('#merit').val(res.merit);
            }

        }
    })
});

//update
$('#collegemerit_edit_form').validate({

    rules: {
        'merit': {
            required: true,
            maxlength: 3,
        },
    },
    messages: {
        'merit': {
            required: 'The Merit is required',
            maxlength: "Please Enter Maximum 3 number!",
        }
    },
    submitHandler: function(form) {
        updateCollegeMerit(form);
    },
    highlight: function highlight(element, errorClass, validClass) {
        $(element).parents("div.form-control").addClass(errorClass).removeClass(validClass);
    },
    unhighlight: function unhighlight(element, errorClass, validClass) {
        $(element).parents(".error").removeClass(errorClass).addClass(validClass);
    }


});

function updateCollegeMerit(form) {
    $('.text-strong').html('');

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        type: 'post',
        url: '{{ route("college.updatemeritround") }}',
        contentType: false,
        processData: false,
        data: new FormData(form),
        success: function(res) {
            if (res == 1) {
                $('#college-collegemerit-table').DataTable().ajax.reload();
                toastr.success('College Merit Update Successfully');
                $('#collegemerit_edit_model').modal('hide');
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
        text: "Delete This College Merit!",
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
                url: '{{ route("college.deletemeritround") }}',
                type: 'post',
                data: {
                    'id': id
                },
                success: function(res) {
                    if (res == 1) {
                        $('#college-collegemerit-table').DataTable().ajax.reload();
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your College Merit has been deleted.",
                            icon: "success",
                        });
                    }
                }
            })
        } else {
            Swal.fire({
                title: "Cancelled",
                text: "Your Merit is safe :)",
                icon: "error",
            });
        }
    })
});
</script>
@endpush