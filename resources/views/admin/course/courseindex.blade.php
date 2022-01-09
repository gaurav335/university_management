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
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                        <button type="button" class="btn btn-save btn-outline-primary float-right" title="Add Course"
                            data-toggle="modal" data-target="#course_add_model"> + Add Course</button>
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
</script>
@endpush