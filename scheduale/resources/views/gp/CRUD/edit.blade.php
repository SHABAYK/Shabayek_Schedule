@extends('academic.index')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{$title}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        {!! Form::open(['route'=>['approve_courses.update',$user->id],'method'=>'put']) !!}
            <div class="form-group">
                {!! Form::label('doctor_name','Doctor Name') !!}
                {!! Form::text('doctor_name',$user->doctor_name,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('course_title','Course Title') !!}
                {!! Form::text('course_title',$user->course_title,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('level','Level') !!}
                {!! Form::text('level',$user->level,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('day','Day') !!}
                {!! Form::text('day',$user->day,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('start_at','Start At') !!}
                {!! Form::time('start_at',$user->start_at,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('end_at','End At') !!}
                {!! Form::time('end_at',$user->end_at,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('state','State') !!}
                <select class="form-control" name="state">
                    <option value="">Select State</option>
                    <option value="Accept" > Accept</option>
                    <option value="Refuse" > Refuse</option>
                    <option value="Pending"> Pending</option>
                </select>
            </div>
          {!! Form::submit('Save',['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->



@endsection