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
                                            <input type="text" name="email" id="email" class="form-control"
                                                placeholder="College Email..." />
                                        </div>

                                        <div class="form-group">
                                            <label>College Contact No.</label>
                                            <input type="text" name="contact_no" id="contact_no" class="form-control"
                                                placeholder="College Contact No..." />
                                        </div>

                                        <div class="form-group">
                                            <label>College Address</label>
                                            <textarea name="address" id="address" class="form-control" rows="4"
                                                placeholder="College Address..."></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>College Logo</label>
                                            <input type="text" name="name" id="name" class="form-control"
                                                placeholder="College Name..." />
                                        </div>

                                        <div class="form-group">
                                            <label>College Name</label>
                                            <input type="file" name="logo" id="logo" class="form-control"
                                                placeholder="College Logo..." />
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
                        <button type="button" class="btn btn-save btn-outline-primary float-right" title="Add College"
                            data-toggle="modal" data-target="#college_add_model"> + Add College</button>
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
</script>
@endpush