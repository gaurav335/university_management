<?php

namespace App\DataTables\Admin;

use App\Models\Addmissions;
use App\Models\Course;
use App\Models\AddmissionConfimation;
use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SudentViewDataTable extends DataTable
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
            ->addColumn('user_id', function ($data) {
                $user =  Addmissions::where('id', $data->addmission_id)->first();
                $username =  User::where('id', $user->user_id)->first();
                return  $username->name;
            })
            ->addColumn('course_id', function ($data) {
                $user =  Addmissions::where('id', $data->addmission_id)->first();
                $course =  Course::where('id', $user->course_id)->first();
                return  $course->name;
            })
            ->editColumn('confirmation_type', function ($data) {
                if($data->confirmation_type == "M"){
                    return 'Merit Base';
                }elseif($data->confirmation_type == "R"){
                    return 'Reserved Base';
                }
            })
            ->editColumn('status', function ($data) {
                if($data->status == 1){
                    return 'Confirm';
                }elseif($data->status == 2){
                    return 'Pending';
                }
            })
            ->rawColumns(['confirmation_type','course_id','user_id','status'])
            ->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\AddmissionConfimation $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(AddmissionConfimation $model)
    {
        return $model->where('confirm_college_id',$this->college_id)->where('status',1)->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('admin-sudentview-table')
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
            Column::make('user_id')->title('User Name'),
            Column::make('course_id')->title('Course Name'),
            Column::make('confirm_merit')->title('Student Merit'),
            Column::make('confirmation_type')->title('Confirmation Type'),
            Column::make('status')->title('Admission Status'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Admin/SudentView_' . date('YmdHis');
    }
}
