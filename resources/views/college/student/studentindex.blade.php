@extends('college-layout.master')
<title>College | Student</title>
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                @if(!empty($meritRound))
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-save btn-outline-primary float-right" id="declare_round"
                            title="Add College Merit" data-toggle="modal" data-did="{{$meritRound->id}}">Round Declare</button>
                    </div>
                </div>
                @endif

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
                        <h5>Student List</h5>
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
$(document).ready(function() {
    $('.dt-buttons').html('');
    var htmlstr = '<input type="checkbox" id="multicheck"/> ';
    $('.check').html(htmlstr);
})

//clearfilter
$('#clearAllFilter').click(function(e) {
    e.preventDefault();
    $('.merit').val(null);
    $('#college-student-table').DataTable().ajax.reload();
});

// filter
$("#college-student-table").on('preXhr.dt', function(e, settings, data) {
    data.merit = $(".merit").val();
});

$(document).on('change','.merit', function(e) {
    window.LaravelDataTables['college-student-table'].draw();
    e.preventDefault();
});

$(document).on('click','#multicheck',function(){
     if($(this).is(':checked',true))
     {
        $(".singlecheck").prop('checked',true);
     }
     else
     {
        $(".singlecheck").prop('checked',false);

     }
 })
//declareround
$(document).on('click', '#declare_round', function() {
    var searchIDs = $(".notification tbody input:checkbox:checked").map(function() {
        return $(this).val();
    }).get();
    var did = $(this).data('did');

    if (searchIDs.length == 1 && searchIDs[0] == 0) {
        return false;
    }
    id = searchIDs.join();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        type: 'post',
        url: '{{ route("college.rounddeclare") }}',
        data: {
            id: id,
            did:did,
        },
        success: function(res) {
            if (res == 1) {
                toastr.success('Round Declare SuccessFully');
                $('#college-student-table').DataTable().ajax.reload();
            }
            if (res == 2) {
                toastr.error('Please Select The User!');
                $('#college-student-table').DataTable().ajax.reload();
            }
            if (res.type == 3) {
                toastr.error('Addmission Merit Seat is Full in '+res.course+' Course!');
                $('#college-student-table').DataTable().ajax.reload();
            }
        }
    })
});
</script>
@endpush