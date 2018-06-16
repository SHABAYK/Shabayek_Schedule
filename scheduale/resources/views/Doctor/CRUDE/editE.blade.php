@extends('Doctor.index')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{$title}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            {!! Form::open(['route'=>['Grade.update',$user->id],'method'=>'put']) !!}
            <div class="form-group">
                {!! Form::label('course_title','Course Name') !!}
                {!! Form::text('course_title',$user->course_title,['class'=>'form-control','readonly' => 'true']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('student_name','Student Name') !!}
                {!! Form::text('student_name',$user->student_name,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('calss_grade','Class Grade') !!}
                {!! Form::number('calss_grade',$user->calss_grade,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('practical','Practical') !!}
                {!! Form::number('practical',$user->practical,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('final','Final') !!}
                {!! Form::number('final',$user->final,['class'=>'form-control']) !!}
            </div>



            {!! Form::submit('Save',['class'=>'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->



@endsection