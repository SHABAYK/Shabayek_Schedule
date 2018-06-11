@extends('admin.index')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{$title}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        {!! Form::open(['route'=>['research_area.update',$research->id],'method'=>'put']) !!}
            <div class="form-group">
                {!! Form::label('specialization_major','Specialization Major') !!}
                {!! Form::text('specialization_major',$research->specialization_major,['class'=>'form-control']) !!}
            </div>
          {!! Form::submit('Save',['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->



@endsection