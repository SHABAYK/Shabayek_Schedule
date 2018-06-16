@extends('admin.index')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{$title}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        {!! Form::open(['route'=>'research_area.store']) !!}
        <div class="form-group">
          {!! Form::label('specialization_major','Specialization Major') !!}
          {!! Form::text('specialization_major',old('specialization_major'),['class'=>'form-control']) !!}
        </div>

          {!! Form::submit('Create',['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->



@endsection