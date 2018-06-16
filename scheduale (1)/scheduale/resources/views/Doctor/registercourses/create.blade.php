@extends('Doctor.index')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{$title}}</h3>

        </div>
        {!! Form::open(['route'=>'courses.store']) !!}
        <div class="form-group">
            {!! Form::label('course_title','First Course') !!}
            <select class="form-control" name="course_title">
                <option value="">Select Course</option>
                @foreach($types as $course_title)
                    <option value="{{$course_title->id}}" >{{$course_title->course_title}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {!! Form::label('course_title','Second Course') !!}
            <select class="form-control" name="course_title">
                <option value="">Select Course</option>
                @foreach($types as $course_title)
                    <option value="{{$course_title->id}}" >{{$course_title->course_title}}</option>
                @endforeach
            </select>
        </div>
    </div>
        <!-- /.box-body -->
    <!-- /.box -->

    {!! Form::submit('Create',['class'=>'btn btn-primary']) !!}

@endsection