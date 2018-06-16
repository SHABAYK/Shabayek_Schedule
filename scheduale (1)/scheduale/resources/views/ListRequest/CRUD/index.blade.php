@extends('academic.index')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{$title}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            {!! Form::open(['id'=>'form_data','url'=>url('user/destroy/all'),'method'=>'delete']) !!}
            {!! $dataTable->table(['class'=>'dataTable table table-striped table-hover table-bordered '],true) !!}
            {!! Form::close() !!}

        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    <!-- Trigger the modal with a button -->
    <!-- Modal -->
    <div id="multipleDelete" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Delete All</h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger">
                        <div class="empty_record hidden">
                        <h1>Please Check Some Record </h1>
                        </div>
                        <div class="not_empty_record hidden">
                        <h1>Are You Sure For Delete Items: <span class="record_count"></span> ?</h1>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <div class="empty_record hidden">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    <div class="not_empty_record hidden">
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        <input type="submit" name="del_all" value="yes"  class="btn btn-danger del_all" />
                    </div>
                </div>
            </div>

        </div>
    </div>


@push('js')
   <script>
    delete_all();
   </script>
    {!! $dataTable->scripts() !!}
@endpush

@endsection