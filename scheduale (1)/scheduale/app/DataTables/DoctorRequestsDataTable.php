<?php


namespace App\DataTables;


use App\Model\DoctorRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\ButtonsServiceProvider;

class DoctorRequestsDataTable  extends DataTable
{

    public function dataTable($query)
    {

        return datatables($query)

            ->addColumn('edit', 'academic.CRUD.btn.edit')

            ->rawColumns([
                'edit',

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


        return DoctorRequest::query();


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
                'widthMenue'=>['All Record'],
                'lengthMenu'=>[[10,25,50,100],[10,25,50,'All Record']],
                'buttons'=>[



                    ['extend'=>'print','className'=>'btn btn-primary','text'=>'<i class="fa fa-print"></i>'],
                    ['extend'=>'excel','className'=>'btn btn-success','text'=>'<i class="fa fa-file"></i> Export Excel'],
                    ['extend'=>'reload','className'=>'btn btn-default','text'=>'<i class="fa fa-refresh"></i>'],

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
                'name' => 'id',
                'data' => 'id',
                'title' =>'#',
            ],


            [
                'name' =>'doctor_name',
                'data' => 'doctor_name',
                'title' =>'Doctor Name',
            ],

            [
                'name' =>'course_title',
                'data' => 'course_title',
                'title' =>'Course Title',
            ], 

            [
                'name' =>'level',
                'data' => 'level',
                'title' =>'Level',
            ],


            [
                'name' =>'day',
                'data' => 'day',
                'title' =>'Day',
            ],

            [
                'name' =>'start_at',
                'data' => 'start_at',
                'title' =>'Start At',
            ],

            [
                'name' =>'end_at',
                'data' => 'end_at',
                'title' =>'End At',
            ],


            [
                'name' =>'state',
                'data' => 'state',
                'title' =>'State',
            ],



            [
                'name' => 'edit',
                'data' => 'edit',
                'title' =>'Edit',
                'exportable'=>false,
                'printable' =>false,
                'orderable' =>false,
                'searchable' =>false,
            ]


        ];
    }
    protected function filename()
    {
        return 'ShowDoctorRequests_' . date('YmdHis');
    }
}