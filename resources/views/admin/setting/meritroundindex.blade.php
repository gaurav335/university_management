@extends('admin-layout.master')
<title>University | Merite Round</title>
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="modal fade" id="meritround_add_model" tabindex="-1" role="dialog"
                        aria-labelledby="services_add_modal" aria-hidden="true" data-backdrop="static"
                        data-keyboard="false">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="workerLabel">Add Merit Round</h5>
                                    <button type="button" class="close btn-cancel" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" enctype="multipart/form-data" id="meritround_form">
                                        @csrf
                                        <div class="form-group">
                                            <label>Merit Round No.</label>
                                            <input type="number" min="0" name="round_no" id="round_no"
                                                class="form-control" placeholder="Merit Round No..." />
                                        </div>
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
                                            <label>Merit Round Start Date</label>
                                            <input type="text" name="start_date" id="start_date" class="form-control"
                                                placeholder="Merit Round Start Date..." />
                                        </div>

                                        <div class="form-group">
                                            <label>Merit Round End Date</label>
                                            <input type="text" name="end_date" id="end_date" class="form-control"
                                                placeholder="Merit Round End Date..." />
                                        </div>

                                        <div class="form-group">
                                            <label>Merit Result Declare Date</label>
                                            <input type="text" name="merit_result_declare_date"
                                                id="merit_result_declare_date" class="form-control"
                                                placeholder="Merit Result Declare Date..." />
                                        </div>

                                        <div class="form-group">
                                            <label>Admission Confirmation Date</label>
                                            <input type="text" name="admission_confirm_date" id="admission_confirm_date"
                                                class="form-control" placeholder="Admission Confirm Date..." />
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

                    <div class="modal fade" id="meritround_edit_model" tabindex="-1" role="dialog"
                        aria-labelledby="services_add_modal" aria-hidden="true" data-backdrop="static"
                        data-keyboard="false">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="workerLabel">Add Merit Round</h5>
                                    <button type="button" class="close btn-cancel" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" enctype="multipart/form-data" id="meritround_edit_form">
                                        @csrf
                                        <input type="hidden" id="id" name="id">
                                        <div class="form-group">
                                            <label>Merit Round Start Date</label>
                                            <input type="text" name="start_date" id="startdate" class="form-control"
                                                placeholder="Merit Round Start Date..." />
                                        </div>

                                        <div class="form-group">
                                            <label>Merit Round End Date</label>
                                            <input type="text" name="end_date" id="enddate" class="form-control"
                                                placeholder="Merit Round End Date..." />
                                        </div>

                                        <div class="form-group">
                                            <label>Merit Result Declare Date</label>
                                            <input type="text" name="merit_result_declare_date"
                                                id="meritresultdeclaredate" class="form-control"
                                                placeholder="Merit Result Declare Date..." />
                                        </div>

                                        <div class="form-group">
                                            <label>Admission Confirmation Date</label>
                                            <input type="text" name="admission_confirm_date" id="admissionconfirmdate"
                                                class="form-control" placeholder="Admission Confirm Date..." />
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
                        <button type="button" class="btn btn-save btn-outline-primary float-right"
                            title="Add Merit Round" data-toggle="modal" data-target="#meritround_add_model"> + Add Merit
                            Round</button>
                    </div>
                </div>

                <div class="card">

                    <div class="card-header">
                        <h5>Merit Round List</h5>
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
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(document).ready(function() {
    $('.dt-buttons').html('');
})


$(document).ready(function() {
    $("#start_date").datepicker({
        dateFormat: "yy-mm-dd",
        numberOfMonths: 1,
        minDate: '0d',
        changeMonth: true,
        changeYear: true,
        onSelect: function(selected) {
            var sdate = new Date(selected);
            sdate.setDate(sdate.getDate() + 1);
            $("#end_date").datepicker("option", "minDate", sdate);
        }
    });
    $("#end_date").datepicker({
        dateFormat: "yy-mm-dd",
        numberOfMonths: 1,
        minDate: new Date(),
        changeMonth: true,
        changeYear: true,
        onSelect: function(selected) {
            var edate = new Date(selected);
            edate.setDate(edate.getDate() + 1);
            $("#merit_result_declare_date").datepicker("option", "minDate", edate);
        }
    });

    $("#merit_result_declare_date").datepicker({
        dateFormat: "yy-mm-dd",
        numberOfMonths: 1,
        minDate: new Date(),
        changeMonth: true,
        changeYear: true,
        onSelect: function(selected) {
            var edate = new Date(selected);
            edate.setDate(edate.getDate() + 1);
            $("#admission_confirm_date").datepicker("option", "minDate", edate);
        }
    });

    $("#admission_confirm_date").datepicker({
        dateFormat: "yy-mm-dd",
        numberOfMonths: 1,
        changeMonth: true,
        changeYear: true,
    });
});

$(document).ready(function() {

    $("#startdate").datepicker({
        dateFormat: "yy-mm-dd",
        numberOfMonths: 1,
        minDate: '0d',
        changeMonth: true,
        changeYear: true,
        onSelect: function(selected) {
            var sdate = new Date(selected);
            sdate.setDate(sdate.getDate() + 1);
            $("#enddate").datepicker("option", "minDate", sdate);
        }
    });
    $("#enddate").datepicker({
        dateFormat: "yy-mm-dd",
        numberOfMonths: 1,
        minDate: new Date(),
        changeMonth: true,
        changeYear: true,
        onSelect: function(selected) {
            var edate = new Date(selected);
            edate.setDate(edate.getDate() + 1);
            $("#meritresultdeclaredate").datepicker("option", "minDate", edate);
        }
    });

    $("#meritresultdeclaredate").datepicker({
        dateFormat: "yy-mm-dd",
        numberOfMonths: 1,
        minDate: new Date(),
        changeMonth: true,
        changeYear: true,
        onSelect: function(selected) {
            var edate = new Date(selected);
            edate.setDate(edate.getDate() + 1);
            $("#admissionconfirmdate").datepicker("option", "minDate", edate);
        }
    });

    $("#admissionconfirmdate").datepicker({
        dateFormat: "yy-mm-dd",
        numberOfMonths: 1,
        changeMonth: true,
        changeYear: true,
    });

});

// add
$(document).on('click', '.btn-save', function() {
    $('.error').text('');
    $('.text-strong').text('');
})
$(document).on('click', '.btn-cancel', function() {
    $('#meritround_form').trigger('reset');
    $('.error').text('');
    $('.text-strong').text('');
})

$('#meritround_form').validate({

    rules: {
        'start_date': {
            required: true
        },
        'end_date': {
            required: true
        },
        'merit_result_declare_date': {
            required: true
        },
    },
    messages: {
        'start_date': {
            required: 'The Merit Round Start Date is required'
        },
        'end_date': {
            required: 'The Merit Round End Date is required'
        },
        'merit_result_declare_date': {
            required: 'The Merit Round Declartion Date is required'
        },
    },
    submitHandler: function(form) {
        MeritRoundAdd(form);
    },
    highlight: function highlight(element, errorClass, validClass) {
        $(element).parents("div.form-control").addClass(errorClass).removeClass(validClass);
    },
    unhighlight: function unhighlight(element, errorClass, validClass) {
        $(element).parents(".error").removeClass(errorClass).addClass(validClass);
    }


});

function MeritRoundAdd(form) {
    $('.text-strong').html('');

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        type: 'post',
        url: '{{ route("admin.addmeritround") }}',
        contentType: false,
        processData: false,
        data: new FormData(form),
        success: function(res) {
            if (res == 2) {
                toastr.error('Meritround Already Exists!');
            }
            if (res == 3) {
                toastr.error('Please Choose the Different Date!!');
            }
            if (res == 1) {
                $('#admin-meritround-table').DataTable().ajax.reload();
                toastr.success('Meritround Added Successfully');
                $('#meritround_add_model').modal('hide');
                $('#meritround_form').trigger('reset');
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
    $('#meritround_edit_form').trigger('reset');
    $('.error').text('');
    $('.text-strong').text('');

    var id = $(this).data('eid');
    console.log(id);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        url: '{{ route("admin.editmeritround") }}',
        type: 'post',
        data: {
            'id': id
        },
        success: function(res) {
            if (res) {

                $("#meritround_edit_model").find('#id').val(res.id);
                $("#meritround_edit_model").find('#startdate').val(res.start_date);
                $("#meritround_edit_model").find('#enddate').val(res.end_date);
                $("#meritround_edit_model").find('#meritresultdeclaredate').val(res
                    .merit_result_declare_date);
                $("#meritround_edit_model").find('#admissionconfirmdate').val(res
                    .admission_confirm_date);
            }

        }
    })
});

//update
$('#meritround_edit_form').validate({

    rules: {
        'start_date': {
            required: true
        },
        'end_date': {
            required: true
        },
        'merit_result_declare_date': {
            required: true
        },
    },
    messages: {
        'start_date': {
            required: 'The Merit Round Start Date is required'
        },
        'end_date': {
            required: 'The Merit Round End Date is required'
        },
        'merit_result_declare_date': {
            required: 'The Merit Round Declartion Date is required'
        },
    },
    submitHandler: function(form) {
        updateMeritround(form);
    },
    highlight: function highlight(element, errorClass, validClass) {
        $(element).parents("div.form-control").addClass(errorClass).removeClass(validClass);
    },
    unhighlight: function unhighlight(element, errorClass, validClass) {
        $(element).parents(".error").removeClass(errorClass).addClass(validClass);
    }


});

function updateMeritround(form) {
    $('.text-strong').html('');

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        type: 'post',
        url: '{{ route("admin.updatemeritround") }}',
        contentType: false,
        processData: false,
        data: new FormData(form),
        success: function(res) {
            if (res == 1) {
                $('#admin-meritround-table').DataTable().ajax.reload();
                toastr.success('Merit Round Update Successfully');
                $('#meritround_edit_model').modal('hide');
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
        text: "Delete This Merit Round!",
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
                url: '{{ route("admin.deletemeritround") }}',
                type: 'post',
                data: {
                    'id': id
                },
                success: function(res) {
                    if (res == 1) {
                        $('#admin-meritround-table').DataTable().ajax.reload();
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your Merit Round has been deleted.",
                            icon: "success",
                        });
                    }
                }
            })
        } else {
            Swal.fire({
                title: "Cancelled",
                text: "Your Merit Round is safe :)",
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
        url: '{{ route("admin.statusmeritround") }}',
        type: 'post',
        data: {
            'status': status,
            'id': id
        },
        success: function(res) {
            if (res.mesage == 1) {
                toastr.success('Merit Round Active Successfully');
            }
            if (res.mesage == 0) {
                toastr.error('Merit Round InActive Successfully');

            }
            $('#admin-meritround-table').DataTable().ajax.reload();
        }
    })
});
</script>
@endpush