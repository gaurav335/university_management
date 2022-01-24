<?php

namespace App\DataTables\Admin;

use App\Models\College;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CollegeDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action',function($data){
                $id = encryptString($data->id);
                $result="";
                if($data->status==1)
                {
                    $result.='<button type="button" class="btn status btn-outline-danger waves-effect waves-light" title="lock" data-id="'.$data->id.'" data-status="0"><i class="fas fa-unlock"></i></button>';
                }
                if($data->status==0)
                {
                    $result.='<button type="button" data-id="'.$data->id.'" class="btn status btn-outline-success waves-effect waves-light" title="unlock" data-status="1" ><i class="fas fa-lock" ></i></button>';
                }
                    $result.='<button type="button" class="btn edit-btn btn-outline-info waves-effect waves-light" data-toggle="modal" data-target="#college_edit_modal" data-eid="'.$data->id.'" title="Edit College"><i class="fa fa-edit" aria-hidden="true"></i></button>
                <button type="button" class="btn delete-btn btn-outline-danger waves-effect waves-light" data-did="'.$data->id.'" title="Delete college"><i class="fa fa-trash" aria-hidden="true"></i></button>';
                $result.='<a href="'.route("admin.collegeview",$id).'" class="btn  btn-outline-dark waves-effect waves-light" title="College view"><i class="fa fa-eye" aria-hidden="true"></i></a>';
                return $result;
            })
            ->addColumn('status',function($data){

                if ($data->status == 0) {
                    return '<span class="badge badge-soft-danger font-size-15" style="padding:10px;">Inactive</span>';
                } else {
                    return '<span class="badge badge-soft-success font-size-15" style="padding:10px 18px;">Active</span>';
                }

            })
            ->editColumn('logo',function($data){

                return "<img src='".$data->logo."' height='50px' width='50px'>";

            })
            ->rawColumns(['logo','status','action'])
            ->addIndexColumn();    
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\College $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(College $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('admin-college-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bflrtip')
                    ->orderBy(1);        
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('no')->data('DT_RowIndex')->searchable(false)->orderable(false),
            Column::make('id')->hidden(true),
            Column::make('name')->title('College Name'),
            Column::make('email')->title('College Email'),
            Column::make('logo')->title('College Logo'),
            Column::make('status')->title('Status'),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(60)
            ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Admin/College_' . date('YmdHis');
    }
}
