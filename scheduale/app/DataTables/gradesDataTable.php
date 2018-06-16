<?php
/**
 * Created by PhpStorm.
 * User: 7oor
 * Date: 4/17/2018
 * Time: 5:25 PM
 */

namespace App\DataTables;


use App\Model\Grades;
use App\Model\Year;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\ButtonsServiceProvider;

class gradesDataTable extends DataTable
{

    public function dataTable($query)
    {

        return datatables($query)

            ->addColumn('year', 'Doctor.CRUDE.btn.year')
            ->addColumn('edit', 'Doctor.CRUDE.btn.edit')

            ->rawColumns([
                'edit',

                'checkbox',
                'year'
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

   // $lastRecord=Year ::orderBy('id', 'desc')->first();

//      $lastRecord= Year::orderBy('created_at', 'desc')->limit(1);
//        $lastRecord=Year::latest()->first();
       // $lastRecord=Year::all()->last()->id;
       // $lastRecord=Year::orderBy('id', 'desc')->first()->id;
      //  $lastRecord=Year::all()->last();
        // $lastRecord=Year::all()->last()->id;
        // $lastRecord=Year::orderBy('id', 'desc')->first()->id;
      $useR=Auth::user()->username;

      $grades=Grades::where(['doctor_name'=>$useR])->get();

        return $grades;

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
                'name' =>'year',
                'data' => 'year',
                'title' =>'YEAR',
            ],
            [
                'name' =>'student_name',
                'data' => 'student_name',
                    'title' =>'STUDENT NAME',
            ],
            [
                'name' =>'course_title',
                'data' => 'course_title',
                'title' =>'COURSE TITLE',
            ], [
                'name' =>'calss_grade',
                'data' => 'calss_grade',
                'title' =>'CLASS GRADE',
            ], [
                'name' =>'practical',
                'data' => 'practical',
                'title' =>'PRACTICAL',
            ],
            [
                'name' =>'final',
                'data' => 'final',
                'title' =>'FINAl',
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
            ]


        ];
    }
    protected function filename()
    {
        return 'Year_' . date('YmdHis');
    }
}


