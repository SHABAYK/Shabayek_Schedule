@extends('admin.index')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{$title}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            {!! Form::open(['route'=>'faculty_course.store']) !!}
            <div class="form-group">
                {!! Form::label('title','Title') !!}
                {!! Form::text('title',old('title'),['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('dept_id','Department') !!}
                <select class="form-control" name="dept_id">
                    <option value="">Select Department</option>
                    @foreach($all_departments as $department)
                        <option value="{{$department->id}}" >{{$department->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {!! Form::label('research_area_id','Research Area') !!}
                <select class="form-control" name="research_area_id">
                    <option value="">Select Rsearch Area</option>
                @foreach($all_researchs as $research)
                        <option value="{{$research->id}}" >{{$research->specialization_major}}</option>
                    @endforeach
                </select>
            </div>
           {{-- <div class="form-group">
                {!! Form::label('prerequisite_id','Prerequisite Title') !!}
                <select class="form-control" name="prerequisite_id">
                    <option value="{{null}}">Select prerequisite Title</option>
                @foreach($all_prequisites as $prequisite)
                        <option value="{{$prequisite->id}}" >{{$prequisite->title}}</option>
                    @endforeach
                </select>
            </div>--}}
            <div class="form-group">
                {!! Form::label('credit_hours','Credit Hours') !!}
                {!! Form::number('credit_hours',old('credit_hours'),['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('level','Level') !!}
                {!! Form::number('level',old('level'),['class'=>'form-control']) !!}
            </div>
            {!! Form::submit('Create',['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->



@endsection