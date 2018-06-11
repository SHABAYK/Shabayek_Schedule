@extends('admin.index')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{$title}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        {!! Form::open(['route'=>'hiring.store']) !!}
        <div class="form-group">
            {!! Form::label('hiring_degree','Hiring Degree') !!}
            <select name="hiring_degree" class="form-control">
                <option value="">Select Hiring Degree</option>
                <option value="master">Master</option>
                <option value="doctor">Doctor</option>
                <option value="assistant professor">Assistant Professor</option>
                <option value="co professor">Co Professor</option>
                <option value="professor">Professor</option>
            </select>
        </div>
        <div class="form-group">
            {!! Form::label('hiring_date','hiring Date') !!}
            {!! Form::date('hiring_date',old('hiring_date'),['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('last_degree','Last Degree') !!}
            <select name="last_degree" class="form-control">
                <option value="">Select Last Degree</option>
                <option value="master">Master</option>
                <option value="doctor">Doctor</option>
                <option value="assistant professor">Assistant Professor</option>
                <option value="co professor">Co Professor</option>
                <option value="professor">Professor</option>
                <option value="">Still Hiring Degree</option>
            </select>
        </div>
        <div class="form-group">
            {!! Form::label('last_date','Last Date') !!}
            {!! Form::date('last_date',old('last_date'),['class'=>'form-control']) !!}
        </div>

  <div class="form-group">
            {!! Form::label('lastest_degree','The Latest Degree') !!}
            <select name="lastest_degree" class="form-control">
                <option value="">Select Latest Degree</option>
                <option value="master">Master</option>
                <option value="doctor">Doctor</option>
                <option value="assistant professor">Assistant Professor</option>
                <option value="co professor">Co Professor</option>
                <option value="professor">Professor</option>
                <option value="">Still Hiring Degree</option>
            </select>
        </div>
        <div class="form-group">
            {!! Form::label('lastest_date','The Latest Degree') !!}
            {!! Form::date('lastest_date',old('lastest_date'),['class'=>'form-control']) !!}
        </div>

          {!! Form::submit('Create',['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->



@endsection