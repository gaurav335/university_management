@extends('admin-layout.master')
<title>University | Subject</title>
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="modal fade" id="subject_edit_model" tabindex="-1" role="dialog"
                        aria-labelledby="subject_edit_model" aria-hidden="true" data-backdrop="static"
                        data-keyboard="false">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="workerLabel">Edit Subject</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" enctype="multipart/form-data" id="subject_edit_form">
                                        @csrf
                                        <div class="form-group">
                                            <label>Subject Name</label>
                                            <input type="text" name="name" id="name" class="form-control"
                                                placeholder="Subject Name..." readonly/>
                                        </div>

                                        <div class="form-group">
                                            <label>Subject Code</label>
                                            <input type="text" name="code" id="code" class="form-control"
                                                placeholder="Subject Code..." readonly/>
                                        </div>

                                        <div class="form-group">
                                            <label>Subject Merit</label>
                                            <input type="text" name="marks" id="marks" class="form-control"
                                                placeholder="Subject Merit..." readonly/>
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
                        <button type="button" class="btn btn-save btn-outline-primary float-right" title="Edit Subject"
                            data-toggle="modal" data-target="#subject_edit_model"> + Edit Subject</button>
                    </div>
                </div>

                <div class="card">

                    <div class="card-header">
                        <h5>Subject List</h5>
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