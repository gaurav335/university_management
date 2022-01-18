@extends('admin-layout.master')
<title>University | Subject</title>
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="modal fade" id="subject_add_model" tabindex="-1" role="dialog"
                        aria-labelledby="subject_edit_model" aria-hidden="true" data-backdrop="static"
                        data-keyboard="false">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="workerLabel">Add Subject Merit</h5>
                                    <button type="button" class="close btn-cancel" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" enctype="multipart/form-data" id="subject_add_form">
                                        @csrf
                                        <div class="form-group">
                                            <label>Subject Name</label>
                                            <select name="subject_id" id="subject_id" class="form-control">
                                                <option value="">-- Select Subject --</option>
                                                @foreach($subject as $sub)
                                                <option value="{{ $sub->id}}">{{$sub->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Subject Merit</label>
                                            <input type="number" min="0" max="100" onKeyPress="if(this.value.length==3) return false;" name="marks" id="marks" class="form-control"
                                                placeholder="Subject Merit" />
                                            <small>Ex. Subject Merit Add in %</small>
                                        </div>

                                        <div class="form-group">
                                            <div>
                                                <button type="submit" class="btn btn-save btn-primary waves-effect waves-light">
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

                    <div class="modal fade" id="subject_edit_model" tabindex="-1" role="dialog"
                        aria-labelledby="subject_edit_model" aria-hidden="true" data-backdrop="static"
                        data-keyboard="false">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="workerLabel">Edit Subject Merit</h5>
                                    <button type="button" class="close btn-cancel" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" enctype="multipart/form-data" id="subject_edit_form">
                                        @csrf
                                        <input type="hidden" id="id" name="id">
                                        <div class="form-group">
                                            <label>Subject Merit</label>
                                            <input type="number" min="0" max="100" onKeyPress="if(this.value.length==3) return false;" name="marks" id="marks" class="form-control"
                                                placeholder="Subject Merit" />
                                            <small>Ex. Subject Merit Add in %</small>
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
                            title="Add Subject Merit" data-toggle="modal" data-target="#subject_add_model"> + Add
                            Subject Merit</button>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5>Subject Merit List</h5>
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
    $('#subject_edit_form').trigger('reset');
    $('#subject_add_form').trigger('reset');
    $('.error').text('');
    $('.text-strong').text('');
})

// add
$(document).on('click', '.btn-save', function() {
    $('.error').text('');
    $('.text-strong').text('');
})

$('#subject_add_form').validate({

    rules: {
        'subject_id': {
            required: true
        },
        'marks': {
            required: true
        },
    },
    messages: {
        'subject_id': {
            required: 'The Subject is required'
        },
        'marks': {
            required: 'The Subject Merit is required'
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
        url: '{{ route("admin.addsubject") }}',
        contentType: false,
        processData: false,
        data: new FormData(form),
        success: function(res) {
            if (res == 1) {
                $('#admin-subject-table').DataTable().ajax.reload();
                toastr.success('Subject Merit Added Successfully');
                $('#subject_add_model').modal('hide');
                $('#subject_add_form').trigger('reset');
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
    $('#subject_edit_form').trigger('reset');
    $('.error').text('');
    $('.text-strong').text('');

    var id = $(this).data('eid');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        url: '{{ route("admin.editsubject") }}',
        type: 'post',
        data: {
            'id': id
        },
        success: function(res) {
            if (res) {

                $("#subject_edit_model").find('#id').val(res.id);
                $("#subject_edit_model").find('#marks').val(res.marks);
            }

        }
    })
});

//update
$('#subject_edit_form').validate({

    rules: {
        'marks': {
            required: true
        },
    },
    messages: {
        'marks': {
            required: 'The Subject Merit is required'
        },
    },
    submitHandler: function(form) {
        updateSubject(form);
    },
    highlight: function highlight(element, errorClass, validClass) {
        $(element).parents("div.form-control").addClass(errorClass).removeClass(validClass);
    },
    unhighlight: function unhighlight(element, errorClass, validClass) {
        $(element).parents(".error").removeClass(errorClass).addClass(validClass);
    }


});

function updateSubject(form) {
    $('.text-strong').html('');

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        type: 'post',
        url: '{{ route("admin.updatesubject") }}',
        contentType: false,
        processData: false,
        data: new FormData(form),
        success: function(res) {
            if (res == 1) {
                $('#admin-subject-table').DataTable().ajax.reload();
                toastr.success('Subject Merit  Update Successfully');
                $('#subject_edit_model').modal('hide');
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

    if (confirm('are you want to sure Delete Subject Merit!')) {

        var id = $(this).data('did');
        var element = this;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            url: '{{ route("admin.deletesubject") }}',
            type: 'post',
            data: {
                'id': id
            },
            success: function(res) {
                if (res == 1) {
                    toastr.error('Subject Merit Delete Successfully');
                    $('#admin-subject-table').DataTable().ajax.reload();
                }
            }
        })
    }
});
</script>
@endpush