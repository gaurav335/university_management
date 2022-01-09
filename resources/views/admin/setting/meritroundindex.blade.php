@extends('admin-layout.master')
<title>University | Course</title>
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
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" enctype="multipart/form-data" id="meritround_form">
                                        @csrf
                                        <div class="form-group">
                                            <label>Merit Round Start Date</label>
                                            <input type="date" name="start_date" id="start_date" class="form-control"
                                                placeholder="Merit Round Start Date..." />
                                        </div>

                                        <div class="form-group">
                                            <label>Merit Round End Date</label>
                                            <input type="date" name="end_date" id="end_date" class="form-control"
                                                placeholder="Merit Round End Date..." />
                                        </div>

                                        <div class="form-group">
                                            <label>Merit Result Declare Date</label>
                                            <input type="date" name="merit_result_declare_date" id="merit_result_declare_date" class="form-control"
                                                placeholder="Merit Result Declare Date..." />
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
                        <button type="button" class="btn btn-save btn-outline-primary float-right" title="Add Merit Round"
                            data-toggle="modal" data-target="#meritround_add_model"> + Add Merit Round</button>
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

<script>
$(document).ready(function() {
    $('.dt-buttons').html('');
})
</script>
@endpush