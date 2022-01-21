@extends('college-layout.master')
<title>College | Rejected Student</title>
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

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