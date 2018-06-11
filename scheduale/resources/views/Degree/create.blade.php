@extends('admin.index')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{$title}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            {!! Form::open(['route'=>'degrees.store']) !!}
            <div class="form-group">
                {!! Form::label('doctor_id','Doctor Name') !!}
                <select class="form-control" name="doctor_id">
                    <option value="">Select Doctor</option>
                    @foreach($all_doctors as $doctor)
                        <option value="{{$doctor->id}}">{{App\user::find($doctor->user_id)->username}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {!! Form::label('research_area_id','Research Area') !!}
                <select class="form-control" name="research_area_id">
                    <option value="">Select Rsearch Area</option>
                @foreach($all_researchs as $research)
                        <option value="{{$research->id}}" >{{$research->specialization_major}}</option>
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