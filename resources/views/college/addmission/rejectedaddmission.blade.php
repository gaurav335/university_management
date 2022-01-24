@extends('college-layout.master')
<title>College | Rejected Student</title>
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
                        <h5>Rejected And Pending Addmission List</h5>
                        <div class="table-responsive table-hover">
                            {!! $dataTable->table(['class' => 'notification table table-bordered dt-responsive nowrap'])
                            !!}
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
//clearfilter
$('#clearAllFilter').click(function(e) {
    e.preventDefault();
    $('.merit').val(null);
    $('#college-admissionrejected-table').DataTable().ajax.reload();
});

// filter
$("#college-admissionrejected-table").on('preXhr.dt', function(e, settings, data) {
    data.merit = $(".merit").val();
});

$(document).on('change', '.merit', function(e) {
    window.LaravelDataTables['college-admissionrejected-table'].draw();
    e.preventDefault();
});

//status
$(document).on('click', '.confirm', function() {
    if (confirm('are you want to sure Addmission Confirmation!')) {

        var status = $(this).data('status');
        var id = $(this).data('id');
        var acid = $(this).data('acid');
        var cid = $(this).data('cid');
        var clgid = $(this).data('clgid');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            url: '{{ route("college.rejctedconfirmation") }}',
            type: 'post',
            data: {
                'status': status,
                'id': id,
                'acid': acid,
                'cid': cid,
                'clgid': clgid,
            },
            success: function(res) {
                if (res == 1) {
                    toastr.success('Addmission Confirmation is Successfully');
                }
                if (res == 2) {
                    toastr.error('Addmission Seat is Full Your College!');
                }
                $('#college-admissionrejected-table').DataTable().ajax.reload();
            }
        })
    }
});
</script>
@endpush