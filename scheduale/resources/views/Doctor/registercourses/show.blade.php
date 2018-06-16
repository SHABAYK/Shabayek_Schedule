@extends('Doctor.index')
@section('content')
    <h3 class="box-title">{{$title}}</h3>

    <div class="jumbotron text-center">

        <p>
            <strong>Course Title:</strong> {{ $data->course_title}}<br>
            <strong>Day:</strong> {{ $data->day}} <br>
            <strong>Start At:</strong> {{ $data->start_at}}<br>
            <strong>End At:</strong> {{ $data->end_at }}<br>
            <strong>State:</strong> {{ $data->state}}
        </p>

    </div>
@endsection
