@extends('Manager.index')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{$title}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        {!! Form::open(['route'=>['semester.update',$semester->id],'method'=>'put']) !!}
            <div class="form-group">
                {!! Form::label('title','Title') !!}
                {!! Form::text('title',$semester->title,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('registertime_id','Register Time Id') !!}
                <select class="form-control" name="registertime_id">
                    <option value="">Select Register Time</option>
                    @foreach($all_registers as $register)
                        <option value="{{$register->id}}" >{{$register->start_semester_date}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {!! Form::label('year_id','Year') !!}
                <select class="form-control" name="year_id">
                    <option value="">Select Year</option>
                    @foreach($all_years as $year)
                        <option value="{{$year->id}}" >{{$year->year}}</option>
                    @endforeach
                </select>
            </div>
          {!! Form::submit('Save',['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->



@endsection