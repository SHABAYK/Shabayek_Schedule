@extends('admin.index')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{$title}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        {!! Form::open(['route'=>'doctors.store']) !!}
            <div class="form-group">
                {!! Form::label('user_id','Doctors') !!}
                <select class="form-control" name="user_id">
                    <option value="">Select Doctor</option>
                    @foreach($all_doctors as $doctor)
                        <option value="{{$doctor->id}}" >{{$doctor->username}}</option>
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
                {!! Form::label('hiring_info_id','Hiring Info') !!}
                <select class="form-control" name="hiring_info_id">
                    <option value="">Select Hiring Degree</option>
                    @foreach($all_hirings as $hiring)
                        <option value="{{$hiring->id}}" >{{$hiring->hiring_degree}}</option>
                    @endforeach
                </select>
            </div>


            {!! Form::submit('Create',['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->



@endsection