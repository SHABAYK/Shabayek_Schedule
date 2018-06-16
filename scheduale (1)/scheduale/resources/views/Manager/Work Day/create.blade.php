@extends('Manager.index')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{$title}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        {!! Form::open(['route'=>'work_day.store']) !!}
            <div class="form-group">
                {!! Form::label('day_week_id','Select Day') !!}
                <select class="form-control" name="day_week_id">
                    <option value="">Select Day</option>
                @foreach($all_days as $day)
                        <option value="{{$day->id}}" >{{$day->day}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {!! Form::label('start_at','Start At') !!}
                {!! Form::time('start_at',old('start_at'),['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('end_at','End At') !!}
                {!! Form::time('end_at',old('end_at'),['class'=>'form-control']) !!}
            </div>
            {!! Form::submit('Create',['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->



@endsection