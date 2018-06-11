@extends('admin.index')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{$title}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        {!! Form::open(['route'=>['departments.update',$department->id],'method'=>'put']) !!}
        <div class="form-group">
          {!! Form::label('name','Name') !!}
          {!! Form::text('name',$department->name,['class'=>'form-control']) !!}
        </div>
            <div class="form-group">
                {!! Form::label('academic_id','Advisor') !!}
                <select class="form-control" name="academic_id">
                    <option value="">Select Advisor</option>
                    @foreach($all_advisors as $advisor)
                        <option value="{{$advisor->id}}" >{{$advisor->username}}</option>
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