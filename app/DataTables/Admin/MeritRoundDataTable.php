<?php

namespace App\DataTables\Admin;

use App\Models\MeritRound;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class MeritRoundDataTable extends DataTable
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
            ->addIndexColumn();    
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\MeritRound $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(MeritRound $model)
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
                    ->setTableId('admin-meritround-table')
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
            Column::make('start_date')->title('Merit Round Start Date'),
            Column::make('end_date')->title('Merit Round End Date'),
            Column::make('merit_result_declare_date')->title('Merit Result Declare Date'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Admin/MeritRound_' . date('YmdHis');
    }
}
