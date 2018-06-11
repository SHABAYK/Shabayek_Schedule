<?php

namespace App\DataTables;

use App\User;
use App\Model\Department;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\ButtonsServiceProvider;

class DepartmentDataTable extends DataTable
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
            ->addColumn('checkbox', 'Department.dept.btn.checkbox')
            ->addColumn('edit', 'Department.dept.btn.edit')
            ->addColumn('delete', 'Department.dept.btn.delete')
            ->addColumn('academic', 'Department.dept.btn.academic')

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
        return Department::query();

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
                ['text'=>'<i class="fa fa-plus"></i> Create Department', 'className'=>'btn btn-info',
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
                            this.api().columns([1,2]).every(function () {
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
                'name' =>'name',
                'data' => 'name',
                'title' =>'Department Name',
            ],[
                'name' =>'academic',
                'data' => 'academic',
                'title' =>'Academic Name',
            ],
            [
                'name' =>'created_at',
                'data' => 'created_at',
                'title' =>'created_at',
            ],
            [
                'name' => 'updated_at',
                'data' => 'updated_at',
                'title' =>'updated_at',
            ],
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
        return 'Department_' . date('YmdHis');
    }
}
