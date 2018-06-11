@extends('Manager.index')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{$title}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        {!! Form::open(['route'=>'registration_time.store']) !!}
        <div class="form-group">
          {!! Form::label('start_regstudent_date','Start RegStudent Date') !!}
          {!! Form::date('start_regstudent_date',old('start_regstudent_date'),['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('end_regstudent_date','End RegStudent Date') !!}
          {!! Form::date('end_regstudent_date',old('end_regstudent_date'),['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('start_regdoctor_date','Start RegDoctor Date') !!}
          {!! Form::date('start_regdoctor_date',old('start_regdoctor_date'),['class'=>'form-control']) !!}
        <div class="form-group">
            {!! Form::label('end_regdoctor_date','End RegDoctor Date') !!}
            {!! Form::date('end_regdoctor_date',old('end_regdoctor_date'),['class'=>'form-control']) !!}
        </div>
        </div>
        <div class="form-group">
            {!! Form::label('start_semester_date','Start Semester Date') !!}
            {!! Form::date('start_semester_date',old('start_semester_date'),['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('end_semester_date','End Semester Date') !!}
            {!! Form::date('end_semester_date',old('end_semester_date'),['class'=>'form-control']) !!}
        </div>
            {!! Form::submit('Create',['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->



@endsection