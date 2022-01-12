<?php

namespace App\DataTables\Admin;

use App\Models\Subject;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AdminSubjectDataTable extends DataTable
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
                $result = "";
                if($data->status==1)
                {
                    $result.='<button type="button" class="btn status btn-outline-danger waves-effect waves-light" title="lock" data-id="'.$data->id.'" data-status="0"><i class="fas fa-unlock"></i></button>';
                }
                if($data->status==0)
                {
                    $result.='<button type="button" data-id="'.$data->id.'" class="btn status btn-outline-success waves-effect waves-light" title="unlock" data-status="1" ><i class="fas fa-lock" ></i></button>';
                }
                return $result;
            })
            ->addColumn('status',function($data){
                if ($data->status == 0) {
                    return '<span class="badge badge-soft-danger font-size-15" style="padding:10px;">Inactive</span>';
                } else {
                    return '<span class="badge badge-soft-success font-size-15" style="padding:10px 18px;">Active</span>';
                }

            })
            ->rawColumns(['action','status'])
            ->addIndexColumn();        
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Subject $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Subject $model)
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
                    ->setTableId('admin-adminsubject-table')
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
            Column::make('name')->title('Subject Name'),
            Column::make('code')->title('Subject Code'),
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
        return 'Admin/AdminSubject_' . date('YmdHis');
    }
}
