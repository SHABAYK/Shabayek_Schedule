@extends('admin.index')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{$title}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            {!! Form::open(['route'=>['academic_degrees.update',$academic->id],'method'=>'put']) !!}
            <div class="form-group">
                {!! Form::label('degree','Degree') !!}
                {!! Form::text('degree',$academic->degree,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('priority','Priority') !!}
                {!! Form::date('priority',$academic->priority,['class'=>'form-control']) !!}
            </div>

          {!! Form::submit('Save',['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->



@endsection