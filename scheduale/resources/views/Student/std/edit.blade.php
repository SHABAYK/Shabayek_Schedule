@extends('admin.index')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{$title}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        {!! Form::open(['route'=>['students.update',$student->id],'method'=>'put']) !!}
            <div class="form-group">
                {!! Form::label('user_id','Student') !!}
                <select class="form-control" name="user_id">
                    <option value="">Select Student</option>
                    @foreach($all_students as $student)
                        <option value="{{$student->id}}" >{{$student->username}}</option>
                    @endforeach
                </select>
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
                {!! Form::label('credit_hours','Credit Hours') !!}
                {!! Form::number('credit_hours',old('credit_hours'),['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('entry_date','Entry Date') !!}
                <select class="form-control" name="entry_date">
                    <option value="">Select Type</option>
                    <option value="2014" >2014</option>
                    <option value="2015" >2015</option>
                    <option value="2016" >2016</option>
                    <option value="2017" >2017</option>
                    <option value="2018" >2018</option>
                </select>
            </div>
          {!! Form::submit('Save',['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->



@endsection