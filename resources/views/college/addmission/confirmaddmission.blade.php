@extends('college-layout.master')
<title>College | Confirm Addmission</title>
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header">
                        <h5>Confirm Addmission List</h5>
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
@endpush