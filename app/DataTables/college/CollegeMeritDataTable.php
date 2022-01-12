<?php

namespace App\DataTables\college;

use App\Models\CollegeMerit;
use App\Models\Course;
use App\Models\MeritRound;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\Auth;

class CollegeMeritDataTable extends DataTable
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
                $result.='<button type="button" class="btn edit-btn btn-outline-info waves-effect waves-light" data-toggle="modal" data-target="#collegemerit_edit_model" data-eid="'.$data->id.'" title="Edit College Merit "><i class="fa fa-edit" aria-hidden="true"></i></button>
                <button type="button" class="btn delete-btn btn-outline-danger waves-effect waves-light" data-did="'.$data->id.'" title="Delete College Merit"><i class="fa fa-trash" aria-hidden="true"></i></button>';
                return $result;
            })
            ->editColumn('course_id', function ($data) {
                $course =  Course::where('id', $data->course_id)->first();
                return  $course->name;
            })
            ->editColumn('merit', function ($data) {
                return  $data->merit .' '.'%' ;
            })
            ->editColumn('merit_round_id', function ($data) {
                $course =  MeritRound::where('id', $data->merit_round_id)->first();
                return  'Round No'.' '. $course->round_no;
            })
            ->rawColumns(['course_id','action','merit','merit_round_id'])
            ->addIndexColumn();    
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\CollegeMerit $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(CollegeMerit $model)
    {
        return $model->where('college_id',Auth::user()->id)->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('college-collegemerit-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
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
            Column::make('course_id')->title('Course Name'),
            Column::make('merit_round_id')->title('Merit Round'),
            Column::make('merit')->title('Merit'),
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
        return 'college/CollegeMerit_' . date('YmdHis');
    }
}
