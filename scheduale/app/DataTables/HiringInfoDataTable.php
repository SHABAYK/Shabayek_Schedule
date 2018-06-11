<?php

namespace App\DataTables;


use App\Model\HiringInfo;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\ButtonsServiceProvider;

class HiringInfoDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('checkbox', 'HiringInfo.btn.checkbox')
            ->addColumn('edit', 'HiringInfo.btn.edit')
            ->addColumn('delete', 'HiringInfo.btn.delete')
            ->rawColumns([
                'edit',
                'delete',
                'checkbox',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Model\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return HiringInfo::query();

    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
        ->columns($this->getColumns())
        ->minifiedAjax()
        //->addAction(['width' => '80px'])
        //->parameters($this->getBuilderParameters());
        ->parameters([
            'dom'=>'Blfrtip',
            'lengthMenu'=>[[10,25,50,100],[10,25,50,'All Record']],
            'buttons'=>[
                ['text'=>'<i class="fa fa-plus"></i> Create Hiring Info', 'className'=>'btn btn-info',
                    "action"=>"function(){
                              window.location.href = '".URL::current()."/create';
                              }"

                ],
                ['extend'=>'print','className'=>'btn btn-primary','text'=>'<i class="fa fa-print"></i>'],
                ['extend'=>'excel','className'=>'btn btn-success','text'=>'<i class="fa fa-file"></i> Export Excel'],
                ['extend'=>'reload','className'=>'btn btn-default','text'=>'<i class="fa fa-refresh"></i>'],
                ['text'=>'<i class="fa fa-trash"></i> Delete All', 'className'=>'btn btn-danger delBtn'],
            ],
            'initComplete' =>"function () {
                            this.api().columns([1,3]).every(function () {
                            var column = this;
                            var input = document.createElement(\"input\");
                            $(input).appendTo($(column.footer()).empty())
                            .on('keyup', function () {
                                column.search($(this).val(), false, false, true).draw();
                            });
                        });
                    }",
        ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            [
                'name' => 'checkbox',
                'data' => 'checkbox',
                'title' =>'<input type="checkbox" class="check_all" onclick="check_all()" />',
                'exportable'=>false,
                'printable' =>false,
                'orderable' =>false,
                'searchable' =>false,
            ],
            [
                'name' => 'id',
                'data' => 'id',
                'title' =>'#',
            ],
            [
                'name' =>'hiring_degree',
                'data' => 'hiring_degree',
                'title' =>'Hiring Degree',
            ],
            [
                'name' =>'hiring_date',
                'data' => 'hiring_date',
                'title' =>'Hiring Date',
            ],
            [
                'name' =>'last_degree',
                'data' => 'last_degree',
                'title' =>'Last Degree',
            ],
            [
                'name' =>'last_date',
                'data' => 'last_date',
                'title' =>'Last Date',
            ],
            [
                'name' =>'lastest_degree',
                'data' => 'lastest_degree',
                'title' =>'latest Degree',
            ],
            [
                'name' =>'lastest_date',
                'data' => 'lastest_date',
                'title' =>'Latest Date',
            ],
            [
                'name' =>'created_at',
                'data' => 'created_at',
                'title' =>'created_at',
            ],
            /*[
                'name' => 'updated_at',
                'data' => 'updated_at',
                'title' =>'updated_at',
            ],*/
            [
                'name' => 'edit',
                'data' => 'edit',
                'title' =>'Edit',
                'exportable'=>false,
                'printable' =>false,
                'orderable' =>false,
                'searchable' =>false,
            ],
            [
                'name' => 'delete',
                'data' => 'delete',
                'title' =>'Delete',
                'exportable'=>false,
                'printable' =>false,
                'orderable' =>false,
                'searchable' =>false,
            ],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'HiringInfo_' . date('YmdHis');
    }
}
