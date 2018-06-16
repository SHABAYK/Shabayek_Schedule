@extends('admin.index')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{$title}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        {!! Form::open(['route'=>'academic_degrees.store']) !!}
        <div class="form-group">
            {!! Form::label('degree','Degree') !!}
            {!! Form::text('degree',old('degree'),['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('priority','Priority') !!}
            {!! Form::date('priority',old('priority'),['class'=>'form-control']) !!}
        </div>


          {!! Form::submit('Create',['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->



@endsection