<?php

namespace App\DataTables\college;

use App\Models\Addmissions;
use App\Models\Course;
use App\Models\AddmissionConfimation;
use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdmissionConfirmDataTable extends DataTable
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
            ->addColumn('addmission_code', function ($data) {
                $user =  Addmissions::where('id', $data->addmission_id)->first();
                return  $user->addmission_code;
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
            ->rawColumns(['confirmation_type','addmission_code','course_id','user_id','status'])
            ->addIndexColumn();
        }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\AddmissionConfimation $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(AddmissionConfimation $model,Request $request)
    {
        if($request->merit)
        {
            $merit=explode('-',$request->merit);
            $model =  $model->where('confirm_merit','>=',(int)$merit[0])->where('confirm_merit','<=',(int)$merit[1]);
        }
        $model =  $model->where('confirm_college_id',Auth::user()->id)->where('status',1);
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
                    ->setTableId('college-admissionconfirm-table')
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
        return 'college/AdmissionConfirm_' . date('YmdHis');
    }
}
