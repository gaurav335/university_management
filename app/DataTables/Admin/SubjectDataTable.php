<?php

namespace App\DataTables\Admin;

use App\Models\CommanSetting;
use App\Models\Subject;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SubjectDataTable extends DataTable
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
                $result="";
                    $result.='<button type="button" class="btn edit-btn btn-outline-info waves-effect waves-light" data-toggle="modal" data-target="#subject_edit_model" data-eid="'.$data->id.'" title="Edit Subject merit"><i class="fa fa-edit" aria-hidden="true"></i></button>
                        <button type="button" class="btn delete-btn btn-outline-danger waves-effect waves-light" data-did="'.$data->id.'" title="Delete Subject merit"><i class="fa fa-trash" aria-hidden="true"></i></button>';
                return $result;
            })
            ->addColumn('code', function ($data) {
                $subcode =  Subject::where('id', $data->subject_id)->first();
                return  $subcode->code;
            })
            ->editColumn('subject_id', function ($data) {
                $sub =  Subject::where('id', $data->subject_id)->first();
                return  $sub->name;
            })
            ->editColumn('marks', function ($data) {
                return  $data->marks .' '.'%' ;
            })
            ->rawColumns(['action','marks','code','subject_id'])
            ->addIndexColumn();    
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\CommanSetting $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(CommanSetting $model)
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
                    ->setTableId('admin-subject-table')
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
            Column::make('subject_id')->title('Subject Name'),
            Column::make('code')->title('Subject Code'),
            Column::make('marks')->title('Marks'),
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
        return 'Admin/Subject_' . date('YmdHis');
    }
}
