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
                {!! Form::label('academic_degrees_id','Academic Degrees') !!}
                <select class="form-control" name="academic_degrees_id">
                    <option value="">Select Academic Degrees</option>
                    @foreach($degrees as $degree)
                        <option value="{{$degree->id}}" >{{$degree->degree}}</option>
                    @endforeach
                </select>
            </div>
        <div class="form-group">
            {!! Form::label('hiring_date','hiring Date') !!}
            {!! Form::date('hiring_date',old('hiring_date'),['class'=>'form-control']) !!}
        </div>
            <div class="form-group">
                {!! Form::label('academic_last_degrees_id','Last Academic Degrees') !!}
                <select class="form-control" name="academic_last_degrees_id">
                    <option value="">Select Last Academic Degrees</option>
                    @foreach($degrees as $degree)
                        <option value="{{$degree->id}}" >{{$degree->degree}}</option>
                    @endforeach
                </select>
            </div>
        <div class="form-group">
            {!! Form::label('last_date','Last Date') !!}
            {!! Form::date('last_date',old('last_date'),['class'=>'form-control']) !!}
        </div>

            <div class="form-group">
                {!! Form::label('academic__lastest_degrees_id','Lastest Academic Degrees') !!}
                <select class="form-control" name="academic__lastest_degrees_id">
                    <option value="">Select Lastest Academic Degrees</option>
                    @foreach($degrees as $degree)
                        <option value="{{$degree->id}}" >{{$degree->degree}}</option>
                    @endforeach
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