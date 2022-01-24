<?php

namespace App\DataTables\college;

use App\Models\Addmissions;
use App\Models\AddmissionConfimation;
use App\Models\Course;
use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\Auth;

class AdmissionRejectedDataTable extends DataTable
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
                $addmissionConfirm =  AddmissionConfimation::where('addmission_id', $data->id)->first();
                $admissioCourse =  Addmissions::where('id', $data->id)->first();
                $result.='<button type="button" data-clgid="'.$addmissionConfirm->confirm_college_id.'" data-cid="'.$data->course_id.'" data-acid="'.$addmissionConfirm->id.'" data-id="'.$data->id.'" class="btn confirm btn-outline-success waves-effect waves-light" title="Confirmation" data-status="1" ><i class="fas fa-book" ></i></button>';
                return $result;
            })
            ->editColumn('user_id', function ($data) {
                $course =  User::where('id', $data->user_id)->first();
                return  $course->name;
            })
            ->editColumn('course_id', function ($data) {
                $course =  Course::where('id', $data->course_id)->first();
                return  $course->name;
            })
            ->editColumn('status', function ($data) {
                if($data->status == 0){
                    return 'Next Round';
                }elseif($data->status == 1){
                    return 'Confirm';
                }elseif($data->status == 2){
                    return 'Pending';
                }
            })
            ->rawColumns(['course_id','action','status','checkbox','user_id'])
            ->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Addmissions $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Addmissions $model)
    {
        return $model->where('college_id','like',"%".Auth::user()->id."%")->where('status','!=',1)->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('college-admissionrejected-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bflrtip')
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
            Column::make('addmission_code')->title('Addmission Code'),
            Column::make('user_id')->title('User Name'),
            Column::make('course_id')->title('Course Name'),
            Column::make('merit')->title('Merit'),
            Column::make('status')->title('Admission Status'),
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
        return 'college/AdmissionRejected_' . date('YmdHis');
    }
}
