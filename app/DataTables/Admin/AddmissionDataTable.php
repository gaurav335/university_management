<?php

namespace App\DataTables\Admin;

use App\Models\Addmissions;
use App\Models\AddmissionConfimation;
use App\Models\User;
use App\Models\Course;
use App\Models\College;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AddmissionDataTable extends DataTable
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
            ->editColumn('user_id', function ($data) {
                $course =  User::where('id', $data->user_id)->first();
                return  $course->name;
            })
            ->editColumn('course_id', function ($data) {
                $course =  Course::where('id', $data->course_id)->first();
                return  $course->name;
            })
            ->addColumn('college_id', function ($data) {
                $collegeId =  Addmissions::where('id', $data->id)->first();
                $addmission =  AddmissionConfimation::where('addmission_id', $data->id)->where('status',1)->first();
                if(isset($addmission->confirm_college_id))
                {
                    $college =  College::where('id', $addmission->confirm_college_id)->first();
                    return  $college->name;
                }
                else
                {
                    return '----------';
                }
                    
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
            ->rawColumns(['course_id','status','college_id','user_id'])
            ->addIndexColumn();    
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Addmissions $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Addmissions $model,Request $request)
    {
        if($request->merit)
        {
            $merit=explode('-',$request->merit);
            $model =  $model->where('merit','>=',(int)$merit[0])->where('merit','<=',(int)$merit[1]);
        }

        if($request->status == null)
        {
            $model= $model;
        }
        elseif($request->status == 0 || $request->status == 1 || $request->status == 2)
        {
            $model = $model->where('status',$request->status);
        }
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
                    ->setTableId('admin-addmission-table')
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
            Column::make('addmission_code')->title('Addmission Code'),
            Column::make('college_id')->title('Confirm College Name'),
            Column::make('user_id')->title('User Name'),
            Column::make('course_id')->title('Course Name'),
            Column::make('merit')->title('Merit'),
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
        return 'Admin/Addmission_' . date('YmdHis');
    }
}
