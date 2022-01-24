@extends('admin-layout.master')
<title>University | Addmission</title>
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header">
                        <div class="border-section">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="border-top-head">Admission Filter</p>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" id="type"
                                            class="form-control filter-name js-example-basic-single">
                                            <option value="">All</option>
                                            <option value="0">Next Round</option>
                                            <option value="1">Confirm</option>
                                            <option value="2">Pending</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Merit</label>
                                        <select name="status" id="merit"
                                            class="form-control merit js-example-basic-single">
                                            <option value="">All</option>
                                            <option value="80-100">100-80</option>
                                            <option value="60-80">80-60</option>
                                            <option value="40-60">60-40</option>
                                            <option value="20-40">40-20</option>
                                            <option value="0-20">20-0</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-2 mt-4">
                                    <button type="button" class="btn btn-outline-info" id="clearAllFilter">Clear All
                                        Filter</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5>Addmission List</h5>
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

//clearfilter
$('#clearAllFilter').click(function(e) {
    e.preventDefault();
    $('.filter-name').val(null);
    $('.merit').val(null);
    $('#admin-addmission-table').DataTable().ajax.reload();
});

// filter
$("#admin-addmission-table").on('preXhr.dt', function(e, settings, data) {
    data.status = $(".filter-name").val();
    data.merit = $(".merit").val();
});

$(document).on('change','.filter-name, .merit', function(e) {
    window.LaravelDataTables['admin-addmission-table'].draw();
    e.preventDefault();
});
</script>
@endpush