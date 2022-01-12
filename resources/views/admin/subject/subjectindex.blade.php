@extends('admin-layout.master')
<title>University | Subject</title>
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
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
//status
$(document).on('click', '.status', function() {

var status = $(this).data('status');
var id = $(this).data('id');

$.ajax({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
    url: '{{ route("admin.adminsubjectstatus") }}',
    type: 'post',
    data: {
        'status': status,
        'id': id
    },
    success: function(res) {
        if (res.mesage == 1) {
            toastr.success('Subject Active Successfully');
        }
        if (res.mesage == 2) {
            toastr.error('Subject InActive Successfully');

        }
        $('#admin-adminsubject-table').DataTable().ajax.reload();
    }
})
});
</script>
@endpush