@extends('academic.index')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{$title}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        {!! Form::open(['route'=>'user.store']) !!}
        <div class="form-group">
          {!! Form::label('username','UserName') !!}
          {!! Form::text('username',old('name'),['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('email','Email') !!}
          {!! Form::email('email',old('email'),['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('password','Password') !!}
          {!! Form::password('password',['class'=>'form-control']) !!}
        </div>
        <div class="form-group ">
          <label for="password-confirm">Confirm Password</label>
          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
        </div>
        <div class="form-group">
          {!! Form::label('mobile','Mobile') !!}
          {!! Form::number('mobile',old('mobile'),['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('type','Type') !!}
          {{-- {!! Form::select('type',['admin'=>'Admin','manager'=>'Manager','academic'=>'Academic'],old('type'),['class'=>'form-control','placeholder'=>'Select Type']) !!}--}}
          <select name="type" class="form-control">
              <option value="">Select Type</option>
              <option value="admin">Admin</option>
              <option value="manager">Manager</option>
              <option value="academic">Academic</option>
              <option value="doctor">Doctor</option>
              <option value="student">Student</option>
          </select>
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
          {!! Form::submit('Create',['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->



@endsection