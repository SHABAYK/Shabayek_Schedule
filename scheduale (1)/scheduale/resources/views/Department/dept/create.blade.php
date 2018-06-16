@extends('admin.index')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{$title}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        {!! Form::open(['route'=>'departments.store']) !!}
        <div class="form-group">
          {!! Form::label('name','Name') !!}
          {!! Form::text('name',old('name'),['class'=>'form-control']) !!}
        </div>
            <div class="form-group">
                {!! Form::label('academic_id','Academic Advisor') !!}
                <select class="form-control" name="academic_id">
                    <option value="">Select Academic Advisor</option>
                    @foreach($all_advisors as $advisor)
                        <option value="{{$advisor->id}}" >{{$advisor->username}}</option>
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