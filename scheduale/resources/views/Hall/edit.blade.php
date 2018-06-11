@extends('admin.index')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{$title}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        {!! Form::open(['route'=>['hall.update',$hall->id],'method'=>'put']) !!}
            <div class="form-group">
                {!! Form::label('title','Title') !!}
                {!! Form::text('title',$hall->title,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('capacity','Capacity') !!}
                {!! Form::number('capacity',$hall->capacity,['class'=>'form-control']) !!}
            </div>
          {!! Form::submit('Save',['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->



@endsection