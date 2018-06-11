@extends('admin.index')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{$title}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        {!! Form::open(['route'=>['user.update',$user->id],'method'=>'put']) !!}
        <div class="form-group">
          {!! Form::label('username','Name') !!}
          {!! Form::text('username',$user->username,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('email','Email') !!}
          {!! Form::email('email',$user->email,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('password','Password') !!}
          {!! Form::password('password',['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('mobile','Mobile') !!}
          {!! Form::number('mobile',$user->mobile,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('type','Type') !!}
          {!! Form::select('type',['admin'=>'Admin','manager'=>'Manager','academic'=>'Academic','doctor'=>'Doctor','student'=>'Student'],$user->type,['class'=>'form-control','placeholder'=>'Select Type']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('user_type_id','Type') !!}
          <select class="form-control" name="user_type_id">
          <option value="">Select Type</option>
          @foreach($types as $type)
          <option value="{{$type->id}}" >{{$type->type}}</option>
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