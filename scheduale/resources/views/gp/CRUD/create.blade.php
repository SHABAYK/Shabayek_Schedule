@extends('academic.index')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{$title}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        {!! Form::open(['route'=>['add_gp.create',$user->id],'method'=>'put']) !!}
            <div class="form-group">
                {!! Form::label('description','DESCRIPTION') !!}
                {!! Form::text('description',$user->description,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('doctor_name','DOCTOR NAME') !!}
                {!! Form::text('doctor_name',$user->doctor_name,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('student_name','STUDENT NAME') !!}
                {!! Form::text('student_name',$user->student_name,['class'=>'form-control']) !!}
            </div>
            

            

          {!! Form::submit('Save',['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->



@endsection